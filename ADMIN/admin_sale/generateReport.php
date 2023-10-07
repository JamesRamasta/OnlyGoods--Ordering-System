<?php
	function build_table($result){
				
		while ($row = mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['products']."</td>";
			echo "<td>₱".number_format($row['amount_paid'],2)."</td>";
			echo "<td>".$row['address']."</td>";
			echo "<td>".$row['completed']."</td>";
		}
		
		echo "</table>";
	}
	
	$sql = "SELECT * FROM orders WHERE order_status='Completed'  ORDER BY completed DESC";
	if($stmt = mysqli_prepare($link, $sql)){
		if(mysqli_stmt_execute($stmt)){
			$result = mysqli_stmt_get_result($stmt);
			build_table($result);
		}
	}else{
		echo "No order/s found";
	}
	
	if(isset($_POST['generate-report'])){
		require_once('tcpdf/tcpdf.php');
		$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$obj_pdf -> SetCreator(OnlyGoods);
		$obj_pdf -> SetTitle('Sales Report '.date("Y-m-d"));
		$obj_pdf -> SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$obj_pdf -> setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$obj_pdf -> setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$obj_pdf -> SetDefaultMonospacedFont('helvetica');
		$obj_pdf -> SetFooterMargin(PDF_MARGIN_FOOTER);
		$obj_pdf -> SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
		$obj_pdf -> setPrintHeader(false);
		$obj_pdf -> setPrintFooter(false);
		$obj_pdf -> SetAutoPageBreak(True, 10);
		$obj_pdf -> SetFont('helvetica', '', 11);
		$obj_pdf -> AddPage();
		$content = '';
		$content .='
			<h4 align="center">SALES REPORT</h4><br/>
			<table border = "1" cellspacing = "0" cellpadding = "3">
				<tr>
					<th>Order ID</th>
					<th>Customer Name</th>
					<th>Products</th>
					<th>Amount Paid</th>
					<th>Address</th>
					<th>Completed Date</th>
				</tr>
		';
		$content .= build_table($result);
		$content .= "</table>";
		$obj_pdf -> writeHTML($content);
		$obj_pdf -> Output('Sales Report '.date("Y-m-d"), 'I');
	}
?>