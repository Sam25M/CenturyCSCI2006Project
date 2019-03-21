<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Account Log In</title>
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="js/data.js"></script>
		<script src="js/logIn.js"></script>
	</head>
	<body>
		<?php include "includes/header.inc.php";?>
		<article>
			<div class="container">
				<form method="post" id="logInForm">
					<h2>Log In</h2>
					<fieldset>
						<table>
							<tr>
								<td>Username:</td>
								<td><input type="text" name="username" id="username" placeholder="username" required><br></td>
							</tr>
							<tr>
								<td>Password:</td>
								<td><input type="password" name="password" id="password" placeholder="password" required><br></td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" name="loginBtn" id="loginBtn" value="Log In"></td>
							</tr>
						</table>
					</fieldset>
				</form>
			</div>
		</article>
		<?php include "includes/footer.inc.php";?>
	</body>
</html>
