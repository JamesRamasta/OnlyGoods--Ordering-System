<?php
include("session-checker.php");
require_once "config.php";

$uName = $_SESSION['user_name'];

if (isset($_POST['btn_submit'])) {
	$sql = "SELECT * FROM customer WHERE user_name = ? AND password = ?";
	if ($stmt = mysqli_prepare($link, $sql)) {
		mysqli_stmt_bind_param($stmt, "ss", $uName, md5($_POST['txt_pass']));
		if (mysqli_stmt_execute($stmt)) {
			$result = mysqli_stmt_get_result($stmt);
			if (mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$sql2 = "UPDATE customer SET user_name=?, email=?, address=?, phone_number=?, password=? WHERE customer_ID = ?";
				if (($_POST["txt_newPass"] === $_POST["txt_newPass2"]) && !empty($_POST["txt_newPass"])) {
					if($stmt = mysqli_prepare($link, $sql2)){
						mysqli_stmt_bind_param($stmt, "ssssss", $_POST['txt_username'],$_POST['txt_email'],$_POST['txt_address'],$_POST['txt_number'],md5($_POST['txt_newPass']),$_GET['customer_ID']);
						if(mysqli_stmt_execute($stmt)){
							$_SESSION['user_name'] = $_POST['txt_username'];
							$_SESSION['email'] = $_POST['txt_email'];
							$_SESSION['password'] = $_POST['txt_newPass'];
							$_SESSION['address'] = $_POST['txt_address'];
							$_SESSION['phone_number'] = $_POST['txt_number'];
							echo("<script>alert('Account Information Updated!')</script>");
							echo("<script>location = 'accountSettings.php';</script>");
							exit();
						}else{
							echo "Error on updating account";
						}
					}else{
						echo "Error on load";
					}
				}elseif (($_POST["txt_newPass"] === $_POST["txt_newPass2"]) && empty($_POST["txt_newPass"])) {
					if($stmt = mysqli_prepare($link, $sql2)){
					mysqli_stmt_bind_param($stmt, "ssssss", $_POST['txt_username'],$_POST['txt_email'],$_POST['txt_address'],$_POST['txt_number'],md5($_POST['txt_pass']),$_GET['customer_ID']);
						if(mysqli_stmt_execute($stmt)){
							$_SESSION['user_name'] = $_POST['txt_username'];
							$_SESSION['email'] = $_POST['txt_email'];
							$_SESSION['password'] = $_POST['txt_pass'];
							$_SESSION['address'] = $_POST['txt_address'];
							$_SESSION['phone_number'] = $_POST['txt_number'];
							echo("<script>alert('Account Information Updated!')</script>");
							echo("<script>location = 'accountSettings.php';</script>");
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
				echo("<script>alert('Incorrect Password!')</script>");
				echo("<script>location = 'updateAccountSettings.php';</script>");
			}
		}else{
			echo "Error on your select statement";
		}
	}
}else{
	if (isset($_GET['customer_ID']) && !empty(trim($_GET['customer_ID']))){
		$sql = "SELECT * FROM customer WHERE customer_ID = ?";
		if ($stmt = mysqli_prepare($link, $sql)){
			mysqli_stmt_bind_param($stmt, "s", $_GET['customer_ID']);
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
		<title>Only Goods | customer</title>
		<meta charset = "UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
	<script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<!-- ICONS  -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css' />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<!-- FONTS  -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@600;700;800;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
	<link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>
	<link href="http://fonts.cdnfonts.com/css/glacial-indifference-2" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="style-2.css">
	  
	</head>
	
  <body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
      <a class="navbar-brand" href="index.php"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <a href="index.php"><img src="images/logo.png" style="width:80px;height:42px;margin-left:20%;" class="logo_enable"></a>
        <ul class="navbar-nav ml-auto">
          <li class="d-lg-none">
              <a href="index.php" class="text d-lg-none">Home</a>
              <hr class="d-lg-none" />
            </li>
          <li class="nav-item d-none d-lg-block"><a class="nav-link" href="index.php">Home</a></li>
          <li class="d-lg-none">
              <a href="about.php" class="text d-lg-none">About</a>
              <hr class="d-lg-none" />
            </li>
          <li class="nav-item d-none d-lg-block"><a class="nav-link" href="about.php">About</a></li>
          <li class="d-lg-none">
              <a href="products.php" class="text d-lg-none">Products</a>
              <hr class="d-lg-none" />
            </li>
          <li class="nav-item d-none d-lg-block"><a class="nav-link" href="products.php">Products</a></li>
          <li class="d-lg-none">
              <a href="faq.php" class="text d-lg-none">FAQ</a>
              <hr class="d-lg-none" />
            </li>
          <li class="nav-item d-none d-lg-block"><a class="nav-link" href="faq.php">FAQ</a></li>
          <li class="d-lg-none">
            <a href="cart.php?customer_ID=<?= $_SESSION['customer_ID']; ?>'" class="text d-lg-none">Cart</a>
            <hr class="d-lg-none" />
          </li>
          <li class="nav-item d-none d-lg-block"><a class = "nav-link"><i class="fas fa-shopping-cart" onclick="location.href='cart.php?customer_ID=<?= $_SESSION['customer_ID']; ?>'"></i><span id="cart-item" class="badge badge-danger"></span></a></li>
          <li class="d-lg-none">
            <a href="accountSettings.php" class="text d-lg-none"> Account Settings</a>
            <hr class="d-lg-none" />
          </li>
          <li class="d-lg-none">
            <a href="signout.php" class="text d-lg-none">Logout</a>
          </li>
          <div class="dropdown logo_enable">
            <li class="nav-item" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><a href="admin_signout.php"><span class="iconify" data-icon="bx:bx-user-circle" style="color: white; margin-top: 5px;" data-width="50" data-height="40"></span></a></li>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
              <button class="dropdown-item" type="button"><a href="myOrder.php">My Orders</a></button>
              <button class="dropdown-item" type="button"><a href="accountSettings.php">Account Settings</a></button>
              <hr />
              <button class="dropdown-item" type="button"><a href="signout.php">Logout</a></button>
            </div>
          </div>
        </ul>
      </div>
    </nav>
		<div class ="spacing"></div>
		<FORM ACTION = "<?php echo htmlspecialchars(basename($_SERVER["REQUEST_URI"])); ?>" METHOD = "POST">
			<br><br><br><br>
			<h2 style = "font-family: Abril Fatface, cursive; color:#56382d;"><center>Update Account</center></h2>
			<hr>
			<center>
			<label for="user_name" style = "margin-left: 60px">Username: </label>
			<input type="text" placeholder="Enter Username" name="txt_username" value="<?php echo $_SESSION['user_name']?>" ><br>
			<label for="email"  style = "margin-left: 30px">Email Address: </label>
			<input type="text" placeholder="Enter Account Email" name="txt_email" value="<?php echo $_SESSION['email']?>" ><br>
			<hr />
			<label for="address" style = "margin-left: 75px">Address: </label>
			<input type="text"  placeholder="Enter Address" name="txt_address" value="<?php echo $_SESSION['address']?>" ><br>
			<label for="phone_number" style = "margin-left: 68px">Contact#: </label>
			<input type="text" placeholder="Enter Phone Number" name="txt_number" value="<?php echo $_SESSION['phone_number']?>" ><br>
			<hr />
			<label style = "margin-left: 68px">Password: </label>
			<input type="password" placeholder="Enter New Password" name="txt_newPass" ><br>
			<label >Confirm Password: </label>
			<input type="password" placeholder="Confirm New Password" name="txt_newPass2" ><br>
			<hr />
			<label>Current Password: </label>
			<input type="password" placeholder="Enter Password" name="txt_pass" required><br>
			<button type="submit" style="background-color: #56382d; color: white; " name="btn_submit">Update</button> &nbsp;
			<button type="cancel"  style="background-color: #56382d; color: white; " onclick="window.location='accountSettings.php';return false;">Cancel</button>
			</center>		
		
		
	<!-------- ADD TO CART FUNCTION SCRIPT -------->
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
	<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script> -->

	<script type="text/javascript">
		$(document).ready(function() {

			// Send product details in the server
			$(".addItemBtn").click(function(e) {
				e.preventDefault();
				var $form = $(this).closest(".form-submit");
				var pid = $form.find(".pid").val();
				var pname = $form.find(".pname").val();
				var pdesc = $form.find(".pdesc").val();
				var pprice = $form.find(".pprice").val();
				var pcode = $form.find(".pcode").val();
				var pqty = $form.find(".pqty").val();

				$.ajax({
					url: 'action.php',
					method: 'post',
					data: {
						pid: pid,
						pname: pname,
						pdesc: pdesc,
						pprice: pprice,
						pqty: pqty,
						pcode: pcode
					},
					success: function(response) {
						$("#message").html(response);
						window.scrollTo(0, 0);
						load_cart_item_number();
					}
				});
			});

			// Load total no.of items added in the cart and display in the navbar
			load_cart_item_number();

			function load_cart_item_number() {
				$.ajax({
					url: 'action.php',
					method: 'get',
					data: {
						cartItem: "cart_item"
					},
					success: function(response) {
						$("#cart-item").html(response);
					}
				});
			}
		});
	</script>
	
		</body>

</html>