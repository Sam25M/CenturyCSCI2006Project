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
      getStudentBookTotal($postedBook);
    }
  }

  $newOrder = new Order($date, $total, $payMethod, $payExpire, $_SESSION['user'], $pdo);
  $newOrder->insertIntoOrderDB();
  $allOrders = $orders->getAll();

  foreach ($cart as $key => $value) {
    foreach ($value as $key2 => $value2) {
      echo "Key: ".$key2." Value: ".$value2."<br>";
    }

  }
  echo "Total: ".$total."<br>";

  foreach ($cart as $item => $subArr) {
    foreach ($allOrders as $orderItem => $subOrder) {
      echo $subOrder[0]." order id db<br>";
      echo $subOrder[1]." order date db<br>";
      echo $subOrder[2]." total db<br>";
      echo $subOrder[3]." card db<br>";
      echo $subOrder[4]." card exp db<br>";
      echo $subOrder[5]." user id db<br>";;
      if ($subOrder[1] == $date && $subOrder[2] == $total && $subOrder[5] == $_SESSION['user']) {
        $orderId = $subOrder[0];
      }
    }
    echo $orderId." order id<br>";
    echo $subArr[0]." isbn<br>";
    echo $subArr[1]." postId<br>";
    echo $subArr[2]." price<br>";
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
