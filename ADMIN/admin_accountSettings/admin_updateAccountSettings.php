<?php
include("../admin_sessionChecker.php");
require_once "../config.php";

$uName = $_SESSION['admin_name'];

if (isset($_POST['btn_submit'])) {
	$sql = "SELECT * FROM admin WHERE admin_name = ? AND admin_pass = ?";
	if ($stmt = mysqli_prepare($link, $sql)) {
		mysqli_stmt_bind_param($stmt, "ss", $uName, md5($_POST['txt_adminPass']));
		if (mysqli_stmt_execute($stmt)) {
			$result = mysqli_stmt_get_result($stmt);
			if (mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$sql2 = "UPDATE admin SET admin_name=?, admin_email=?, admin_pass=? WHERE admin_ID = ?";
				if (($_POST["txt_adminNewPass"] === $_POST["txt_adminNewPass2"]) && !empty($_POST["txt_adminNewPass"])) {
					if($stmt = mysqli_prepare($link, $sql2)){
						mysqli_stmt_bind_param($stmt, "ssss", $_POST['txt_adminName'],$_POST['txt_adminEmail'],md5($_POST['txt_adminNewPass']),$_GET['admin_ID']);
						if(mysqli_stmt_execute($stmt)){
							$_SESSION['admin_name'] = $_POST['txt_adminName'];
							$_SESSION['admin_email'] = $_POST['txt_adminEmail'];
							$_SESSION['admin_pass'] = $_POST['txt_adminNewPass'];
							echo("<script>alert('Account Updated!')</script>");
							echo("<script>location = 'admin_accountSettings.php';</script>");
							exit();
						}else{
							echo "Error on updating account";
						}
					}else{
						echo "Error on load";
					}
				}elseif (($_POST["txt_adminNewPass"] === $_POST["txt_adminNewPass2"]) && empty($_POST["txt_adminNewPass"])) {
					if($stmt = mysqli_prepare($link, $sql2)){
					mysqli_stmt_bind_param($stmt, "ssss", $_POST['txt_adminName'],$_POST['txt_adminEmail'],md5($_POST['txt_adminPass']),$_GET['admin_ID']);
						if(mysqli_stmt_execute($stmt)){
							$_SESSION['admin_name'] = $_POST['txt_adminName'];
							$_SESSION['admin_email'] = $_POST['txt_adminEmail'];
							$_SESSION['admin_pass'] = $_POST['txt_adminPass'];
							echo("<script>alert('Account Updated!')</script>");
							echo("<script>location = 'admin_accountSettings.php';</script>");
							exit();
						}else{
							echo "Error on updating account";
						}
					}else{
						echo "Error on load";
					}
				}else{
					echo("<script>alert('Password did not match')</script>");
				}
			}else{
				echo("<script>alert('Incorrect account credentials!')</script>");
				echo("<script>location = 'admin_updateAccountSettings.php';</script>");
			}
		}else{
			echo "Error on your select statement";
		}
	}
}else{
	if (isset($_GET['admin_ID']) && !empty(trim($_GET['admin_ID']))){
		$sql = "SELECT * FROM admin WHERE admin_ID = ?";
		if ($stmt = mysqli_prepare($link, $sql)){
			mysqli_stmt_bind_param($stmt, "s", $_GET['admin_ID']);
			if (mysqli_stmt_execute($stmt)){
				$result = mysqli_stmt_get_result($stmt);
				if(mysqli_num_rows($result) == 1){
					$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				}else{
					echo("<script>alert('Error on finding the account')</script>");
				}
			}else{
				echo "Error on select statement";
			}
		}
	}
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
	  <link rel = "stylesheet" href = "admin_account.css">

	  
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
		<div class="responsive-form">
			<div class="responsive-form-2">
			<h2><center>Update Account</center></h2><hr>
			
			<FORM ACTION = "<?php echo htmlspecialchars(basename($_SERVER["REQUEST_URI"])); ?>" METHOD = "POST">
			
				<div class="content">
					<center>
					<label for="admin_name">Username: </label>
					<input type="text" placeholder="Enter Username" name="txt_adminName" value="<?php echo $_SESSION['admin_name']?>" ><br>
					<hr>
					<label for="admin_email">Email Address: </label>
					<input type="text" placeholder="Enter Account Email" name="txt_adminEmail" value="<?php echo $_SESSION['admin_email']?>" ><br><hr/>
					<label>Password: </label>
					<input type="password" placeholder="Enter New Password" name="txt_adminNewPass" >
					<br>
					<label>Confirm Password: </label>
					<input type="password" placeholder="Confirm New Password" name="txt_adminNewPass2" ><br>
					<hr />
					<label>Current Password: </label>
					<input type="password" placeholder="Enter Password" name="txt_adminPass" required>
					<br/><br/>
					<button type="submit" class="lower" name="btn_submit">Update</button>
					<button type="cancel" class="lower" onclick="window.location='admin_accountSettings.php';return false;">Cancel</button>
					</center>
				</div>
			</FORM>		
	</body>
</html>