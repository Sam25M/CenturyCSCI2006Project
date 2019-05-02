<?php
	session_start();
	include "includes/config.inc.php";

  $card = new ValidationResult("", "", "", true);
  $exp = new ValidationResult("", "", "", true);

  $errors = false;
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

      $user = new UserDB($pdo);
      $user->setPayment($payMethod, $payExpire, $_SESSION['user']);
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>My Account</title>
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<?php include "includes/header.inc.php";?>
		<article>
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
              <td colspan="2"><input type="submit" name="cardSubmit" value="Submit"></td>
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
