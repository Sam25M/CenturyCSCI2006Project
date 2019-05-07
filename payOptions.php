<?php
	session_start();
	include "includes/config.inc.php";

  $card = new ValidationResult("", "", "", true);
  $exp = new ValidationResult("", "", "", true);
	$user = new UserDB($pdo);

  $errors = false;
	$methodCheck = true;
  $errorMessages = "";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $card = ValidationResult::checkParameter('card', '[^[0-9]{16}$]', '16 digit card number');
    $errorMessages .= '<p>'.$card->getErrorMessage().'</p>';

    $exp = ValidationResult::checkParameter('exp', '[^(1[0-2]|0[1-9]|\d)\/(\d{2})$]', 'mm/yy');
    $errorMessages .= '<p>'.$exp->getErrorMessage().'</p>';

    if (!$card->isValid() || !$exp->isValid()) {
      $errors = true;
    }
    if (!$errors) {
      $payMethod = $_POST['card'];
      $payExpire = $_POST['exp'];

      $user->setPayment($payMethod, $payExpire, $_SESSION['user']);
    }
  }

	if ($user->getPayment($_SESSION['user']) == null) {
		$payMessage = "<p>You have no card on file</p>";
		$methodCheck = false;
	}else {
		$payMessage = "<p>You have a card on file</p>";
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>My Account</title>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<?php include "includes/header.inc.php";?>
		<article class="w3-container">
			<h2>My Account</h2>
      <h3>Payment Options</h3>
			<div>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
          <table>
            <tr>
              <td>Credit Card:</td>
              <td<?php echo " class=\"".$card->getCssClassName()."\""; ?>><input type="text" name="card" required><br></td>
            </tr>
            <tr>
              <td>Exp. Date:</td>
              <td<?php echo " class=\"".$exp->getCssClassName()."\""; ?>><input type="text" name="exp" placeholder="mm/yy" required><br></td>
            </tr>
            <tr>
              <td colspan="2"><input type="submit" name="cardSubmit" value="Update"></td>
            </tr>
          </table>
        </fieldset>
        </form>
				<?php
					echo $payMessage;
				?>
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
