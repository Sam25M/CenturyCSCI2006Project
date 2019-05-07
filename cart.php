<?php
	include "includes/config.inc.php";
	include "includes/makeCartTable.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Cart</title>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<?php include "includes/header.inc.php";?>
		<article class="cart">
			<h2>Shopping Cart</h2>
			<a href="checkout.php">Checkout <img src="images/cart.gif" alt="shoppingcart" width="25" height="25"></a>
			<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
				<table id="cartTable">
					<?php
						if (!empty($cart)) {
							echo "<thead><tr><th>Book</th><th>Price</th></tr></thead>
										<tbody>".$cart."</tbody>";
						}else {
							echo "<tbody>
										<tr><td colspan=\"2\">Cart is empty</td></tr>
										</tbody>";
						}
					?>
				</table>
				<input type="submit" id="emptyBtn" name="emptyBtn" value="Empty Cart">
			</form>
		</article>
		<?php include "includes/footer.inc.php";?>
	</body>
</html>
