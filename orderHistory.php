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
		<meta charset="utf-8">
		<title>My Account</title>
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<?php include "includes/header.inc.php";?>
		<article>
			<h2>My Account</h2>
      <h3>Order History</h3>
			<div>
				<?php
					if (!empty($allOrders)) {
						echo "<ul>";
						foreach ($allOrders as $item) {
							if ($item['userId'] == $_SESSION['user']) {
								$match = true;
								echo "<li>".$item['orderDate']."</li>";
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
