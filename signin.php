<?php require_once "controllerUserData.php"; ?>

<html>

<head>
  <title>Only Goods</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="admin_signin.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
  <script src="https://code.iconify.design/2/2.2.0/iconify.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="accountcreation.css">
  <link rel="stylesheet" href="account_design.css">
</head>

<body>
  <div class="signin">
    <img src="images/userbg.jpg" alt="UserBG" class="img-responsive" height="620">
    <div class="center">
    <a href="index.php"><span class="iconify" data-icon="typcn:arrow-left-thick" data-width="50" data-height="50"></span></a>
      <h1 style="color:#56382d; font-family: Abril Fatface, cursive;">Only Goods<br><span class="iconify" data-icon="bx:bx-user-circle" style="margin-top: 5px;" data-width="70" data-height="70"></span></h1>

      <form action="signin.php" method="POST" autocomplete="">
        <?php
        if (count($errors) > 0) {
        ?>
          <div class="alert alert-danger text-center">
            <?php
            foreach ($errors as $showerror) {
              echo $showerror;
            }
            ?>
          </div>
        <?php
        }
        ?>
        <div class="txt_field">
          <input type="text" name="txt_uName" required>
          <span></span>
          <label style="font-size: 20px;"><span class="iconify-inline" data-icon="carbon:email"></span> Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="txt_pass" id="myInput" required><i class="far fa-eye" onclick="myFunction()" style="margin-left: -30px; cursor: pointer;"></i>
          <span></span>
          <label style="font-size: 20px;"><span class="iconify-inline" data-icon="ri:lock-password-line"></span> Password</label>
        </div>
        <div class="pass" style="float:right; font-size: 20px;"><a href="forgot-password.php">Forgot Password?</a></div>
        <input type="submit" name="login" value="L o g i n" style="font-size: 20px;">
        <div class="signup_link" style="font-size: 20px;">
          Not a member? <a href="signup.php">Signup</a>
        </div>
      </form>
    </div>
  </div>
  <script>
    function myFunction() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>
</body>

</html>