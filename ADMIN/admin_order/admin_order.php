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
	  <link rel = "stylesheet" href = "admin_order.css">
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
		<div class ="spacing">
		</div>
		
		<div class ="content">
			<div style="overflow-x: auto;">
			<?php
			
				$items_in_page = 15;
				
				if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
				$start_from = ($page-1) * $items_in_page;
				$sql = "SELECT * FROM orders ORDER BY id DESC LIMIT $start_from, ".$items_in_page;
				$rs_result = $link->query($sql);
				
				echo "<center><br>";
				echo "<h2>ORDER</h2><br>";
				echo "<br>";
				echo "<table border = 1px>";
				echo "<tr>";
				echo "<th>Order ID</th>";
				echo "<th>Customer Name</th>";
				echo "<th>Product</th>";
				echo "<th>Phone</th>";
				echo "<th>Delivery Address</th>";
				echo "<th>Delivery Date</th>";
				echo "<th>Order Date</th>";
				echo "<th>Payment Status (downpayment)</th>";
				echo "<th>Delivery Status</th>";
				echo "<th>Date Completed</th>";
				
				echo "</tr>";

				while ($row = $rs_result->fetch_assoc()){
					echo "<tr>";
					echo "<td>".$row['id']."</td>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['products']."</td>";
					echo "<td>".$row['phone']."</td>";
					echo "<td>".$row['address']."</td>";
					echo "<td>".$row['delivery_date'];
					echo "<td>".$row['log']."</td>";
					echo "<td>".$row['payment_status'];
					?>
					<form action="payment-action.php" method="post">
						<?php if ($row['payment_status'] == 'Waiting for Payment') { ?>
							<input type="hidden" name="id" value="<?=$row['id']?>">
							<button type="submit" name="payment-status" value="Paid">Mark as Paid</button>
						<?php } ?>
					</form>
					<?php
					echo "<td>".$row['order_status'];
					?>
					<form action="order-action.php" method="post">
						<?php if ($row['order_status'] == 'On-going') { ?>
							<select name="order-status">
								<option value="Completed">Completed</option>
								<option value="Cancelled">Cancelled</option>

								<input type="hidden" name="status" value="order-status">
								<input type="hidden" name="id" value="<?=$row['id']?>">
								<input type="submit" value="Update">
							</select>
						<?php }elseif ($row['order_status'] == 'Completed') { ?>
							<select name="order-status">
								<option value="On-going">On-going</option>
								<option value="Cancelled">Cancelled</option>

								<input type="hidden" name="status" value="order-status">
								<input type="hidden" name="id" value="<?=$row['id']?>">
								<input type="submit" value="Update">
							</select>
						<?php }elseif ($row['order_status'] == 'Cancelled') { ?>
							<select name="order-status">
								<option value="On-going">On-going</option>

								<input type="hidden" name="status" value="order-status">
								<input type="hidden" name="id" value="<?=$row['id']?>">
								<input type="submit" value="Update">
							</select>
						<?php } ?>
					</form>
					</td>
					<?php
					echo "<td>".$row['completed']."</td>";
					echo "</tr>";
					
				}
				echo "</table>";
				?>
				</div>
				<br>
				<div class = "pageNumber">
				<center>
				<?php
				
				echo "<a href='admin_order.php?page=";
					if ($page > 1){
						echo $page-1;
					}else{
						echo "$page";
					}
				echo "' class = 'pages'><</a>";

			$sql2 = "SELECT COUNT(id) AS total FROM orders ";
			$result = $link->query($sql2);
			$row = $result->fetch_assoc();
			$total_pages = ceil($row["total"] / $items_in_page); 
			
			for ($i=1; $i<=$total_pages; $i++) {
						echo "<a href='admin_order.php?page=".$i."' class = 'pages";
						if ($i==$page)  echo " curPage";
						echo "'>".$i."</a> ";
			};

			echo "<a href='admin_order.php?page=";
			if ($total_pages == $page){
				echo "$page";
			}else{
				echo $page+1;
			}
			echo "' class = 'pages'>></a>";
		

			echo "</center>";
			echo "</div>";
			?>
			
		</div>
	</body>
</html>