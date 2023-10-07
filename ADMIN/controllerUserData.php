<?php 
session_start();
require "config.php";
$email = "";
$name = "";
$errors = array();

    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($link, $_POST['email']);
        $check_email = "SELECT * FROM admin WHERE admin_email='$email'";
        $run_sql = mysqli_query($link, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE admin SET code = $code WHERE admin_email = '$email'";
            $run_query =  mysqli_query($link, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: onlygoods@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "We've sent a password reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($link, $_POST['otp']);
        $check_code = "SELECT * FROM admin WHERE code = $otp_code";
        $code_res = mysqli_query($link, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['admin_email'];
            $_SESSION['email'] = $email;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($link, md5($_POST['password']));
        $cpassword = mysqli_real_escape_string($link, md5($_POST['cpassword']));
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            //$encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE admin SET code = $code, admin_pass = '$password' WHERE admin_email = '$email'";
            $run_query = mysqli_query($link, $update_pass);
            if($run_query){
                echo("<script>alert('Password Change Successful!')</script>");
                echo("<script>location = 'admin_signin.php';</script>");
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
	
	//Send Warning for being Inactive
	if (isset($_POST['generate-email'])) {
		$email = mysqli_real_escape_string($link, $_POST['txt_email']);
		$check_email = "SELECT * FROM customer WHERE email='$email'";
		$run_sql = mysqli_query($link, $check_email);
		if($run_sql){
			$subject = "Deactivation of Account";
			$message = "Your account has not been used for 5 months. Please log in for the next 30 days to prevent the deactivation of your account.";
			$sender = "From: OnlyGoods MNL";
			if(mail($email, $subject, $message, $sender)){
				$info = "We've sent a password reset otp to your email - $email";
				$_SESSION['info'] = $info;
				$_SESSION['email'] = $email;
				echo("<script>alert('Email Sent!')</script>");
				header('location: admin_customer.php');
				exit();
			}else{
				$errors['generate-email'] = "Failed while sending code!";
			}
		}else{
			$errors['db-error'] = "Something went wrong!";
		}
    }
	
	//Deactivation of Account
	if (isset($_POST['deacAccount'])) {
		$cCode = rand(999999, 111111);
		$cEmail = $_POST['cEmail'];
		$cID = $_POST['cid'];
		$deac_account = "UPDATE customer SET status = 'notverified', code = '$cCode' WHERE customer_ID = '$cID'";
		$run_query = mysqli_query($link, $deac_account);
		
		if($run_query){
            $subject = "Email Re-Activation Code";
            $message = "Your account has been disabled due to inactivity. Please use this verification code to re-activate your account: $cCode. If no action is done, your account will be deleted within 30 days.";
            $sender = "From: OnlyGoods MNL";
            if(mail($cEmail, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $cEmail";
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
		}
	}
	
	//Deletion of not verified accounts
	if (isset($_POST['generate-deletion'])) {
		$c_Email = $_POST['c_Email'];
		$c_ID = $_POST['c_id'];
		$c_log = $_POST['c_logDate'];
		$del_Account ="DELETE FROM customer WHERE customer_ID = '$c_ID'";
		$run_query = mysqli_query($link, $del_Account);
		
		if($run_query){
            $subject = "Only Goods Account Deleted";
            $message = "Our system have observed that your account has not been used or re-activated since '$c_log'. Therefore we have decided to delete your account. Thank you for using our service!";
            $sender = "From: OnlyGoods MNL";
            if(mail($c_Email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $c_Email";
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
		}
	}
?>