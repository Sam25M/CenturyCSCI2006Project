<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_COOKIE['orderDone'])) {

    foreach ($booksDB as $item) {
      if(isset($_COOKIE[$item['subjectId']])){
        $bookIsbn = $_COOKIE[$item['subjectId']];
        setcookie($item['subjectId'], '', time()-3600);
        setcookie($bookIsbn, '', time()-3600);
        unset($_COOKIE[$item['subjectId']]);
        unset($_COOKIE[$bookIsbn]);
      }
    }

    foreach ($marketDB as $item) {
      if (isset($_COOKIE[$item['postId']])) {
        setcookie($item['postId'], '', time()-3600);
        unset($_COOKIE[$item['postId']]);
      }
    }

    if (isset($_COOKIE['orderDone'])) {
      setcookie('orderDone', '', time()-3600);
      unset($_COOKIE['orderDone']);
      header("Location: orderHistory.php");
    }
  }
?>
