<!DOCTYPE html>
<html>

<head>
	<title>Only Goods</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
	<script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<!-- ICONS  -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel='stylesheet' href='hti tps://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css' />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<!-- FONTS  -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
	<link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>

	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="products.css">
</head>

<body>
	<?php
	session_start();
	if (!isset($_SESSION['user_name'])) {
	?>
		<!-- Navigation Bar -->
		<nav class="navbar navbar-expand-lg navbar-light fixed-top">
			<a class="navbar-brand" href="index.php"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<a href="index.php"><img src="images/logo.png" style="width:80px;height:42px;margin-left:20%;" class="logo_enable"></a>
				<ul class="navbar-nav ml-auto">
					<li class="d-lg-none">
						<a href="index.php" class="text d-lg-none">Home</a>
						<hr class="d-lg-none" />
					</li>
					<li class="nav-item d-none d-lg-block"><a class="nav-link" href="index.php">Home</a></li>
					<li class="d-lg-none">
						<a href="about.php" class="text d-lg-none">About</a>
						<hr class="d-lg-none" />
					</li>
					<li class="nav-item d-none d-lg-block"><a class="nav-link" href="about.php">About</a></li>
					<li class="d-lg-none">
						<a href="products.php" class="text d-lg-none">Products</a>
						<hr class="d-lg-none" />
					</li>
					<li class="nav-item d-none d-lg-block"><a class="nav-link" href="products.php">Products</a></li>
					<li class="d-lg-none">
						<a href="faq.php" class="text d-lg-none">FAQ</a>
						<hr class="d-lg-none" />
					</li>
					<li class="nav-item d-none d-lg-block"><a class="nav-link" href="faq.php">FAQ</a></li>
					<li class="d-lg-none">
						<a href="cart.php" class="text d-lg-none">Cart</a>
						<hr class="d-lg-none" />
					</li>
					<li class="nav-item d-none d-lg-block"><a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
					<li class="d-lg-none">
						<a href="signin.php" class="text d-lg-none">Login</a>
					</li>
					<li class="nav-item d-none d-lg-block"><a href="signin.php"><span class="iconify" data-icon="bx:bx-user-circle" style="color: white; margin-top: 5px;" data-width="50" data-height="40"></span></a></li>
				</ul>
			</div>
		</nav>
	<?php
	} elseif (isset($_SESSION['user_name'])) {
	?>
		<!-- Navigation Bar -->
		<nav class="navbar navbar-expand-lg navbar-light fixed-top">
			<a class="navbar-brand" href="index.php"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<a href="index.php"><img src="images/logo.png" style="width:80px;height:42px;margin-left:20%;" class="logo_enable"></a>
				<ul class="navbar-nav ml-auto">
					<li class="d-lg-none">
						<a href="index.php" class="text d-lg-none">Home</a>
						<hr class="d-lg-none" />
					</li>
					<li class="nav-item d-none d-lg-block"><a class="nav-link" href="index.php">Home</a></li>
					<li class="d-lg-none">
						<a href="about.php" class="text d-lg-none">About</a>
						<hr class="d-lg-none" />
					</li>
					<li class="nav-item d-none d-lg-block"><a class="nav-link" href="about.php">About</a></li>
					<li class="d-lg-none">
						<a href="products.php" class="text d-lg-none">Products</a>
						<hr class="d-lg-none" />
					</li>
					<li class="nav-item d-none d-lg-block"><a class="nav-link" href="products.php">Products</a></li>
					<li class="d-lg-none">
						<a href="faq.php" class="text d-lg-none">FAQ</a>
						<hr class="d-lg-none" />
					</li>
					<li class="nav-item d-none d-lg-block"><a class="nav-link" href="faq.php">FAQ</a></li>
					<li class="d-lg-none">
						<a href="cart.php?customer_ID=<?= $_SESSION['customer_ID']; ?>'" class="text d-lg-none">Cart</a>
						<hr class="d-lg-none" />
					</li>
					<li class="nav-item d-none d-lg-block"><a class="nav-link"><i class="fas fa-shopping-cart" onclick="location.href='cart.php?customer_ID=<?= $_SESSION['customer_ID']; ?>'"></i><span id="cart-item" class="badge badge-danger"></span></a></li>
					<li class="d-lg-none">
						<a href="accountSettings.php" class="text d-lg-none"> Account Settings</a>
						<hr class="d-lg-none" />
					</li>
					<li class="d-lg-none">
						<a href="signout.php" class="text d-lg-none">Logout</a>
					</li>
					<div class="dropdown logo_enable">
						<li class="nav-item" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><a href="admin_signout.php"><span class="iconify" data-icon="bx:bx-user-circle" style="color: white; margin-top: 5px;" data-width="50" data-height="40"></span></a></li>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
							<button class="dropdown-item" type="button"><a href="myOrder.php">My Orders</a></button>
							<button class="dropdown-item" type="button"><a href="accountSettings.php">Account Settings</a></button>
							<hr />
							<button class="dropdown-item" type="button"><a href="signout.php">Logout</a></button>
						</div>
					</div>
				</ul>
			</div>
		</nav>
	<?php
	}
	?>
	<!-- Under Image Text -->
	<div class="under_text padding caption text-center"><br />
		<p style="color:#56382d; font-family: Abril Fatface, cursive;">Products</p>
		<h5 style="color:#56382d; font-family:Darker Grotesque, sans-serif;">"To start ordering, click the image to see the full details of your desired product"</h5>
	</div>
	<?php
	require_once "config.php";

	$items_in_page = 15;

	if (isset($_GET["page"])) {
		$page  = $_GET["page"];
	} else {
		$page = 1;
	};
	$start_from = ($page - 1) * $items_in_page;
	$sql = "SELECT * FROM product WHERE product_availability = 'Available' ORDER by product_name LIMIT $start_from, " . $items_in_page;
	$rs_result = $link->query($sql);

	echo '<div class="image-gallery">';
	while ($row = $rs_result->fetch_assoc()) { ?>
		<div id="image-modal" class="image-box">
			<?php
			if (!empty($row['product_img'])) {
			?>
				<button data-toggle="modal" data-target="#product<?= $row['product_ID']; ?>"><img src="images/products/<?= $row['product_img'] ?>"></button>
			<?php
			} else {
			?>
				<button data-toggle="modal" data-target="#product<?= $row['product_ID']; ?>"><img src="images/products/no-image.jpg"></button>
			<?php
			}
			?>
		</div>
		<div class="modal" id="product<?= $row['product_ID'] ?>" role="dialog">
			<div class="modal-content">
				<div class="float-container">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="float-child-left">
						<?php echo "<br/>" ?>
						<?php echo "<br/>" ?>
						<?php echo "<img src = 'images/products/" . $row['product_img'] . "' />"; ?>
					</div>
					<div class="float-child-right">
						<?php
						echo "<h4><center><b>" . $row['product_name'] . "</b></center></h4><br />";
						echo "<b>Description:</b><br /><p>" . $row['product_desc'] . "</p><br />";
						echo "<b>Price: </b><p>₱" . number_format($row['product_price'], 2) . "</p><br />";
						?>
						<form class="form-submit">
							<div class="row p-2">

								<div class="col-md-4 py-1 pl-1">
									<b>Quantity</b>
								</div>
								<div class="col-md-6 float">
									<input type="number" class="form-control pqty" min="1" max="20" value="<?= $row['product_qty'] ?>">
								</div>
							</div>
							<input type="hidden" class="pid" value="<?= $row['product_ID'] ?>">
							<input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
							<input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
							<input type="hidden" class="pdesc" value="<?= $row['product_desc'] ?>">
							<input type="hidden" class="pimage" value="#">

							<button class="cart-btn-3 addItemBtn" data-dismiss="modal">&nbsp;Add to cart</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	</div>
	<div class="pageNumber">
		<?php
		echo "<center>";
		$sql2 = "SELECT COUNT(product_ID) AS total FROM product ";
		$result = $link->query($sql2);
		$row = $result->fetch_assoc();
		$total_pages = ceil($row["total"] / $items_in_page);

		echo "<a href='products.php?page=";
		if ($page > 1) {
			echo $page - 1;
		} else {
			echo "$page";
		}
		echo "' class = 'pages'><</a>";


		for ($i = 1; $i <= $total_pages; $i++) {
			echo "<a href='products.php?page=" . $i . "' class = 'pages";
			if ($i == $page)  echo " curPage";
			echo "'>" . $i . "</a> ";
		};

		echo "<a href='products.php?page=";
		if ($total_pages == $page) {
			echo "$page";
		} else {
			echo $page + 1;
		}
		echo "' class = 'pages'>></a>";

		echo "</center>";
		echo "</div>";


		?>
		<!-- Footer Bar -->
		<footer class="container-fluid text-center" id="socials_section">
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<h3 style="font-family: Abril Fatface, cursive;">Socials</h3>
					<a href="https://www.facebook.com/onlygoods.mnl/" target="_blank" class="fa fa-facebook"></a>
					<a href="https://www.instagram.com/onlygoods.mnl/" target="_blank" class="fa fa-instagram"></a>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</footer>
		<!-------- ADD TO CART FUNCTION SCRIPT -------->
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
		<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script> -->

		<script type="text/javascript">
			$(document).ready(function() {

				// Send product details in the server
				$(".addItemBtn").click(function(e) {
					e.preventDefault();
					var $form = $(this).closest(".form-submit");
					var pid = $form.find(".pid").val();
					var pname = $form.find(".pname").val();
					var pdesc = $form.find(".pdesc").val();
					var pprice = $form.find(".pprice").val();
					//var pcode = $form.find(".pcode").val();
					var pqty = $form.find(".pqty").val();

					$.ajax({
						url: 'action.php',
						method: 'post',
						data: {
							pid: pid,
							pname: pname,
							pdesc: pdesc,
							pprice: pprice,
							pqty: pqty
							//pcode: pcode
						},
						success: function(response) {
							$("#message").html(response);
							window.scrollTo(0, 0);
							load_cart_item_number();
						}
					});
				});

				// Load total no.of items added in the cart and display in the navbar
				load_cart_item_number();

				function load_cart_item_number() {
					$.ajax({
						url: 'action.php',
						method: 'get',
						data: {
							cartItem: "cart_item"
						},
						success: function(response) {
							$("#cart-item").html(response);
						}
					});
				}
			});
		</script>
</body>

</html>