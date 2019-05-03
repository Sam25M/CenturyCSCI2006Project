<?php
	session_start();
	include "includes/config.inc.php";
  $orderDB = new OrderDB($pdo);
	$detailsDB = new OrderDetailsDB($pdo);
  $schoolDB = new SchoolBookDB($pdo);
  $marketDB = new AddedBookDB($pdo);
  $allDetails = $detailsDB->getAll();
  $output = '';
  foreach ($allDetails as $item) {
    if ($item['orderId'] == $_GET['orderId']) {
      if ($item['postId'] == null) {
        $schoolBook = $schoolDB->findByIsbn($item['isbn']);
        $output .= "<tr><td>".$schoolBook[0]."</td><td>$".$item['price']."</td></tr>";
      }else {
        $marketBook = $marketDB->findById($item['postId']);
        $output .= "<tr><td>".$marketBook[1]."</td><td>$".$item['price']."</td></tr>";
      }
    }
  }

  $order = $orderDB->findByOrderId($_GET['orderId']);
  $output .= "<tr><td>Total</td><td>$".$order['total']."</td></tr>";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>My Account</title>
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<?php include "includes/header.inc.php";?>
		<article>
			<h2>My Account</h2>
      <h3>Order Details</h3>
			<table id="detailsTable">
        <thead><tr><th>Book</th><th>Price</th></tr></thead>
        <tbody>
				<?php
          echo $output;
				?>
        </tbody>
			</table>
		</article>
		<?php include "includes/footer.inc.php";?>
	</body>
</html>
