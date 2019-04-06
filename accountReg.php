<?php
	include "includes/config.inc.php";

	$vfirstname = new ValidationResult("", "", "", true);
	$vlastname = new ValidationResult("", "", "", true);
	$vpassword = new ValidationResult("", "", "", true);
	$vstreetaddress = new ValidationResult("", "", "", true);
	$vcity = new ValidationResult("", "", "", true);
	$vstate = new ValidationResult("", "", "", true);
	$vzip = new ValidationResult("", "", "", true);
	$vemail = new ValidationResult("", "", "", true);
  $vphone = new ValidationResult("", "", "", true);

	$errors = false;
	$errorMessages = "";

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		include "includes/makeNewUser.inc.php";
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Account Registration</title>
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<?php include "includes/header.inc.php";?>

		<!--Everything in the content div-->
		<div classname = "contentdiv">
			<!--Form for customer to make an account.-->
			<article id="article">
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
									<td<?php echo " class=\"".$vpassword->getCssClassName()."\""; ?>><input type="password" name="password" placeholder="8-15 characters" required></td>
								</tr>
								<tr>
									<td>Street Address:</td>
									<td<?php echo " class=\"".$vstreetaddress->getCssClassName()."\""; ?>><input type="text" value="<?php echo $vstreetaddress->getValue(); ?>" name="streetaddress" required></td>
								</tr>
								<tr>
									<td>City:</td>
									<td<?php echo " class=\"".$vcity->getCssClassName()."\""; ?>><input type="text" value="<?php echo $vcity->getValue(); ?>" name="city" required></td>
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
