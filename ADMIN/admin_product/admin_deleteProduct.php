<?php
require_once "../config.php";

function build_function($result){
	while($row = mysqli_fetch_array($result)){
		//print_r($row['product_ID']);
		global $link;
		$path = "../../images/products/".$row['product_img'];
		$sql2 = "DELETE FROM product WHERE product_ID = ?";
		if (file_exists($path)){
			unlink($path);
			if($stmt = mysqli_prepare($link, $sql2)){
				mysqli_stmt_bind_param($stmt, "s", $_GET['product_ID']);
				if (mysqli_stmt_execute($stmt)) {
					echo("<script>alert('Product has been Deleted!')</script>");
					echo("<script>location = 'admin_product.php';</script>");
					exit();
				}
			}else{
				echo "error on update statement";
			}
		}else{	
			if($stmt = mysqli_prepare($link, $sql2)){
				mysqli_stmt_bind_param($stmt, "s", $_GET['product_ID']);
				if (mysqli_stmt_execute($stmt)) {
					echo("<script>alert('Product has been Deleted!')</script>");
					echo("<script>location = 'admin_product.php';</script>");
					exit();
				}
			}else{
				echo "error on update statement";
			}
		}
	}
}

$sql = "SELECT * FROM product WHERE product_ID = ?";
if($stmt = mysqli_prepare($link, $sql)){
	mysqli_stmt_bind_param($stmt, "s", $_GET['product_ID']);
	if (mysqli_stmt_execute($stmt)) {
		$result = mysqli_stmt_get_result($stmt);
		build_function($result);
	}
}else{
	echo "error on statement";
}
?>