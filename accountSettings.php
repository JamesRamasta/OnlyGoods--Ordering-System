<!DOCTYPE html>
<html>

<head>
	<title>Only Goods</title>
	<meta charset="UTF-8">
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
    <?php
    session_start();
    if (!isset($_SESSION['user_name'])) {
    ?>
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
              <a href="cart.php" class="text d-lg-none">Cart</a>
              <hr class="d-lg-none" />
            </li>
          <li class="nav-item d-none d-lg-block"><a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
          <li class="d-lg-none">
            <a href="signin.php" class="text d-lg-none">Login</a>
          </li>
          <li class="nav-item d-none d-lg-block"><a href="signin.php"><span class="iconify" data-icon="bx:bx-user-circle" style="color: white; margin-top: 5px;" data-width="50" data-height="40"></span></a></li>
        </ul>
      </div>
    </nav>
  <?php
  } elseif (isset($_SESSION['user_name'])) {
  ?>
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
  <?php
  }
  ?>
	<div class="about-container">
		<div class="content about-details">
			<?php
			require_once "config.php";
			echo "<center><br>";
			echo "<h1>Account Settings</h1>";
			echo "<hr>";
			echo "<table>";
			echo "<tr><td>" . "Name: " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . "</td></tr>";
			echo "<tr><td>" . "Username: " . $_SESSION['user_name'] . "</td></tr>";
			echo "<tr><td>" . "Address: " . $_SESSION['address'] . "</td></tr>";
			echo "<tr><td>" . "Email: " . $_SESSION['email'] . "</td></tr>";
			echo "<tr><td>" . "Contact#: " . $_SESSION['phone_number'] . "</td></tr>";
			echo "</table>";
			?>
			<button onclick="location.href='updateAccountSettings.php?customer_ID=<?= $_SESSION['customer_ID']; ?>'" style="background-color: #56382d; color: white; " >Update</button>
		</div>
	</div>
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