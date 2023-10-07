<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: admin_signin.php');
}
?>
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
    <script>
      function myFunction() {
      var x = document.getElementById("pswd1");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }

    function myFunction2() {
      var x = document.getElementById("pswd2");
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
        <div class="center">
                <form action="new-password.php" method="POST" autocomplete="off">
                    <h1>New Password<br></h1>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        
                    </div>
                    <div class="txt_field">
                        <input type="password" id="pswd1" name="password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$" title="atleast 8 characters;
                        A mixture of both uppercase and lowercase letters;
                        A mixture of letters and numbers;
                        Inclusion of at least one special character" required><i class="far fa-eye" onclick="myFunction()" style="margin-left: -30px; cursor: pointer;"></i>
                        <span></span>
                        <label><span class="iconify-inline" data-icon="ri:lock-password-line"></span>New Password</label>
                    </div>

                    <div class="txt_field">
                        <input type="password" id="pswd2" name="cpassword" required><i class="far fa-eye" onclick="myFunction2()" style="margin-left: -30px; cursor: pointer;"></i>
                        <span></span>
                        <label><span class="iconify-inline" data-icon="ri:lock-password-line"></span>Confirm Password</label>
                    </div>

                    <div class="form-group">
                        
                    </div>
                    <div class="form-group">
                        <input type="submit" name="change-password" value="C h a n g e">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>