<?php
require 'config.php';
session_start();

$grand_total = 0;
$allItems = '';
$items = [];

$sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart WHERE customer_ID=?";
$stmt = $link->prepare($sql);
$stmt->bind_param('s', $_GET['customer_ID']);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
  $grand_total += $row['total_price'];
  $items[] = $row['ItemQty'];
}
$allItems = implode(', ', $items);
?>
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
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


  <!-- ICONS  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css' />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

  <!-- FONTS  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
  <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="products.css">
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
        <li class="nav-item d-none d-lg-block"><a class="nav-link"><i class="fas fa-shopping-cart" onclick="location.href='cart.php?customer_ID=<?= $_SESSION['customer_ID']; ?>'"></i><span id="cart-item" class="badge badge-danger"></span></a></li>
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
  <!-- Under Image Text -->
  <div class="under_text padding caption text-center"></br>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="order">
        <div class="jumbotron p-3 mb-2 text-center">
          <h1>Order Verification</h1>
          <h6 class="lead"><b>Product(s) : </b><?= $allItems; ?></h6>
          <h5><b>Total Amount Payable : </b>₱<?= number_format($grand_total, 2) ?>/-</h5>
        </div>
        <form action="" method="post" id="placeOrder">
          <input type="hidden" name="products" value="<?= $allItems; ?>">
          <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?= $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?>" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" value="<?= $_SESSION['email'] ?>" required>
          </div>
          <div class="form-group">
            <input type="text" maxlength="11" name="phone" class="form-control" placeholder="Enter Phone" value="<?= $_SESSION['phone_number'] ?>" required>
          </div>
          <div class="form-group">
            <label for='delivery'>Delivery Date:</label>
            <input type='date' name='delivery' id="date_picker" required>

            <script language="javascript">
              var today = new Date();
              var dd = String(today.getDate() + 2).padStart(2, '0');
              var mm = String(today.getMonth() + 1).padStart(2, '0');
              var yyyy = today.getFullYear();

              today = yyyy + '-' + mm + '-' + dd;
              $('#date_picker').attr('min', today);
            </script>

          </div>
          <div class="form-group">
            <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..." required><?= $_SESSION['address'] ?></textarea>
          </div>

          <div class="form-group">
          <input type="checkbox" name="checkActive"> Set as Default Contact Number and Delivery Address</input>
            <center><br>
              <input type="submit" name="submit" value="Place Order" class="btn cart-btn">
            </center>
          </div>

        </form>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <!--<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>-->

  <script type="text/javascript">
    $(document).ready(function() {

      // Sending Form data to the server
      $("#placeOrder").submit(function(e) {
        e.preventDefault();
        $.ajax({
          url: 'action.php',
          method: 'post',
          data: $('form').serialize() + "&action=order",
          success: function(response) {
            $("#order").html(response);
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