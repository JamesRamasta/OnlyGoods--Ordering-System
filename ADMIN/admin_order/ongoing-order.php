<?php
require_once "../config.php";
$sql = "UPDATE order_table SET completed = 'On-going' WHERE order_ID = ?";
if($stmt = mysqli_prepare($link, $sql)){
	mysqli_stmt_bind_param($stmt, "s", $_GET['order_ID']);
	if (mysqli_stmt_execute($stmt)) {
		echo("<script>alert('Order status change to On-going!')</script>");
		echo("<script>location = 'admin_order.php';</script>");
		exit();
	}
}else{
	echo "error on update statement";
}
?>