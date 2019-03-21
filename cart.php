<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Cart</title>
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<?php include "includes/header.inc.php";?>
		<!--This page will use JavaScript to generate a cart table. If cart is empty,
		this page should have a "cart empty" message. Empty cart button-->
		<article class="cart">
			<h2>Shopping Cart</h2>
			<a href="checkout.html">checkout <img src="images/cart.gif" alt="shoppingcart" width="25" height="25"></a>
			<table id="cartTable">
			</table>
			<input type="button" id="emptyBtn" value="Empty Cart">
		</article>
		<?php include "includes/footer.inc.php";?>
		<script src="js/cart_checkout.js" type="text/javascript"></script>
	</body>
</html>
