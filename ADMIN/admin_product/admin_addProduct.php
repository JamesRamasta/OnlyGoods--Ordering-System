<?php
include("../admin_sessionChecker.php");
include("../admin_accessChecker.php");
require_once "../config.php";
	
if (isset($_POST['btn_submit'])){
	$sql = "SELECT * FROM product WHERE product_ID = ?";
	$file = $_FILES['file'];
	$qty = 1;
	
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
	
	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
	
	$allowed = array('jpg', 'jpeg', 'png');
	
	if($fileSize != 0){
		if (in_array($fileActualExt, $allowed)){
			if($fileError === 0){
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = '../../images/products/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				if($stmt = mysqli_prepare($link, $sql)){
					mysqli_stmt_bind_param($stmt, "s", $_POST['txt_ID']);
					if(mysqli_execute($stmt)){
						$result = mysqli_stmt_get_result($stmt);
						if(mysqli_num_rows($result) != 1){
							$sql = "INSERT INTO product (product_name, product_price, product_desc, product_availability, product_qty, product_img) VALUES (?, ?, ?, ?, ?, ?)";
							if($stmt = mysqli_prepare($link, $sql)){
								mysqli_stmt_bind_param($stmt,"ssssss", $_POST['txt_productName'], $_POST['txt_productPrice'], $_POST['txt_productDesc'],$_POST['ddl_status'], $qty, $fileNameNew);
									if (mysqli_stmt_execute($stmt)){
										header("location: admin_product.php");
										echo "Product Added!";
										exit();
									}
							}
						}else{
							echo("<script>alert('Product ID is already taken!')</script>");
						}
					}
				}else{
					echo "Erron on select statement";
				}
			}else{
				echo("<script>alert('Error on image upload. Please try again.')</script>");
			}
		}else{
			echo("<script>alert('Image format type is unavailable. Please upload .jpeg or .png file.')</script>");
		}
	}else{
		if($stmt = mysqli_prepare($link, $sql)){
			mysqli_stmt_bind_param($stmt, "s", $_POST['txt_ID']);
			if(mysqli_execute($stmt)){
				$result = mysqli_stmt_get_result($stmt);
				if(mysqli_num_rows($result) != 1){
					$sql = "INSERT INTO product (product_name, product_price, product_desc, product_availability, product_qty) VALUES (?, ?, ?, ?, ?)";
					if($stmt = mysqli_prepare($link, $sql)){
						mysqli_stmt_bind_param($stmt,"sssss", $_POST['txt_productName'], $_POST['txt_productPrice'], $_POST['txt_productDesc'],$_POST['ddl_status'], $qty);
							if (mysqli_stmt_execute($stmt)){
								header("location: admin_product.php");
								echo "Product Added!";
								exit();
							}
					}
				}else{
					echo("<script>alert('Product ID is already taken!')</script>");
				}
			}
		}else{
			echo "Error on select statement";
		}
	}
	
	
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Only Goods | Admin</title>
		<meta charset = "UTF-8">
		<meta name = "viewport" content = "width=device-width, initial-scale=1">
		<script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
		<script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<!-- add to cart -->
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>

		<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script> -->

		<!-- ICONS  -->
		<link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css' />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

		<!-- FONTS  -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@600;700;800;900&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700;900&display=swap" rel="stylesheet">
		<link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
		<link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>
		<link rel = "stylesheet" href = "../admin_style.css">
		<link rel = "stylesheet" href = "admin_updateProduct.css">
	</head>
	
	<body>
		<!-- Navigation Bar -->
		<nav class = "navbar navbar-expand-lg navbar-light fixed-top">
			<a class = "navbar-brand" href = "index.php"></a>
			<button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#navbarNav" aria-controls = "navbarNav" aria-expanded = "false" aria-label = "Toggle navigation">
				<span class = "navbar-toggler-icon"></span>
			</button>
			<div class = "welcome logo_enable"><p><center>Welcome <?php echo $_SESSION['admin_name'] . '!';?></center></p></div>
			<div class = "collapse navbar-collapse" id = "navbarNav">
				<a href="../index.php"><img src="../../images/logo.png" style="width:80px;height:42px;margin-left:20%;" class="logo_enable"></a>
				<ul class = "navbar-nav ml-auto">
					<div class="dropdown">
						<li class="d-lg-none">]
							<a href="../index.php" class="text d-lg-none">Home</a>
							<hr class="d-lg-none" />
						</li>
						<li class="d-lg-none">
							<a href="../admin_accountSettings/admin_accountSettings.php" class="text d-lg-none">Account Settings</a>
							<hr class="d-lg-none" />
						</li>
						<li class="d-lg-none">
							<a href="../admin_signout.php" class="text d-lg-none">Logout</a>
						</li>
						<li class = "nav-item" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="iconify logo_enable" data-icon="bx:bx-user-circle" style="color: white; margin-top: 5px;" data-width="50" data-height="40"></span>
						</li>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
							
							<button class="dropdown-item" type="button"><a href="../admin_accountSettings/admin_accountSettings.php">Account Settings</a>
							</button><hr />
							<button class="dropdown-item" type="button"><a href="../admin_signout.php">Logout</a></button>
						</div>
					</div>
				</ul>
			</div>
		</nav>
		<div class ="spacing"></div>
		<div class="responsive-form">
			<div class="responsive-form-2">
				<h2><center>Add New Product</center></h2><hr>
				<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" METHOD = "POST" enctype="multipart/form-data">
					<div class ="content">
						<label for="product_name">Product Name: </label>
						<input type="text" placeholder="Enter Product Name" name="txt_productName" required><br/><br/>
						<label for="product_price">Price: </label>
						<input type="text" placeholder="Enter Product Price" name="txt_productPrice" required><br/><br/>
						<label for="product_desc">Description: </label>
						<textarea rows="3" cols="25" placeholder="Enter Product Description" name="txt_productDesc"></textarea>

						<br/><br/><br/><br/>
						<label for="product_availability">Status: </label>
						<select name="ddl_status" required>
							<option value="">--Select Type--</option>
				  			<option value="Available">Available</option>
				  			<option value="Unavailable">Unavailable</option>
						</select><br/><br/>
						<label for="product_image">Product Image: </label>
						<input type="file" name="file" class="file">
						<center>
							<br />
							<button type="submit" class="lower" name="btn_submit">Add</button>
							<button type="cancel" class="lower" onclick="window.location='../index.php';">Cancel</button>
						</center>
					</div>
				</div>
			</div>
		</body>
</html>