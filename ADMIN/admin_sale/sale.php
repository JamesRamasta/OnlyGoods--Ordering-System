<?php	
	include("../admin_sessionChecker.php");
	require_once "../config.php";
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

		<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script> -->

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
		<div class ="content">
			<div style="overflow-x: auto;">
			<?php
			
				echo "<br>";
				echo "<table>";
				echo "<tr>";
				echo "<th>Order ID</th>";
				echo "<th>Customer Name</th>";
				echo "<th>Product</th>";
				echo "<th>Amount Paid</th>";
				echo "<th>Order Date</th>";
				echo "<th>Completed Date</th>";
				echo "</tr>";
				function build_table($result){
					if(mysqli_num_rows($result) > 0){
						
						while ($row = mysqli_fetch_array($result)){
							echo "<tr>";
							echo "<td>".$row['id']."</td>";
							echo "<td>".$row['name']."</td>";
							echo "<td>".$row['products']."</td>";
							echo "<td>₱".number_format($row['amount_paid'],2)."</td>";
							echo "<td>".$row['log']."</td>";
							echo "<td>".$row['completed']."</td>";
						}
						
						echo "</table>";
					}
				}

				echo "<center><br>";
				echo "<h2>SALES TABLE</h2><a href='admin_sale.php'>Back to Sales Report</a><br><br>";
			?>
			<form class="example" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "POST">
				<label for='from'>From:</label>
				<input type='date' name='from'>
				<label for='to'>To:</label>
				<input type='date' name='to'>
				<button type="submit" name="btn_submit" >Search</button>
				<!--<button type="submit" name="btn_submit" value="2">Show all order</button> -->
				<button href="admin_sale.php">Show all order</button>
			</form>
			<?php
				echo "</center>";
				
			if (isset($_POST['btn_submit'])) {
				if (empty($_POST['to'])){
					$_POST['to'] = $_POST['from'];
				}elseif(empty($_POST['from'])){
					$_POST['from'] = $_POST['to'];
				}elseif($_POST['to'] < $_POST['from']){
					$_POST['from'] = $_POST['to'];
				};
		
				//computing all amount_paid
				$sql = "SELECT * FROM orders WHERE CONVERT(completed,DATE) BETWEEN '".$_POST['from']."' AND '".$_POST['to']."' AND order_status='Completed'";
				$stmt = $link->prepare($sql);
				$stmt->execute();
				$result = $stmt->get_result();
				$grand_total = 0;
				while ($row = $result->fetch_assoc()):
					$grand_total += $row['amount_paid'];
				endwhile;
				
				// print_r($_POST['from']);
				// print_r($_POST['to']);
				
				$sql = "SELECT * FROM orders WHERE CONVERT(completed,DATE) BETWEEN '".$_POST['from']."' AND '".$_POST['to']."' AND order_status='Completed' ORDER BY completed DESC";
						if($stmt = mysqli_prepare($link, $sql)){
							if(mysqli_stmt_execute($stmt)){
								$result = mysqli_stmt_get_result($stmt);
								echo "<div class = 'tSale'><h4> Total Sale: ₱" . number_format($grand_total,2)."</h4></div>";
								echo "<div class = 'display-date'><h4>From: ".$_POST['from']." To: ".$_POST['to']."</h4></div>";
								build_table($result);
							}
						}else{
							echo "No order/s found";
						}
			}else{
				//loading of data from the orders table
				$stmt = $link->prepare('SELECT * FROM orders WHERE order_status="Completed"');
                $stmt->execute();
                $result = $stmt->get_result();
                $grand_total = 0;
                while ($row = $result->fetch_assoc()):
                	$grand_total += $row['amount_paid'];
                endwhile;
				
				$sql = "SELECT * FROM orders WHERE order_status='Completed' ORDER BY id DESC";
				if($stmt = mysqli_prepare($link, $sql)){
					if(mysqli_stmt_execute($stmt)){
						$result = mysqli_stmt_get_result($stmt);
						echo "<div = 'tSale'><h4> Total Sale: ₱" . number_format($grand_total,2)."</div>";
						build_table($result);
					}
				}else{
					echo "No order/s found";
				}
				//computing all amount_paid
			}
				
			?>
		</div>
		</div>
	</body>
</html>