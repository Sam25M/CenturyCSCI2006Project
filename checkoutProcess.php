<?php
  session_start();
  include "includes/config.inc.php";

  $books = new SchoolBookDB($pdo);
  $orders = new OrderDB($pdo);
  $marketBooks = new AddedBookDB($pdo);
  $marketDB = $marketBooks->getAll();
  $booksDB = $books->getAll();
  $total = null;
  $date = date("Y-m-d");
  $cart = [];
  $payMethod = $_POST['card'];
  $payExpire = $_POST['exp'];

  foreach ($booksDB as $item) {
    if (isset($_COOKIE[$item['subjectId']])) {
      $bookIsbn = $_COOKIE[$item['subjectId']];
      $book = $books->findByIsbn($bookIsbn);
      if (isset($_COOKIE[$bookIsbn])) {
        $version = $_COOKIE[$bookIsbn];
        getSchoolBookTotal($book, $version);
      }
    }
  }

  foreach ($marketDB as $item) {
    if (isset($_COOKIE[$item['postId']])) {
      $postedBook = $marketBooks->findById($item['postId']);
      $marketBooks->updateInstock('no', $postedBook['postId']);
      getStudentBookTotal($postedBook);
    }
  }

  $newOrder = new Order($date, $total, $payMethod, $payExpire, $_SESSION['user'], $pdo);
  $newOrder->insertIntoOrderDB();
  $allOrders = $orders->getAll();

  foreach ($cart as $item => $subArr) {
    foreach ($allOrders as $orderItem => $subOrder) {
      if ($subOrder[1] == $date && $subOrder[2] == $total && $subOrder[5] == $_SESSION['user']) {
        $orderId = $subOrder[0];
      }
    }
    $bookDetails = new OrderDetails($orderId, $subArr[0], $subArr[1], $subArr[2], $pdo);
    $bookDetails->insertIntoOrderDetailsDB();
  }

  function getSchoolBookTotal($book, $version){
    if ($version == 'newBook') {
      global $total;
      global $cart;
      $total += $book['newprice'];
      $cart[] = array($book['isbn'], null, $book['newprice']);
    }
    if ($version == 'usedBook') {
      global $total;
      global $cart;
      $total += $book['usedprice'];
      $cart[] = array($book['isbn'], null, $book['usedprice']);
    }
  }

  function getStudentBookTotal($postedBook){
    global $total;
    global $cart;
    $total += $postedBook['price'];
    $cart[] = array($postedBook['isbn'], $postedBook['postId'], $postedBook['price']);
  }
  setcookie('orderDone', 'true', time()+60*60*24);//remove cart cookies
  header("Location: cart.php");
?>
