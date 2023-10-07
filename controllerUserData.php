<?php 
session_start();
require "config.php";
$email = "";
$name = "";
$errors = array();

//if user signup button
if(isset($_POST['signup'])){
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $fname = mysqli_real_escape_string($link, $_POST['fname']);
    $lname = mysqli_real_escape_string($link, $_POST['lname']);
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = mysqli_real_escape_string($link, md5($_POST['password']));
    $cpassword = mysqli_real_escape_string($link, md5($_POST['cpassword']));
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM customer WHERE email = '$email'";
    $res = mysqli_query($link, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO customer (first_name, last_name, user_name, password, email, code,status, log_date)
                        values('$fname','$lname', '$username', '$password', '$email', '$code', '$status', CURDATE())";
        $data_check = mysqli_query($link, $insert_data);
        if($data_check){
            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "onlygoods.mnl@gmail.com";
            $to = "$email";
            $headers = "From:" . $sender;
            if(mail($to, $subject, $message, $headers)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!/Username is already taken!";
        }
    }

}
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($link, $_POST['otp']);
        $check_code = "SELECT * FROM customer WHERE code = $otp_code";
        $code_res = mysqli_query($link, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE customer SET code = $code, status = '$status', log_date = CURDATE() WHERE code = $fetch_code";
            $update_res = mysqli_query($link, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: signin.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click login button
    if(isset($_POST['login'])){
        $username = mysqli_real_escape_string($link, $_POST['txt_uName']);
        $password = mysqli_real_escape_string($link, md5($_POST['txt_pass']));
        $check_email = "SELECT * FROM customer WHERE user_name = '$username'";
        $res = mysqli_query($link, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if($password == $fetch_pass){
                $status = $fetch['status'];
                $username1 = $fetch['user_name'];
                $customer_ID = $fetch['customer_ID'];
                $first_name = $fetch['first_name'];
                $last_name = $fetch['last_name'];
                $email = $fetch['email'];
                $phone_number = $fetch['phone_number'];
                $address = $fetch['address'];

                if($status == 'verified'){
                    $_SESSION['customer_ID'] = $customer_ID;

                    $_SESSION['first_name'] = $first_name;
                    $_SESSION['last_name'] = $last_name;
                    $_SESSION['email'] = $email;
                    $_SESSION['phone_number'] = $phone_number;
                    $_SESSION['address'] = $address;
                    $_SESSION['user_name'] = $username;
                    $_SESSION['password'] = $password;
					
					$update_log = "UPDATE customer SET log_date = CURDATE() WHERE customer_ID = $customer_ID";
					$run_query = mysqli_query($link, $update_log);
                    
                    header('location: index.php');
                }else{
                    $info = "It looks like you haven't still verify your email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It looks like you're not yet a member! Click on the bottom link to signup.";
        }
    }


    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($link, $_POST['email']);
        $check_email = "SELECT * FROM customer WHERE email='$email'";
        $run_sql = mysqli_query($link, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE customer SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($link, $insert_code);
            if($run_query){
                ini_set( 'display_errors', 1 );
                error_reporting( E_ALL );
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "onlygoods.mnl@gmail.com";
                $to = "$email";
                $headers = "From:" . $sender;
                if(mail($to, $subject, $message, $headers)){
                    $info = "We've sent a passwrod reset otp to your email - $email";
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
        $check_code = "SELECT * FROM customer WHERE code = $otp_code";
        $code_res = mysqli_query($link, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
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
            $update_pass = "UPDATE customer SET code = $code, password = '$password' WHERE email = '$email'";
            $run_query = mysqli_query($link, $update_pass);
            if($run_query){
                echo("<script>alert('Password Change Successful!')</script>");
                echo("<script>location = 'signin.php';</script>");
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
?>