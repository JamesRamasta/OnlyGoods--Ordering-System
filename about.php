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
  <?php
  }
  ?>
  <!-- About -->
  <div class="about_section padding">
    <div class="about-container">
      <div class="about-text">
        <p style="color:#56382d; font-family: Abril Fatface, cursive;">About </p>
      </div>
      <div class="about-details" style='font-family:Darker Grotesque, sans-serif;'>
        <p>Only Goods is an online dessert shop where people can buy homemade desserts and treats.
          Their shop was only accessible via Facebook and Instagram.
          Customers can place their orders through third-party delivery services such as
          Grab, Lalamove, Toktok, and Mr. Speedy.
          Only goods are solely baking and making your favorites from our little kitchen.</p><br>
        <div class="about-text">
          <p style="color:#56382d; font-family: Abril Fatface, cursive; font-size: 25px;">A short story from a baker & passionate by the heart. </p>
        </div>

        Hey, everyone! My name is Mae, and I’m a home baker from Caloocan!
        I've been a fan of baking ever since and as this pandemic arises,
        being unemployed is an everyday struggle. Baking is a labor of love because I enjoy it
        more than anything in the world. I want to share the happiness that it gives me with
        the people who taste what I make and made me into this small home baking business.
        I started in November 2020, and until now, I have survived;
        even though some days are not that good earning but still it's gold for me.
        And most importantly, I wanted to turn my passion into a business venture for two reasons:
        I want to make these unpredictable, stressful times just a little bit better, and
        I want to have my means to support important causes.<br><br>

        
        <div class="about-text">
        <p style="color:#56382d; font-family: Abril Fatface, cursive; ">Location </p>
        <p style="color:#56382d; font-size: 25px; font-family:Darker Grotesque, sans-serif; ">🚩North Caloocan Based</p>
        <a href="https://www.google.com/maps/place/1420+Deparo+Rd,+Barangay+168,+Caloocan,+Metro+Manila/@14.7427378,121.0215762,21z/data=!4m13!1m7!3m6!1s0x3397b1b70670093d:0x63895f8fcfcabf28!2sDeparo+Rd,+Caloocan,+Metro+Manila!3b1!8m2!3d14.7471709!4d121.0210386!3m4!1s0x3397b1ba76caea45:0xa01da3f5dd250a9d!8m2!3d14.7427786!4d121.021695"> 
        <p style="color:#56382d; font-size: 25px; font-family:Darker Grotesque, sans-serif; ">📍Deparo 1420 Caloocan, Philippines</p>
        </a>
        </div>
      <img src="images/Location Only Goods (From Google Maps).png" alt="Location of Only Goods" style="display:block; margin-left:auto; margin-right:auto; width:50%; ">
        

      </div>
    </div>
  </div>
  <!-- Footer Bar -->
  <footer class="container-fluid text-center" id="socials_section">
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <h3 style="font-family: Abril Fatface, cursive;">Socials</h3>
        <a href="https://www.facebook.com/onlygoods.mnl/" target="_blank" class="fa fa-facebook"></a>
        <a href="https://www.instagram.com/onlygoods.mnl/" target="_blank" class="fa fa-instagram"></a>
      </div>
      <div class="col-sm-4"></div>
    </div>
  </footer>
  <!-------- ADD TO CART FUNCTION SCRIPT -------->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script> -->

  <script type="text/javascript">
    $(document).ready(function() {
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