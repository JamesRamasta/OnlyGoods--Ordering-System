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
  <link rel='stylesheet' href='hti tps://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css' />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

  <!-- FONTS  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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

  <!--faq-->
  <div class="about_section padding">
    <div class="about-container">
      <div class="faq-details">
        <div class="faq-text">
          <p style="color:#56382d; font-family: Abril Fatface, cursive;">The following are the policy of the Only Goods shop:</p>
        </div>

        <p style="font-weight:bold;font-size:30px;">1. Order</p>
        <div style="font-size:22px;" class="faq-details indent">
          <p>All orders should be placed 2-3 days prior to the desired delivery date otherwise the order will be cancelled.</p>
        </div>

        <p style="font-weight:bold;font-size:30px;">2. Cancelation</p>
        <div style="font-size:22px;" class="faq-details indent">
          <p>For the cancellation of the order, the customer is only allowed to cancel within the day. The down payment will not be refunded for the canceled order/s.</p>
        </div>

        <p style="font-weight:bold;font-size:30px;">3. Return and exchange </p>
        <div style="font-size:22px;" class="faq-details indent">
          <p>The Only Goods Shop does not accept a return or exchange policy unless the error in the order was made from the side of the client, in which case, the client will send an order for free to cater for the wrong product/s delivered.</p>
        </div>

        <p style="font-weight:bold;font-size:30px;">4. Downpayment </p>
        <div style="font-size:22px;" class="faq-details indent">
          <p>Upon placing an order on Only Goods, the customer must pay a 20% fee down payment. The customer is required to pay this fee before their product can be delivered. The remaining balance must be paid on the day of the delivery of the product.</p>
        </div>

        <p style="font-weight:bold;font-size:30px;">5. Bulk orders </p>
        <div style="font-size:22px;" class="faq-details indent">
          <p>For planned bulk orders, there is a limited quantity of only 20 maximum pieces allowed per order. Furthermore, it is advised that orders should be placed 2-5 days before the date the products are needed as the baking process of bulk orders may take time depending on the quantity of the orders. If the orders would like to be rushed, there will be an additional fee of 50 pesos that will be needed to be paid.</p>
        </div>

        <p style="font-weight:bold;font-size:30px;">6. Payment</p>
        <div style="font-size:22px;" class="faq-details indent">
          <p>The online mode of payment for the purchases either in full or down payment shall be paid via G-Cash (<b>Sheara Mae B.</b> - <b>09460819167</b>). Down payment is required in all purchases to have the utmost assurance in all purchases. Should the customer not pay in full through online payments, the remaining balance shall be paid via cash on delivery upon arrival of goods.</p>
        </div>

        <p style="font-weight:bold;font-size:30px;">7. Changing of orders </p>
        <div style="font-size:22px;" class="faq-details indent">
          <p>For the changing of orders, Only Goods customers are allowed to change within 24 hours or a day after the customer orders. After the 24 hrs changing of orders policy, it can no longer be accepted as it will be stated before the customer places an order. </p>
        </div>

        <p style="font-weight:bold;font-size:30px;">8. Delivery</p>
        <div style="font-size:22px;" class="faq-details indent">
          <p>The mode of delivery is via third-party apps such as Grab, Lalamove, TokTok and Mr. Speedy. Shipping fee is not included in the total amount payable in the checkout page.</p>
        </div>
        <br/><br/>



        <!--Shipping fee rates table-->
        <h1 style="text-align:center;"><b>Shipping Rates of Mr. Speedy</b></h1>
        <h5 style="text-align:center;">(Shipping fee may vary)</h5>
        <div id="SFtable" style="font-size:23px;">
          <Table style="width:100%; border:1px solid black; text-align:center; margin-left: auto; margin-right: auto;">
            <tr>
              <th style="border:2px solid black; background:#ffd198;">Capital District<br> (1st District)</th>
              <th style="border:2px solid black; background:#ffd198;">Eastern Manila District</th>
              <th style="border:2px solid black; background:#ffd198;">Northern Manila District</th>
              <th style="border:2px solid black; background:#ffd198;">Southern Manila District <br> (4th District)</th>
            </tr>
            <tr>
              <td style="border:2px solid black;">Manila - (₱173 - ₱193)</td>
              <td style="border:2px solid black;">Mandaluyong - (₱198 - ₱218)</td>
              <td style="border:2px solid black;">Caloocan - (₱95 - ₱115)</td>
              <td style="border:2px solid black;">Las piñas - (₱311 - ₱331)</td>
            </tr>
            <tr>
              <td style="border:2px solid black;"></td>
              <td style="border:2px solid black;">Marikina - (₱156 - ₱176)</td>
              <td style="border:2px solid black;">Malabon - (₱135 - ₱155)</td>
              <td style="border:2px solid black;">Makati - (₱211 - ₱231)</td>
            </tr>
            <tr>
              <td style="border:2px solid black;"></td>
              <td style="border:2px solid black;">Pasig/Quezon - (₱193 - ₱213)</td>
              <td style="border:2px solid black;">Navotas - (₱153 - ₱173)</td>
              <td style="border:2px solid black;">Muntinlupa - (₱320 - ₱340)</td>
            </tr>
            <tr>
              <td style="border:2px solid black;"></td>
              <td style="border:2px solid black;">San Juan - (₱215 - ₱235)</td>
              <td style="border:2px solid black;">Valenzuela - (₱126 - ₱146)</td>
              <td style="border:2px solid black;">Parañaque - (₱289 - ₱409)</td>
            </tr>
            <tr>
              <td style="border:2px solid black;"></td>
              <td style="border:2px solid black;"></td>
              <td style="border:2px solid black;"></td>
              <td style="border:2px solid black;">Pasay - (₱249 - ₱269)</td>
            </tr>
            <tr>
              <td style="border:2px solid black;"></td>
              <td style="border:2px solid black;"></td>
              <td style="border:2px solid black;"></td>
              <td style="border:2px solid black;">Pateros - (₱214 - ₱234)</td>
            </tr>
            <tr>
              <td style="border:2px solid black;"></td>
              <td style="border:2px solid black;"></td>
              <td style="border:2px solid black;"></td>
              <td style="border:2px solid black;">Taguig - (₱259 - ₱279)</td>
            </tr>
          </Table>
        </div>
        <h2 style="text-align:center;">You can click <a href="https://borzodelivery.com/ph/tariffs" target="_blank">here</a> for the specific calculation of your shipping fee.</h2><br/>

      </div>
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