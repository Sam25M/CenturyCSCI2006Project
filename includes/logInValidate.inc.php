<?php
  $vusername = new ValidationResult("", "", "", true);
  $vpassword = new ValidationResult("", "", "", true);

  $errors = false;
  $errorMessages = "";

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $vusername = ValidationResult::checkParameter('username', '[^[A-z0-9._%+-]+@[A-z0-9.-]+\.[A-z]{2,4}$]', 'Invalid username must be name@domain.com');
    $errorMessages .= '<p>'.$vusername->getErrorMessage().'</p>';

    $vpassword = ValidationResult::checkParameter('password', '[^[a-zA-Z0-9_-]{4,10}$]', 'Invalid password, please use between 4 and 10 characters');
    $errorMessages .= '<p>'.$vpassword->getErrorMessage().'</p>';

    if (!$vusername->isValid() || !$vpassword->isValid()) {
      $errors = true;
    }

    if (!$errors) {
      $user = new UserDB($pdo);

      function validateUser($username, $password, $user){
        $salt = $user->getSalt($username);
        $userId = $user->getValidateUserId($username, $password, $salt);
        if (!empty($userId)) {
          return $userId;
        }
        return false;
      }
      //Look for user in UserDB

      $userId = validateUser($_POST['username'], $_POST['password'], $user);
      if ($userId == false) {
        $errors = true;
        $errorMessages .= "<p>Invalid LogIn</p>";
      }

      if($userId != false){
        $_SESSION['user'] = $userId;
        header("Location: myAccount.php?user=".$userId);//Sending userId is for testing

      }
    }
  }
?>
