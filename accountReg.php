<?php
	session_start();
	include "includes/config.inc.php";
	include "includes/makeNewUser.inc.php";

	if (isset($_SESSION['user'])) {
		header("Location: myAccount.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Account Registration</title>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<?php include "includes/header.inc.php";?>

		<!--Everything in the content div-->
		<div classname = "contentdiv">
			<!--Form for customer to make an account.-->
			<article id="article" class="w3-container">
				<h2>Account Registration</h2>
				<div class="container">
					<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
						<fieldset>
							<table>
								<tr>
									<td>First Name:</td>
									<td<?php echo " class=\"".$vfirstname->getCssClassName()."\""; ?>><input type="text" value="<?php echo $vfirstname->getValue(); ?>" name="firstname" required></td>
									<td>Last Name:</td>
									<td<?php echo " class=\"".$vlastname->getCssClassName()."\""; ?>><input type="text" value="<?php echo $vlastname->getValue(); ?>" name="lastname" required></td>
								</tr>
								<tr>
									<td>Password:</td>
									<td<?php echo " class=\"".$vpassword->getCssClassName()."\""; ?>><input type="password" name="password" placeholder="4-10 characters" required></td>
								</tr>
								<tr>
									<td>Street Address:</td>
									<td><input type="text" <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') { echo "value=\"".$_POST['streetaddress']."\""; } ?> name="streetaddress" required></td>
								</tr>
								<tr>
									<td>City:</td>
									<td><input type="text" <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') { echo "value=\"".$_POST['city']."\""; } ?> name="city" required></td>
								</tr>
								<tr>
									<td>State:</td>
									<td<?php echo " class=\"".$vstate->getCssClassName()."\""; ?>><input type="text" value="<?php echo $vstate->getValue(); ?>" name="state" placeholder="AA" required></td>
									<td>Zip Code:</td>
									<td<?php echo " class=\"".$vzip->getCssClassName()."\""; ?>><input type="text" value="<?php echo $vzip->getValue(); ?>" name="zip" placeholder="00000" required></td>
								</tr>
								<tr>
									<td>Email:</td>
									<td<?php echo " class=\"".$vemail->getCssClassName()."\""; ?>><input type="email" value="<?php echo $vemail->getValue(); ?>" name="email" placeholder="name@domain.com" required></td>
								</tr>
								<tr>
									<td>Phone:</td>
									<td<?php echo " class=\"".$vphone->getCssClassName()."\""; ?>><input type="text" value="<?php echo $vphone->getValue(); ?>" name="phone" placeholder="111-111-1111" required></td>
								</tr>
								<tr>
									<td><input type="submit" value="Make Account"></td>
									<td><input type="reset" value="Clear"></td>
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
		</div>
		<?php include "includes/footer.inc.php";?>
	</body>
</html>
