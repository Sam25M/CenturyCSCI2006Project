<?php
	session_start();
	include "includes/config.inc.php";
	$orders = new OrderDB($pdo);
	$allOrders = $orders->getAll();
	$match = false;
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
      <h3>Order History</h3>
			<div>
				<?php
					if (!empty($allOrders)) {
						echo "<ul>";
						foreach ($allOrders as $item) {
							if ($item['userId'] == $_SESSION['user']) {
								$match = true;
								echo "<li><a href=\"orderDetails.php?orderId=".$item['orderId']."\">".$item['orderDate']."</a></li><br>";
							}
						}
						if ($match == false) {
							echo "<li>No Orders</li>";
						}
						echo "</ul>";
					}
				?>
			</div>
		</article>
		<?php include "includes/footer.inc.php";?>
	</body>
</html>
