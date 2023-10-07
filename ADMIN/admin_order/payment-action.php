<?php
require_once "../config.php";
$sql2 = "UPDATE orders SET payment_status=? WHERE id=".$_POST['id'];

if($_POST['payment-status'] == 'Paid'){
	if($stmt = mysqli_prepare($link, $sql2)){
		mysqli_stmt_bind_param($stmt, "s", $_POST['payment-status']);
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
		mysqli_stmt_bind_param($stmt, "s", $_POST['payment-status']);
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