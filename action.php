<?php
	session_start();
	require 'config.php';

	// Add products into the cart table
	if (isset($_POST['pid'])) {
	  $pid = $_POST['pid'];
	  $pname = $_POST['pname'];
	  $pdesc = $_POST['pdesc'];
	  $pprice = $_POST['pprice'];
	  //$pcode = $_POST['pcode'];
	  $pqty = $_POST['pqty'];
	  $total_price = $pprice * $pqty;

	  $stmt = $link->prepare('SELECT product_ID FROM cart WHERE product_ID=?');
	  $stmt->bind_param('s',$pid);	
	  $stmt->execute();
	  $res = $stmt->get_result();
	  $r = $res->fetch_assoc();
	  $code = $r['product_ID'] ?? '';
    $query = $link->prepare('INSERT INTO cart (product_name,customer_ID,product_desc,product_price,qty,total_price,product_ID) VALUES (?,?,?,?,?,?,?)');
    $query->bind_param('sssssss',$pname,$_SESSION['customer_ID'],$pdesc,$pprice,$pqty,$total_price,$pid);
    $query->execute();	    
	}

	// Get no.of items available in the cart table
	if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
	  $stmt = $link->prepare('SELECT * FROM cart WHERE customer_ID=?');
	  $stmt->bind_param('s',$_SESSION['customer_ID']);
	  $stmt->execute();
	  $stmt->store_result();
	  $rows = $stmt->num_rows;

	  echo $rows;
	}

	// Remove single items from cart
	if (isset($_GET['remove'])) {
	  $id = $_GET['remove'];

	  $stmt = $link->prepare('DELETE FROM cart WHERE id=?');
	  $stmt->bind_param('i',$id);
	  $stmt->execute();

	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Item removed from the cart!';
	  header('location:cart.php?customer_ID='.$_SESSION['customer_ID']);
	}

	// Remove all items at once from cart
	if (isset($_GET['clear'])) {
	  $stmt = $link->prepare('DELETE FROM cart');
	  $stmt->execute();
	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'All Item removed from the cart!';
	  header('location:cart.php?customer_ID='.$_SESSION['customer_ID']);
	}

	// Set total price of the product in the cart table
	if (isset($_POST['qty'])) {
	  $qty = $_POST['qty'];
	  $pid = $_POST['pid'];
	  $pprice = $_POST['pprice'];

	  $tprice = $qty * $pprice;

	  $stmt = $link->prepare('UPDATE cart SET qty=?, total_price=? WHERE id=?');
	  $stmt->bind_param('isi',$qty,$tprice,$pid);
	  $stmt->execute();
	}

	// Checkout and save customer info in the orders table
	if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
	  $name = $_POST['name'];
	  $email = $_POST['email'];
	  $phone = $_POST['phone'];
	  $products = $_POST['products'];
	  $grand_total = $_POST['grand_total'];
	  $address = $_POST['address'];
	  $delivery = $_POST['delivery'];
	  $order_log = date('Y-m-d H:i:s');
	  
	  $data = '';

	  $order_status = "On-going";
	  $payment_status = "Waiting for Payment";
	  $stmt = $link->prepare('INSERT INTO orders (customer_ID,name,email,phone,address,products,amount_paid,order_status, log, delivery_date,payment_status)VALUES(?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?)');
	  $stmt->bind_param('sssssssssss',$_SESSION['customer_ID'],$name,$email,$phone,$address,$products,$grand_total,$order_status,$order_log, $delivery,$payment_status);
	  $stmt->execute();
	  $stmt2 = $link->prepare('DELETE FROM cart WHERE customer_ID=?');
	  $stmt2->bind_param('s',$_SESSION['customer_ID']);
	  $stmt2->execute();
	  $data .= '<div class="text-center">
					<h2 class="text-success">Thank You for placing your order!</h2>
					<h4 class="display-5 mt-2">Your order is now being prepared and will be delivered to you soon!</h4>
					<h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $products . '</h4>
					<h4>Total Amount : ₱' . number_format($grand_total,2) . '</h4>
					<h6>Downpayment : ₱' . number_format($grand_total*0.2,2) . '</h6>
					<hr>
					<h5>
					<i>Guidelines:</i></br>
					<p style="font-size:18px">
					<b>- Mode of Payment: </b> GCash/Paymaya (Full or Downpayment) <br/>
					- Send via Gcash: <b>Sheara Mae B.</b>(<b>09460819167</b>) <br/>
					-The remaining balance shall be paid via GCash upon arrival of goods.<br>
					<b>- Mode of Delivery: </b> Lalamove/Grab/TokTok/Mr. Speedy (Shipping fee is shouldered by the buyer) <br/>
					- Cancellation of order/s is only allowed within the day. <br/>
					- Downpayment must be paid within 24 hours otherwise the order will be cancelled. <br/>
					- Changing of order/s is only allowed within 24 hours. <br/>
					- See full details <a href="faq.php">here</a> <br/>
					- View shipping rates <a href="faq.php#SFtable">here</a>
					</h5>
					<hr>
					<h5>Please send proof of payment <a href="https://www.facebook.com/onlygoods.mnl/">here</a></h5>
					<h6><button><a href="index.php">Home</a></button></h6>
				</div>';
	  echo $data;


	  if(isset($_POST['action']) && isset($_POST['action']) == 'order' && isset($_POST['checkActive'])){
		$stmt3 = $link->prepare('UPDATE customer SET phone_number = ?, address = ? where customer_ID = ?');
		$stmt3->bind_param('sss',$_POST['phone'],$_POST['address'],$_SESSION['customer_ID']);
		$stmt3->execute();
		$_SESSION['phone_number'] = $_POST['phone'];
		$_SESSION['address'] = $_POST['address'];
		}

	}
?>