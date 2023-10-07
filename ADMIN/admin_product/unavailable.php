<?php
require_once "../config.php";
$sql = "UPDATE product SET product_availability = 'Unavailable' WHERE product_ID = ?";
if($stmt = mysqli_prepare($link, $sql)){
	mysqli_stmt_bind_param($stmt, "s", $_GET['product_ID']);
	if (mysqli_stmt_execute($stmt)) {
		//echo("<script>alert('Product status change to OUT OF STOCK!')</script>");
		echo("<script>location = 'admin_product.php';</script>");
		exit();
	}
}else{
	echo "error on update statement";
}
?>