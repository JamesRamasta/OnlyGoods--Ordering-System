<?php
if($_SESSION['admin_access'] == 'Manager'){
	session_start();
	echo("<script>alert('Account Access Changed!')</script>");
	header("location:../index.php");
}
?>