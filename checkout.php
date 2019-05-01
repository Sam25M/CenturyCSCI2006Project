<?php
	session_start();
	include "includes/config.inc.php";
	include "includes/makeCartTable.inc.php";

	if (!isset($_SESSION['user'])) {
		header("Location: logIn.php");
	}
	$userId = $_SESSION['user'];
	$users = new UserDB($pdo);
	$user = $users->findById($userId);
?>
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
		<article class="cart">
			<h2>Checkout</h2>
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
			<form action="checkoutProcess.php" method="post">
				<fieldset>
					<div id="shipAddress">
						<h3>Shipping Address</h3>
						<table>
							<tr>
								<td>First Name:</td>
								<td><input type="text" name="firstname" required value="<?php echo $user['firstName']; ?>"></td>
								<td>Last Name:</td>
								<td><input type="text" name="lastname" required value="<?php echo $user['lastName']; ?>"></td>
							</tr>
							<tr>
								<td>Street Address:</td>
								<td><input type="text" name="streetaddress" required value="<?php echo $user['streetAddress']; ?>"></td>
							</tr>
							<tr>
								<td>City:</td>
								<td><input type="text" name="city" required value="<?php echo $user['city']; ?>"></td>
							</tr>
							<tr>
								<td>State:</td>
								<td><input type="text" name="state" required value="<?php echo $user['state']; ?>"></td>
								<td>Zip Code:</td>
								<td><input type="text" name="zip" required value="<?php echo $user['zipcode']; ?>"></td>
							</tr>
						</table>
					</div>
					<div id="payment">
						<h3>Payment Information</h3>
						<table>
							<tr>
								<td>Credit Card:</td>
								<td><input type="text" name="card" required value="<?php echo $user['payMethod']; ?>"></td>
							</tr>
							<tr>
								<td>Exp. Date:</td>
								<td><input type="text" name="exp" required value="<?php echo $user['payExpire']; ?>"></td>
							</tr>
						</table>
					</div>
					<div id="contact">
						<h3>Contact Information</h3>
						<table>
							<tr>
								<td>Email:</td>
								<td><input type="email" name="email" placeholder="name@domain.com" required value="<?php echo $user['email']; ?>"></td>
							</tr>
						  <tr>
								<td>Phone:</td>
								<td><input type="text" name="phone" placeholder="111-111-1111" value="<?php echo $user['phone']; ?>"></td>
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
	</body>
</html>
