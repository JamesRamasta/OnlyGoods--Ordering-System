<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
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
        <div class="center">
            <h1 style="color:#56382d; font-family: Abril Fatface, cursive;">Only Goods<br><span class="iconify" data-icon="bx:bx-user-circle" style="margin-top: 5px;" data-width="70" data-height="70"></span></h1>
            <form action="forgot-password.php" method="POST" autocomplete="">
                <h2>Find Your Account<br></h2>
                <div class="txt_field">
                    <input type="email" name="email" required>
                    <span></span>
                    <label><span class="iconify-inline" data-icon="carbon:email"></span> Email</label>
                </div>
                    <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                <div class="form-group">
                    <input type="submit" name="check-email" value="C o n t i n u e">
                </div>
            </form>
        </div>
    </div>
</body>
</html>