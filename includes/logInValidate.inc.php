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
      //Look for user in UserDB
      $username = $_POST['username'];
      $password = $_POST['password'];

      $users = new UserDB($pdo);
      $user = $users->selectUser($username);

      if (empty($user)) {
        $errors = true;
        $errorMessages .= "<p>User not found</p>";
      }

      if(!empty($user) && $password == $user['password']){
        header("Location: myAccount.php?user=".$username);//Sending username is for testing
      }
    }
  }
?>
