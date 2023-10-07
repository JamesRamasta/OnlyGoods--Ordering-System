<?php	
	include("../admin_sessionChecker.php");
	include("profit-action.php");
	require_once "../config.php";
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
		<link rel = "stylesheet" href = "admin_sale.css">
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
		<div class ="content">
		<center>
	    <?php
			$stmt = $link->prepare('SELECT * FROM expenses ORDER BY id DESC');
			$stmt->execute();
			$result = $stmt->get_result();
			$grand_total = 0;
			?>

			<h2> Expenses/Purchases </h2>
			<p>
	    		<a href="admin_sale.php">Back to Sales Report</a>
	    	</p>
			<form class="example" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "POST">
				<label>Date: </label>
				<input type="date" name="txt_date" required>
				&nbsp;
				<label>Description: </label>
				<input type="text" name="txt_description" placeholder="Enter Description" required>
				&nbsp;
				<label>Amount: </label>
				<input type="text" name="txt_price" placeholder="Enter Amount" required>
				<button type="submit" name="add_expense">Add</button>
			</form>
			<?php
			if (isset($_POST['add_expense'])) {
				$date = $_POST['txt_date'];
				$desc = $_POST['txt_description'];
				$price = $_POST['txt_price'];
				$data='';

		    $query = $link->prepare('INSERT INTO expenses (purchased_date, description, cost)VALUES(?, ?, ?)');
						$query->bind_param('sss',$date, $desc, $price);
						$query->execute();
						$data .= "<script>location = 'expenses.php';</script>";
						echo $data;
					}
					?>
			<table>
				<tr>
					<th>ID</th>
			       	<th>Purchased Date</th>
			       	<th>Description</th>
			       	<th>Amount</th>
	       		</tr>
		       <?php
		       while ($row = $result->fetch_assoc()):
		       ?>
			    	<tr>
			    		<td><?= $row['id'] ?></td>
			    		<td><?= $row['purchased_date'] ?></td>
			    		<td><?= $row['description'] ?></td>
			    		<td>₱<?= number_format($row['cost'],2)?></td>
		      	<?php endwhile; ?>
		      </tr>
	    </table>
	</body>
</html>