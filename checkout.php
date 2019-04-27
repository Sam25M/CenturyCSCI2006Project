<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Checkout</title>
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<?php include "includes/header.inc.php";?>
		<!--This page will have a form for the customer to fill out that includes
		name, address, and payment information. Should also have a JavaScript generated "mini-cart"
		that lists the customers cart and the total price (including tax and shipping).-->
		<article class="cart">
			<h2>Checkout</h2>
			<table id="cartTable">
			</table>
			<form action="http://www.randyconnolly.com/tests/process.php" method="get">
				<fieldset>
					<div id="shipAddress">
						<h3>Shipping Address</h3>
						<table>
							<tr>
								<td>First Name:</td>
								<td><input type="text" name="firstname" required></td>
								<td>Last Name:</td>
								<td><input type="text" name="lastname" required></td>
							</tr>
							<tr>
								<td>Street Address:</td>
								<td><input type="text" name="streetaddress" required></td>
							</tr>
							<tr>
								<td>City:</td>
								<td><input type="text" name="city" required></td>
							</tr>
							<tr>
								<td>State:</td>
								<td><input type="text" name="state" required></td>
								<td>Zip Code:</td>
								<td><input type="text" name="zip" required></td>
							</tr>
						</table>
					</div>
					<div id="payment">
						<h3>Payment Information</h3>
						<table>
							<tr>
								<td>Credit Card:</td>
								<td><input type="text" name="card" required></td>
							</tr>
							<tr>Exp. Date:</td>
								<td><input type="date" name="exp" required></td>
							</tr>
						</table>
					</div>
					<div id="contact">
						<h3>Contact Information</h3>
						<table>
							<tr>
								<td>Email:</td>
								<td><input type="email" name="email" placeholder="name@domain.com" required></td>
							</tr>
						  <tr>
								<td>Phone:</td>
								<td><input type="text" name="phone" placeholder="111-111-1111"></td>
							</tr>
							<tr>
								<td><input type="submit" value="Order"></td>
								<td><input type="reset" value="Clear"></td>
							</tr>
						</table>
					</div>
				</fieldset>
			</form>
		</article>
		<?php include "includes/footer.inc.php";?>
		<script src="js/cart_checkout.js" type="text/javascript"></script>
	</body>
</html>
