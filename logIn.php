<?php
	session_start();

	if (isset($_SESSION['user'])) {
		header("Location: myAccount.php");
	}
	include "includes/config.inc.php";
	include "includes/logInValidate.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Account Log In</title>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<?php include "includes/header.inc.php";?>
		<article>
			<div class="container">
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" id="logInForm">
					<h2>Log In</h2>
					<fieldset>
						<table>
							<tr>
								<td>Username:</td>
								<td<?php echo " class=\"".$vusername->getCssClassName()."\""; ?>><input type="text" name="username" id="username" value="<?php echo $vusername->getValue(); ?>" placeholder="email" required><br></td>
							</tr>
							<tr>
								<td>Password:</td>
								<td<?php echo " class=\"".$vpassword->getCssClassName()."\""; ?>><input type="password" name="password" id="password" placeholder="password" required><br></td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" name="loginBtn" id="loginBtn" value="Log In"></td>
							</tr>
						</table>
					</fieldset>
				</form>
			</div>
			<?php
			if ($errors) {
				echo "<div class=\"errorMessages\" id=\"errors\" >
								<h3>Input errors occured</h3>".$errorMessages."</div>";
			}
			?>
		</article>
		<?php include "includes/footer.inc.php";?>
	</body>
</html>
