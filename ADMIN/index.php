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

	  <link rel = "stylesheet" href = "admin_style.css">
      <link rel = "stylesheet" href = "admin_index.css">
	</head>
	<body>
		<?php
			include("admin_sessionChecker.php");
			require_once "config.php";
		?>
		<!-- Navigation Bar -->
		<nav class = "navbar navbar-expand-lg navbar-light fixed-top">
			<a class = "navbar-brand" href = "index.php"></a>
			<button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#navbarNav" aria-controls = "navbarNav" aria-expanded = "false" aria-label = "Toggle navigation">
				<span class = "navbar-toggler-icon"></span>
			</button>
			<div class = "welcome logo_enable"><p><center>Welcome <?php echo $_SESSION['admin_name'] . '!';?></center></p></div>
			<div class = "collapse navbar-collapse" id = "navbarNav">
				<a href="index.php"><img src="../images/logo.png" style="width:80px;height:42px;margin-left:20%;" class="logo_enable"></a>
				<ul class = "navbar-nav ml-auto">
					<div class="dropdown">
						<li class="d-lg-none">]
							<a href="index.php" class="text d-lg-none">Home</a>
							<hr class="d-lg-none" />
						</li>
						<li class="d-lg-none">
							<a href="admin_accountSettings/admin_accountSettings.php" class="text d-lg-none">Account Settings</a>
							<hr class="d-lg-none" />
						</li>
						<li class="d-lg-none">
							<a href="admin_signout.php" class="text d-lg-none">Logout</a>
						</li>
						<li class = "nav-item" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="iconify logo_enable" data-icon="bx:bx-user-circle" style="color: white; margin-top: 5px;" data-width="50" data-height="40"></span>
						</li>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
							
							<button class="dropdown-item" type="button"><a href="admin_accountSettings/admin_accountSettings.php">Account Settings</a>
							</button><hr />
							<button class="dropdown-item" type="button"><a href="admin_signout.php">Logout</a></button>
						</div>
					</div>
				</ul>
			</div>
		</nav>
		<div class ="spacing"></div>
		<?php
			if($_SESSION['admin_access'] == 'Admin'){
		?>
		<div class="menu">
			<div class="box">
				<a href="admin_order\admin_order.php">View Orders</a>
			</div>
			<div class="box">
				<a href="admin_sale\admin_sale.php">Sales Report</a>
			</div>
			<div class="box">
				<a href="admin_customer\admin_customer.php">Customer List</a>
			</div>
			<div class="box">
				<a href="admin_product\admin_product.php">Manage Products</a>
			</div>
			<div class="box">
				<a href="admin_addAdmin\admin_addAdmin.php">Add New Account</a>
			</div>
		</div>
		
		<?php
			}elseif($_SESSION['admin_access'] == 'Manager'){
		?>
		<div class="menu">
			<div class="box">
				<a href="admin_order\admin_order.php">View Orders</a>
			</div>
			<div class="box">
				<a href="admin_sale\admin_sale.php">Sales Report</a>
			</div>
			<div class="box">
				<a href="admin_customer\admin_customer.php">Customer List</a>
			</div>
		</div>
		<?php
			}elseif($_SESSION['admin_access'] == 'Owner'){
		?>
		<div class="menu">
			<div class="box">
				<a href="admin_order\admin_order.php">View Orders</a>
			</div>
			<div class="box">
				<a href="admin_sale\admin_sale.php">Sales Report</a>
			</div>
			<div class="box">
				<a href="admin_customer\admin_customer.php">Customer List</a>
			</div>
			<div class="box">
				<a href="admin_product\admin_product.php">Manage Products</a>
			</div>
			<div class="box">
				<a href="admin_addAdmin\admin_addAdmin.php">Add New Account/s</a>
			</div>
			<div class="box">
				<a href="admin_manageAdmin\admin_manageAdmin.php">Manage Accounts</a>
			</div>
		</div>
		<?php
			}
		?>
	</body>
</html>