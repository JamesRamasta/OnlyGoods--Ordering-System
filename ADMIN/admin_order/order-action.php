<?php
require_once "../config.php";
$sql2 = "UPDATE orders SET order_status=?, completed=? WHERE id=".$_POST['id'];
$now = date('Y-m-d');
$null = '0000-00-00';

//print_r($_POST['id']);

if($_POST['order-status'] == 'Completed'){
	if($stmt = mysqli_prepare($link, $sql2)){
		mysqli_stmt_bind_param($stmt, "ss", $_POST['order-status'], $now);
		if(mysqli_stmt_execute($stmt)){
			//echo("<script>alert('Order Updated!')</script>");
			echo("<script>location = 'admin_order.php';</script>");
		}else{
			echo "Error on updating order";
		}
	}else{
		echo "Error on update statement";
	}
}else{
	if($stmt = mysqli_prepare($link, $sql2)){
		mysqli_stmt_bind_param($stmt, "ss", $_POST['order-status'], $null);
		if(mysqli_stmt_execute($stmt)){
			//echo("<script>alert('Order Updated!')</script>");
			echo("<script>location = 'admin_order.php';</script>");
		}else{
			echo "Error on updating order";
		}
	}else{
		echo "Error on update statement";
	}
}
?>