<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    foreach ($booksDB as $item) {
      if(isset($_COOKIE[$item['subjectId']])){
        $bookIsbn = $_COOKIE[$item['subjectId']];
        setcookie($item['subjectId'], '', time()-3600);
        setcookie($bookIsbn, '', time()-3600);
        unset($_COOKIE[$item['subjectId']]);
        unset($_COOKIE[$bookIsbn]);
      }
    }
    /*if (isset($_COOKIE['postId'])) {
      setcookie('postId', '', time()-3600);
      unset($_COOKIE['postId']);
    }*/
  }
?>
