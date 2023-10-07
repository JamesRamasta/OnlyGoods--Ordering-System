	<?php
	//Connect to database with PDO
	$link = new \PDO(   'mysql:host=localhost:3307;dbname=onlygoods;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                        'root', //'root',
                        '', //'',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
		$handle = $link->prepare('SELECT (a.price - b.price) AS total_expenses, (a.month) as mnth, (a.price) as aprice, (b.price) as bprice FROM ((SELECT sum(amount_paid) as price, monthname(completed) as month, year(completed) as year, count(monthname(completed)) as m FROM orders WHERE order_status="Completed" AND year(completed)=year(curdate()) GROUP BY monthname(completed), year(completed)) a,
			(SELECT purchased_date, sum(cost) as price, monthname(purchased_date) as month, year(purchased_date) as year, count(monthname(purchased_date)) as m FROM expenses WHERE year(purchased_date)=year(curdate()) GROUP BY monthname(purchased_date), year(purchased_date)) b) WHERE (a.month) = (b.month) ORDER BY purchased_date'); 
    $handle->execute(); 
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
    $dataPoints = array();
    foreach($result as $row){
        array_push($dataPoints, array("label"=> $row->mnth, "y"=> $row->aprice));
    }
	
	$dataPoints2 = array();
    foreach($result as $row){
        array_push($dataPoints2, array("label"=> $row->mnth, "y"=> $row->bprice));
    }
    $dataPoints3 = array();
    foreach($result as $row){
    $profit_income = $row -> aprice;
    $profit_expenses = $row -> bprice;
    $profit = $profit_income - $profit_expenses;
        array_push($dataPoints3, array("label"=> $row->mnth, "y"=> $profit));
    }
	
		include("../admin_sessionChecker.php");
		include("profit-action.php");
		require_once "../config.php";
		//total orders
		$stmt = $link->prepare('SELECT * FROM orders WHERE order_status="Completed"');
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;
		//gross sales
		$stmt = $link->prepare('SELECT * FROM orders WHERE order_status="Completed"');
		$stmt->execute();
		$result = $stmt->get_result();
		$grand_total = 0;
		while ($row = $result->fetch_assoc()):
			$grand_total += $row['amount_paid'];
		endwhile;
		//total expenses
		$stmt = $link->prepare('SELECT * FROM expenses');
		$stmt->execute();
		$result = $stmt->get_result();
		$total_expenses = 0;
		while ($row = $result->fetch_assoc()):
			$total_expenses += $row['cost'];
		endwhile;
		//monthly income
		$sql = "SELECT sum(amount_paid) as price, monthname(completed) as month, year(completed) as year, count(monthname(completed)) as m FROM orders WHERE order_status='Completed' GROUP BY monthname(completed), year(completed) ORDER BY id DESC";
		if($stmt = mysqli_prepare($link, $sql)){
			if(mysqli_stmt_execute($stmt)){
				$result = mysqli_stmt_get_result($stmt);
			}
		}else{
			echo "No order/s found";
		}
	
		function build_table($result)  {  
			  $output = '';  
			  while($row = mysqli_fetch_array($result))  
			  {       
			  $output .= "
			  			<tr>  
			  				<td>".$row['month']."</td>  
							<td>".$row['year']."</td>
							<td>".$row['m']."</td>
							<td>Php ".number_format($row['price'],2)."</td>
						</tr>";
			  }  
			  return $output;  
		}

		//monthly expenses
		$sql = "SELECT sum(cost) as price, monthname(purchased_date) as month, year(purchased_date) as year, count(monthname(purchased_date)) as m FROM expenses GROUP BY monthname(purchased_date), year(purchased_date) ORDER BY purchased_date DESC";
		if($stmt = mysqli_prepare($link, $sql)){
			if(mysqli_stmt_execute($stmt)){
				$result2 = mysqli_stmt_get_result($stmt);
			}
		}else{
			echo "No order/s found";
		}
	
		function build_table2($result2)  {  
			  $output = '';
			  while($row = mysqli_fetch_array($result2))  
			  {       
			  $output .= "
			  			<tr>  
			  				<td>".$row['month']."</td>  
							<td>".$row['year']."</td>
							<td>Php ". number_format($row['price'],2)."</td>
						</tr>";
			  }  
			  return $output;  
		}

		if(isset($_POST['generate-report'])){
			require_once('tcpdf/tcpdf.php');
			$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
			$obj_pdf -> SetCreator(PDF_CREATOR);
			$obj_pdf -> SetTitle('Sales Report '.date("Y-m-d"));
			$obj_pdf -> SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
			$obj_pdf -> setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$obj_pdf -> setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
			$obj_pdf -> SetDefaultMonospacedFont('helvetica');
			$obj_pdf -> SetFooterMargin(PDF_MARGIN_FOOTER);
			$obj_pdf -> SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
			$obj_pdf -> setPrintHeader(false);
			$obj_pdf -> setPrintFooter(false);
			$obj_pdf -> SetAutoPageBreak(True, 10);
			$obj_pdf -> SetFont('helvetica', '', 11);
			$obj_pdf -> AddPage();
			$content = '';
			$content2 = '';
			$content3 = '';
			$content .='
				<h4 align="center">SALES REPORT FOR '.date("Y-m-d").'</h4><br/>
				<table border = "1" cellspacing = "0" cellpadding = "3" align="center">
					<tr>
						<th><b>Completed Orders</b></th>
						<th><b>Total Gross</b></th>
						<th><b>Total Expenses</b></th>
						<th><b>Profit</b></th>
					</tr>
					<tr>
						<td>'. $rows .'</td>
						<td>Php '.number_format($grand_total,2).'</td>
						<td>Php '.number_format($total_expenses,2).'</td>
						<td>Php '.number_format($grand_total - $total_expenses,2).'</td>
					</tr>';
			
			//Monthly Income
			$content2 .='
				<h4 align="center">Monthly Income</h4><br/>
				<table border = "1" cellspacing = "0" cellpadding = "3" align="center">
					<tr>
						<th><b>Month</b></th>
				       	<th><b>Year</b></th>
				       	<th><b>Total Orders</b></th>
				       	<th><b>Income</b></th>
					</tr>';
			$content3 .='
				<h4 align="center">Monthly Expenses</h4><br/>
				<table border = "1" cellspacing = "0" cellpadding = "3" align="center">
					<tr>
						<th><b>Month</b></th>
				       	<th><b>Year</b></th>
				       	<th><b>Amount</b></th>				       	
					</tr>';
		    $content .= '</table>';
		    $content2 .= build_table($result);
			$content2 .= '</table>';
			$content3 .= build_table2($result2);
			$content3 .= '</table>';
			$obj_pdf -> writeHTML($content . "<br/><br/>" . $content2. "<br/><br/>" . $content3);
			ob_end_clean();
			$obj_pdf -> Output('Sales Report '.date("Y-m-d"), 'I');
		}
		
		if(isset($_POST['get-month'])){
			$test = $_POST['month-report'];
			$firstDay1 = mktime($_POST['month-report'], '1', date('Y'));
			$firstDay = date("Y-m-d", $firstDay1);
			$lastDay = date("Y").'-'.$_POST['month-report'].'t';
			
			echo "<script>alert(".date("Y-m-d").")</script>";
		}
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>Only Goods | Admin</title>
			<meta charset = "UTF-8">
			<meta name = "viewport" content = "width=device-width, initial-scale=1">
			<script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
			<script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
			<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
			<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
			<!-- add to cart -->
			<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>

			<!-- ICONS  -->
			<link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
			<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
			<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css' />
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

			<!-- FONTS  -->
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@600;700;800;900&display=swap" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700;900&display=swap" rel="stylesheet">
			<link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
			<link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>
			<link rel = "stylesheet" href = "../admin_style.css">
			<link rel = "stylesheet" href = "admin_sale.css">
		<!-- CHART -->
		
			<script>
				window.onload = function(){
					var chart = new CanvasJS.Chart("chartContainer", {
					animationEnabled: true,
					exportEnabled: true,
					theme: "light2",
					title:{
						text: "Monthly Profit"
					},
					axisY:{
						includeZero: true
					},
					legend:{
						cursor: "pointer",
						verticalAlign: "center",
						horizontalAlign: "right",
						itemclick: toggleDataSeries
					},
					data: [{
						type: "line",
						name: "Income",
						indexLabel: "{y}",
						showInLegend: true,
						dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
					},{
						type: "line",
						name: "Expenses",
						indexLabel: "{y}",
						showInLegend: true,
						dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
					},{
						type: "line",
						name: "Profit",
						indexLabel: "{y}",
						showInLegend: true,
						dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
					}]
				});
				chart.render();
				}
				
				function toggleDataSeries(e){
					if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
						e.dataSeries.visible = false;
					}
					else{
						e.dataSeries.visible = true;
					}
					chart.render();
				}
			</script>
		</head>
		
		<body>
			<!-- Navigation Bar -->
			<nav class = "navbar navbar-expand-lg navbar-light fixed-top">
				<a class = "navbar-brand" href = "index.php"></a>
				<button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#navbarNav" aria-controls = "navbarNav" aria-expanded = "false" aria-label = "Toggle navigation">
					<span class = "navbar-toggler-icon"></span>
				</button>
				<div class = "welcome logo_enable"><p><center>Welcome <?php echo $_SESSION['admin_name'] . '!';?></center></p></div>
				<div class = "collapse navbar-collapse" id = "navbarNav">
					<a href="../index.php"><img src="../../images/logo.png" style="width:80px;height:42px;margin-left:20%;" class="logo_enable"></a>
					<ul class = "navbar-nav ml-auto">
						<div class="dropdown">
							<li class="d-lg-none">]
								<a href="../index.php" class="text d-lg-none">Home</a>
								<hr class="d-lg-none" />
							</li>
							<li class="d-lg-none">
								<a href="../admin_accountSettings/admin_accountSettings.php" class="text d-lg-none">Account Settings</a>
								<hr class="d-lg-none" />
							</li>
							<li class="d-lg-none">
								<a href="../admin_signout.php" class="text d-lg-none">Logout</a>
							</li>
							<li class = "nav-item" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="iconify logo_enable" data-icon="bx:bx-user-circle" style="color: white; margin-top: 5px;" data-width="50" data-height="40"></span>
							</li>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
								
								<button class="dropdown-item" type="button"><a href="../admin_accountSettings/admin_accountSettings.php">Account Settings</a>
								</button><hr />
								<button class="dropdown-item" type="button"><a href="../admin_signout.php">Logout</a></button>
							</div>
						</div>
					</ul>
				</div>
			</nav>
			<div class ="spacing"></div>
			
			<center><div id="chartContainer" style="height: 370px; width: 80%;"></div></center>
			<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
			<div class ="content" >
			
			<center>
			<h2>Sales Report</h2>
			<form class="example" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "POST">
				<input type='submit' name='generate-report' value='Generate Report' />
			</form>
			<br>
			</center>
			<?php
			$stmt = $link->prepare('SELECT * FROM orders WHERE order_status="Completed" AND year(completed)=year(curdate())');
			$stmt->execute();
			$stmt->store_result();
			$rows = $stmt->num_rows;
			?>
			<div class="container-fluid">
				<div class="container-fluid">
					<div class="row">		
						<div class="col-xl ">
							<div class="card">
								<div class="card-body">
									<div>
										<h5>Total Completed Orders: <?= $rows ?></h5>
									</div>
								</div>
							</div>
						</div>

						<?php
						$stmt = $link->prepare('SELECT * FROM orders WHERE order_status="Completed" AND year(completed)=year(curdate())');
						$stmt->execute();
						$result = $stmt->get_result();
						$grand_total = 0;
						while ($row = $result->fetch_assoc()):
							$grand_total += $row['amount_paid'];
						endwhile;
						?>
						<div class="col-xl ">
							<div class="card">
								<div class="card-body">
									<div>
										<h5>Gross Sales: ₱<?= number_format($grand_total,2) ?></h5>
									</div>
								</div>
							</div>
						</div>

						<?php
						$stmt = $link->prepare('SELECT * FROM expenses WHERE year(purchased_date)=year(curdate())');
						$stmt->execute();
						$result = $stmt->get_result();
						$total_expenses = 0;
						while ($row = $result->fetch_assoc()):
							$total_expenses += $row['cost'];
						endwhile;
						?>
						<div class="col-xl ">
							<div class="card">
								<div class="card-body">
									<div>
										<h5>Total Expenses: ₱<?= number_format($total_expenses,2) ?></h5>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl">
							<div class="card">
								<div class="card-body">
									<div>
										<h5>Profit: ₱<?= number_format($grand_total - $total_expenses,2) ?></h5>
									</div>
								</div>
							</div>
						</div>
					</div>  
				</div>
			</div>

			<center>	
		    <br>
		    <h2>Monthly Income</h2>
		    <p><a href="sale.php">See full details</a></p>
		    <?php 
		    $stmt = $link->prepare('SELECT sum(amount_paid) as price, monthname(completed) as month, year(completed) as year, count(monthname(completed)) as m FROM orders WHERE order_status="Completed" AND year(completed)=year(curdate()) GROUP BY monthname(completed), year(completed) ORDER BY id DESC');
			$stmt->execute();
			$result = $stmt->get_result();
			?>
			<table>
				<tr>
					<th>Month</th>
			       	<th>Total Orders</th>
			       	<th>Income</th>
	       		</tr>
	       	<?php
	       	while ($row = $result->fetch_assoc()):
	       		echo "<tr>";
		       	echo "<td>" . $row['month'] . " </td>";
		       	//echo "<td>" . $row['year'] . " </td>";
		       	echo "<td>" . $row['m'] . " </td>";
		       	echo "<td>₱". number_format($row['price'],2)."</td>";
		    endwhile;
			?>
			</table>

				<?php 
			    $stmt = $link->prepare('SELECT sum(cost) as price, monthname(purchased_date) as month, year(purchased_date) as year, count(monthname(purchased_date)) as m FROM expenses WHERE year(purchased_date)=year(curdate()) GROUP BY monthname(purchased_date), year(purchased_date) ORDER BY purchased_date DESC');
				$stmt->execute();
				$result = $stmt->get_result();
				?>
				<h2> Monthly Expenses </h2>
				<p><a href="expenses.php">See Full Details</a></p>
				<table>
					<tr>
						<th>Month</th>
				       	<th>Total Cost</th>
				   	</tr>
				   	<?php
				   	while ($row = $result->fetch_assoc()):
			       	echo "<tr>";
			       	echo "<td>" . $row['month'] . " </td>";
			       	//echo "<td>" . $row['year'] . " </td>";
			       	echo "<td>₱". number_format($row['price'],2) ."</td>";
			       	endwhile;
					?>
				</table>
				
				<?php
				$stmt = $link->prepare('SELECT (a.price - b.price) AS total_expenses, (a.month) as mnth, (a.price) as aprice, (b.price) as bprice FROM ((SELECT sum(amount_paid) as price, monthname(completed) as month, year(completed) as year, count(monthname(completed)) as m FROM orders WHERE order_status="Completed" AND year(completed)=year(curdate()) GROUP BY monthname(completed), year(completed)) a, (SELECT sum(cost) as price, monthname(purchased_date) as month, year(purchased_date) as year, count(monthname(purchased_date)) as m FROM expenses WHERE year(purchased_date)=year(curdate()) GROUP BY monthname(purchased_date), year(purchased_date)) b) WHERE (a.month) = (b.month) ');
				$stmt->execute();
				$result = $stmt->get_result();
				?>
				<h2> Monthly Profit </h2>
				<table>
					<tr>
						<th>Month</th>
				       	<th>Profit</th>
				   	</tr>
				   	<?php
				   	while ($row = $result->fetch_assoc()):
			       	echo "<tr>";
			       	echo "<td>" . $row['mnth'] . " </td>";
			       	//echo "<td>" . $row['year'] . " </td>";
			       	echo "<td>₱". number_format($row['total_expenses'],2) .", Income: ".$row['aprice'].", Expenses: ".$row['bprice']."</td>";
			       	endwhile;
					?>
				</table>
		</body>
	</html>