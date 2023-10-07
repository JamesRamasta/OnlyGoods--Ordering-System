<?php
if (isset($_POST['btn_submit'])) {
  require_once "config.php";
  $sql = "SELECT * FROM admin WHERE admin_name = ? AND admin_pass = ?";
  if ($stmt = mysqli_prepare($link, $sql)) {
    mysqli_stmt_bind_param($stmt, "ss", $_POST['txt_username'], md5($_POST['txt_password']));
    if (mysqli_stmt_execute($stmt)) {
      $result = mysqli_stmt_get_result($stmt);
      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        session_start();
        $_SESSION['admin_name'] = $_POST['txt_username'];
        $_SESSION['admin_access'] = $row['admin_access'];
        $_SESSION['admin_ID'] = $row['admin_ID'];
        $_SESSION['admin_email'] = $row['admin_email'];

        header("location: index.php");
      } else {
        echo ("<script>alert('Incorrect login credentials or account is inactive!')</script>");
        echo ("<script>location = 'admin_signin.php';</script>");
      }
    } else {
      echo "Error on your select statement";
    }
  }
}
?>
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
  <link rel="stylesheet" type="text/css" href="admin_signin.css">
  <script type="text/javascript">
    function myFunction() {
      var x = document.getElementById("pswd1");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>
</head>

<body>
  <div class = signin>
    <img src="../images/userbg.jpg" alt="UserBG" class = "img-responsive"  height="620">
  <div class="center">
    <h1 style="color:#56382d; font-family: Abril Fatface, cursive;">Only Goods<br><span class="iconify" data-icon="bx:bx-user-circle" style="margin-top: 5px;" data-width="70" data-height="70"></span></h1>
    <form method="post">
      <div class="txt_field">
        <input type="text" name="txt_username" required>
        <span></span>
        <label><span class="iconify-inline" data-icon="carbon:email"></span> Username</label>
      </div>
      <div class="txt_field">
        <input type="password" name="txt_password" id="pswd1" required><i class="far fa-eye" onclick="myFunction()" style="margin-left: -30px; cursor: pointer;"></i>
        <span></span>
        
        <span></span>
        <label><span class="iconify-inline" data-icon="ri:lock-password-line"></span> Password</label>
      </div>
      <div class="pass" style="float:right">
        <a class = "pass" href="forgot-password.php"> Forgot Password?</a>
      </div>
      <button type="submit" name="btn_submit">L o g i n</button>
    </form>
  </div>
</div>
</body>

</html>