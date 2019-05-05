<?php
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
    //validate input
    $vfirstname = ValidationResult::checkParameter('firstname', '[^[a-zA-Z]+$]', 'Enter first name');
    $errorMessages .= '<p>'.$vfirstname->getErrorMessage().'</p>';

    $vlastname = ValidationResult::checkParameter('lastname', '[^[a-zA-Z]+$]', 'Enter last name');
    $errorMessages .= '<p>'.$vlastname->getErrorMessage().'</p>';

    $vpassword = ValidationResult::checkParameter('password', '[^[a-zA-Z0-9_-]{4,10}$]', 'Invalid password, please use between 4 and 10 characters');
    $errorMessages .= '<p>'.$vpassword->getErrorMessage().'</p>';

    $vstate = ValidationResult::checkParameter('state', '[^[A-Z]{2}$]', 'Invalid state, must be in short form -> AA');
    $errorMessages .= '<p>'.$vstate->getErrorMessage().'</p>';

    $vzip = ValidationResult::checkParameter('zip', '[^[0-9]{5}$]', 'Invalid zipcode, must be 5 digits');
    $errorMessages .= '<p>'.$vzip->getErrorMessage().'</p>';

    $vemail = ValidationResult::checkParameter('email', '[^[A-z0-9._%+-]+@[A-z0-9.-]+\.[A-z]{2,4}$]', 'Invalid email must be name@domain.com');
    $errorMessages .= '<p>'.$vemail->getErrorMessage().'</p>';

    $vphone = ValidationResult::checkParameter('phone', '[^(\([0-9]{3}\)|[0-9]{3}-)[0-9]{3}-[0-9]{4}$]', 'Invalid phone number must be in form 111-111-1111');
    $errorMessages .= '<p>'.$vphone->getErrorMessage().'</p>';

    if (!$vfirstname->isValid() || !$vlastname->isValid() || !$vpassword->isValid()
          || !$vstate->isValid()
          || !$vzip->isValid()
          || !$vemail->isValid()
          || !$vphone->isValid()) {
      $errors = true;
    }
    if (!$errors) {
      //Get user form details from $_POST
      $firstName = $_POST['firstname'];
      $lastName = $_POST['lastname'];
      $password = $_POST['password'];
      $street = $_POST['streetaddress'];
      $city = $_POST['city'];
      $state = $_POST['state'];
      $zip = $_POST['zip'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];

      //Give details to User class
      $newUser = new User($firstName, $lastName, $password, $email, $street, $city, $state, $zip, $phone, $pdo);
      //Call User class insertIntoDB($pdo) function to add new user to user table
      $newUser->insertIntoUserDB();
      $user = new UserDB($pdo);
      $userId = $user->getUserId($email);
      $_SESSION['user'] = $userId;

      //Take user to myAccount.php
      header("Location: myAccount.php");
    }
  }
?>
