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
		<title>My Account</title>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<?php include "includes/header.inc.php";?>
		<article class="w3-container">
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
