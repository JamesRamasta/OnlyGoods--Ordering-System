<!DOCTYPE html>
<html>
	<head>
		<title>Only Goods</title>
		<meta charset = "UTF-8">
		<meta name = "viewport" content = "width=device-width, initial-scale=1">
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
    <script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>


    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css' />

    <!-- FONT  -->
    <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700;900&display=swap" rel="stylesheet">

    <link rel = "stylesheet" href = "style.css">
    <link rel = "stylesheet" href = "products.css">
  </head>
  <body>
    <?php
      session_start();
      if (!isset($_SESSION['user_name'])) {
    ?>
    <!-- Navigation Bar -->
    <nav class = "navbar navbar-expand-lg navbar-light fixed-top">
      <a class = "navbar-brand" href = "index.php"></a>
      <button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#navbarNav" aria-controls = "navbarNav" aria-expanded = "false" aria-label = "Toggle navigation"><span class = "navbar-toggler-icon"></span></button>
      <div class = "collapse navbar-collapse" id = "navbarNav">
        <a href="index.php"><img src="images/logo.png" style="width:80px;height:42px;margin-left:20%;"></a>
        <ul class = "navbar-nav ml-auto">
          <li class = "nav-item"><a class = "nav-link" href = "index.php">Home</a></li>
  				<li class = "nav-item"><a class = "nav-link" href = "about.php">About</a></li>
  				<li class = "nav-item"><a class = "nav-link" href = "products.php">Products</a></li>
  				<li class = "nav-item"><a class = "nav-link" href = "faq.php">FAQ</a></li>          
  				<li class="nav-item"><a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a></li>
  				<li class = "nav-item"><a href="signin.php"><span class="iconify" data-icon="bx:bx-user-circle" style="color: white; margin-top: 5px;" data-width="50" data-height="40"></span></a></li>
        </ul>
      </div>
    </nav>
    <?php
		  }elseif (isset($_SESSION['user_name'])) {
		?>
    <!-- Navigation Bar -->
    <nav class = "navbar navbar-expand-lg navbar-light fixed-top">
      <a class = "navbar-brand" href = "index.php"></a>
      <button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#navbarNav" aria-controls = "navbarNav" aria-expanded = "false" aria-label = "Toggle navigation"><span class = "navbar-toggler-icon"></span></button>
      <div class = "collapse navbar-collapse" id = "navbarNav">
        <a href="index.php"><img src="images/logo.png" style="width:80px;height:42px;margin-left:20%;"></a>
        <ul class = "navbar-nav ml-auto">
          <li class = "nav-item"><a class = "nav-link" href = "index.php">Home</a></li>
          <li class = "nav-item"><a class = "nav-link" href = "about.php">About</a></li>
          <li class = "nav-item"><a class = "nav-link" href = "products.php">Products</a></li>
          <li class = "nav-item"><a class = "nav-link" href = "faq.php">FAQ</a></li>          
          <li class="nav-item"><a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a></li>
	  				<div class="dropdown">                   
	  					<li class = "nav-item" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><a href="admin_signout.php"><span class="iconify" data-icon="bx:bx-user-circle" style="color: white; margin-top: 5px;" data-width="50" data-height="40"></span></a></li>
	  					<div class="dropdown-products dropdown-products-right" aria-labelledby="dropdownMenu2">
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
<?php
require_once "config.php";
	if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
	  $name = $_POST['name'];
	  $email = $_POST['email'];
	  $phone = $_POST['phone'];
	  $products = $_POST['products'];
	  $grand_total = $_POST['grand_total'];
	  $address = $_POST['address'];
	  
	  $data = '';

	  $stmt = $link->prepare('INSERT INTO orders (name,email,phone,address,products,amount_paid)VALUES(?,?,?,?,?,?)');
	  $stmt->bind_param('ssssss',$name,$email,$phone,$address,$products,$grand_total);
	  $stmt->execute();
	  $stmt2 = $link->prepare('DELETE FROM cart');
	  $stmt2->execute();
	  $data .= '<div class="text-center">
								<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
								<h2 class="text-success">Your Order Placed Successfully!</h2>
								<h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $products . '</h4>
								<h4>Your Name : ' . $name . '</h4>
								<h4>Your E-mail : ' . $email . '</h4>
								<h4>Your Phone : ' . $phone . '</h4>
								<h4>Total Amount Paid : ' . number_format($grand_total,2) . '</h4>
						  </div>';
	  echo $data;
	}
?>