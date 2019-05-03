<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['newButton'])) {
      $inCart = true;
      setcookie($subjectId, $isbn, time()+60*60*24);
      setcookie($isbn, 'newBook', time()+60*60*24);
    }

    if (isset($_POST['usedButton'])) {
      $inCart = true;
      setcookie($subjectId, $isbn, time()+60*60*24);
      setcookie($isbn, 'usedBook', time()+60*60*24);
    }

    if(isset($_POST['addCartButton'])){
      $postInCart = true;
      setcookie($postId, $isbn, time()+60*60*24);
    }

  }
?>
