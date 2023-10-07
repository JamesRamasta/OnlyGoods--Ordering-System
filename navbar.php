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
          <li class="nav-item d-none d-lg-block"><a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a></li>
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
              <a href="cart.php" class="text d-lg-none">Cart</a>
              <hr class="d-lg-none" />
            </li>
          <li class="nav-item d-none d-lg-block"><a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a></li>
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