<?php
  //validate input
  $vfirstname = ValidationResult::checkParameter('firstname', '[^[a-zA-Z]+$]', 'Enter first name');
  $errorMessages .= '<p>'.$vfirstname->getErrorMessage().'</p>';

  $vlastname = ValidationResult::checkParameter('lastname', '[^[a-zA-Z]+$]', 'Enter last name');
  $errorMessages .= '<p>'.$vlastname->getErrorMessage().'</p>';

  $vpassword = ValidationResult::checkParameter('password', '[^[a-zA-Z0-9_-]{8,15}$]', 'Invalid password, please use between 8 and 15 characters');
  $errorMessages .= '<p>'.$vpassword->getErrorMessage().'</p>';

  //$vstreetaddress = ValidationResult::checkParameter('streetaddress', '[^(\d{4}\s){1}([a-zA-Z]\s)+$]', 'Invalid streetaddress');
  //$errorMessages .= '<p>'.$vstreetaddress->getErrorMessage().'</p>';

  //$vcity = ValidationResult::checkParameter('city', '[^(\s*)([a-zA-Z]\s)+$]', 'Invalid city');
  //$errorMessages .= '<p>'.$vcity->getErrorMessage().'</p>';

  $vstate = ValidationResult::checkParameter('state', '[^[A-Z]{2}$]', 'Invalid state, must be in short form -> AA');
  $errorMessages .= '<p>'.$vstate->getErrorMessage().'</p>';

  $vzip = ValidationResult::checkParameter('zip', '[^[0-9]{5}$]', 'Invalid zipcode, must be 5 digits');
  $errorMessages .= '<p>'.$vzip->getErrorMessage().'</p>';

  $vemail = ValidationResult::checkParameter('email', '[^[A-z0-9._%+-]+@[A-z0-9.-]+\.[A-z]{2,4}$]', 'Invalid email must be name@domain.com');
  $errorMessages .= '<p>'.$vemail->getErrorMessage().'</p>';

  $vphone = ValidationResult::checkParameter('phone', '[^(\([0-9]{3}\)|[0-9]{3}-)[0-9]{3}-[0-9]{4}$]', 'Invalid phone number');
  $errorMessages .= '<p>'.$vphone->getErrorMessage().'</p>';

  if (!$vfirstname->isValid() || !$vlastname->isValid() || !$vpassword->isValid()
        //|| !$vstreetaddress->isValid()
        //|| !$vcity->isValid()
        || !$vstate->isValid()
        //|| !$vzip->isValid()
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

    //Take user to myAccount.php
    header("Location: myAccount.php");
    //exit();
  }
?>
