<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: signin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
  <title>Only Goods</title>
  <link rel="stylesheet" href="accountcreation.css">
  <link rel="stylesheet" href="account_design.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
  <script src="https://code.iconify.design/2/2.2.0/iconify.min.js"></script>
</head>
<body>
  <div class="signup">
    <div class="center">
        <form action="user-otp.php" method="POST" autocomplete="off">
            <h2 class="text-center">Code Verification</h2>
            <?php 
            if(isset($_SESSION['info'])){
                ?>
                <div class="alert alert-success text-center">
                    <?php echo $_SESSION['info']; ?>
                    </div>
                    <?php
                        }
                    ?>
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

                    <div class="txt_field">
                        <input type="text" type="number" name="otp" required>
                        <span></span>
                        <label>Code</label>
                    </div>

                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    
</body>
</html>