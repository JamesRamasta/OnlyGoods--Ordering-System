<?php
require_once "../config.php";
$sql = "DELETE FROM admin WHERE admin_ID = ?";
if($stmt = mysqli_prepare($link, $sql)){
	mysqli_stmt_bind_param($stmt, "s", $_GET['admin_ID']);
	if (mysqli_stmt_execute($stmt)) {
		echo("<script>alert('Account has been Deleted!')</script>");
		echo("<script>location = 'admin_manageAdmin.php';</script>");
		exit();
	}
}else{
	echo "error on update statement";
}
?>