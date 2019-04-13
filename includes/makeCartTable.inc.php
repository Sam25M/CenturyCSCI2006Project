<?php
$books = new SchoolBookDB($pdo);
$booksDB = $books->getAll();
include "includes/emptyCart.inc.php";
$cart = "";
$total = null;
foreach ($booksDB as $item) {
  if (isset($_COOKIE[$item['subjectId']])) {
    $bookIsbn = $_COOKIE[$item['subjectId']];
    $book = $books->findByIsbn($bookIsbn);
    if (isset($_COOKIE[$bookIsbn])) {
      $version = $_COOKIE[$bookIsbn];
      $cart .= makeCartRow($book, $version);
    }
  }
}
if (!empty($cart)) {
  $cart .= makeTotalRow($total);
}

function makeCartRow($book, $version){
  if ($version == 'newBook') {
    global $total;
    $total += $book['newprice'];
    return "<tr><td>".$book['title']."</td><td>$".$book['newprice']."</td></tr>";
  }
  if ($version == 'usedBook') {
    global $total;
    $total += $book['usedprice'];
    return "<tr><td>".$book['title']."</td><td>$".$book['usedprice']."</td></tr>";
  }
}

function makeTotalRow($total){
  return "<tr><td>Total</td><td>$".$total."</td></tr>";
}

?>
