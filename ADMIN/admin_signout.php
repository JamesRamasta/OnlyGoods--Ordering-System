<?php
	session_start();
	unset($_SESSION['admin_name']);
	unset($_SESSION['admin_access']);
	header("location:admin_signin.php");
?>