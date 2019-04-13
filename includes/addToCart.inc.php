<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inCart = true;
    if (isset($_POST['newButton'])) {
      //setcookie for name=title value=isbn
      setcookie($subjectId, $isbn, time()+60*60*24);
      setcookie($isbn, 'newBook', time()+60*60*24);
    }

    if (isset($_POST['usedButton'])) {
      //setcookie for name=title value=isbn
      setcookie($subjectId, $isbn, time()+60*60*24);
      setcookie($isbn, 'usedBook', time()+60*60*24);
    }

    /*if(isset($_POST['addCartButton'])){
      //setcookie for name=postId value=$postId
      $postInCart = true;
      setcookie('postId', $postId, time()+60*60*24);
    }*/
  }
?>
