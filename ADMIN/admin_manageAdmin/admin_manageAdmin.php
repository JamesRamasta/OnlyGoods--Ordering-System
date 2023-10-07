<?php
	include("../admin_sessionChecker.php");
	include("../admin_accessChecker.php");
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
	  <link rel = "stylesheet" href = "admin_manageAdmin.css">
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

				echo "<center>";
				echo "<br>";
				echo "<table>";
				echo "<tr>";
				echo "<th>Username</th>";
				echo "<th>Email</th>";
				echo "<th>Access Level</th>";
				echo "<th>Update Account</th>";
				echo "</tr>";
				function build_table($result){
					if(mysqli_num_rows($result) > 0){
						
						while ($row = mysqli_fetch_array($result)){
							echo "<tr>";
							echo "<td>".$row['admin_name']."</td>";
							echo "<td>".$row['admin_email']."</td>";
							echo "<td>".$row['admin_access']."</td>";
							echo "<td>";
							
							?>
							
							<button onclick="location.href='admin_updateAccount.php?admin_ID=<?= $row['admin_ID']; ?>'">Update</button>
							&nbsp;
							<button data-toggle="modal" data-target="#delete<?= $row['admin_ID']; ?>">Delete</button>
							<!---------- DELETE MODAL ---------->
							<div class="modal fade" id="delete<?= $row['admin_ID']?>" role="dialog">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">Delete Account</h4>
										</div>
										<div class="modal-body">
											<p>Delete <?= $row['admin_name']?> from the accounts list?</p>
										</div>
										<div class="modal-footer">
											<button onclick="location.href='admin_deleteAdmin.php?admin_ID=<?= $row['admin_ID']; ?>'">Yes</button>
											<button onclick="location.href='admin_manageAdmin.php'">Cancel</button>
										</div>
									</div>
								</div>
							</div>
							<!---------- END OF MODALS ---------->
							<?php
							echo "</td>";
							echo "</tr>";
							
						}
						echo "</table>";
						echo "</center>";
					}
				}

				echo "<center><br>";
				echo "<h2>ACCOUNT MANAGEMENT</h2><br>";
				echo "</center>";

			$sql = 'SELECT * FROM admin WHERE (admin_access="Admin" OR  admin_access="Manager") ORDER by admin_ID';
				if($stmt = mysqli_prepare($link, $sql)){
					if(mysqli_stmt_execute($stmt)){
						$result = mysqli_stmt_get_result($stmt);
						build_table($result);
					}
				}else{
					echo "Error on form load";
				}
				?>
			</div>
		</div>
		
	
	</body>
</html>