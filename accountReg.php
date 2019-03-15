<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Account Registration</title>
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="js/index.js" type="text/javascript"></script>
	</head>
	<body>
		<?php include "includes/header.inc.php";?>

		<!--Everything in the content div-->
		<div classname = "contentdiv">
			<!--Form for customer to make an account.-->
			<article id="article">
				<h2>Account Registration</h2>
				<div class="container">
					<form action="#" method="get">
						<fieldset>
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
								<tr>
									<td>Email:</td>
									<td><input type="email" name="email" placeholder="name@domain.com" required></td>
								</tr>
								<tr>
									<td>Phone:</td>
									<td><input type="text" name="phone" placeholder="111-111-1111"></td>
								</tr>
								<tr>
									<td><input type="submit" value="Make Account"></td>
									<td><input type="reset" value="Clear"></td>
						 </table>
						</fieldset>
					</form>
				</div>
			</article>
		</div>
		<?php include "includes/footer.inc.php";?>
	</body>
</html>
