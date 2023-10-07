<?php
require_once "../config.php";

/*
$from =($_POST['from']);
$to = ($_POST['to']);

$now = date('Y-m-d');
$null = '0000-00-00';

print_r($_POST['id']);

if($_POST['sub'] == 'Show all order'){
					$sql = "SELECT * FROM order_test WHERE order_status='Completed'";
					if($stmt = mysqli_prepare($link, $sql)){
						if(mysqli_stmt_execute($stmt)){
							$result = mysqli_stmt_get_result($stmt);
							build_table($result);
						}
					}else{
						echo "No records found";
					}
				}
				
if($_POST['sub'] == 'Search'){
	$sql = "SELECT * FROM order_test WHERE order_status='Completed' AND Date between".$from."AND".$to;
	if($stmt = mysqli_prepare($link, $sql)){
		if(mysqli_stmt_execute($stmt)){
			$result = mysqli_stmt_get_result($stmt);
			build_table($result);
		}
	}else{
		echo "No records found";
	}
}
*/
if(isset($_POST['btn_submit'])){
	$sql = "UPDATE orders SET cost=? WHERE id = ?";
	$id = $_POST['id'];
	if($stmt = mysqli_prepare($link, $sql)){
		mysqli_stmt_bind_param($stmt, "ss", $_POST['txt_cost'], $id);
		if(mysqli_stmt_execute($stmt)){
			echo("<script>alert('Order Updated!')</script>");
			echo("<script>location = 'expenses.php';</script>");
			exit();
		}
	}else{
		echo "Error on load";
	}
}
?>