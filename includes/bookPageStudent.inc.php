<?php
$bookIsbn = $_GET['isbn'];

$books = new AddedBookDB($pdo);
$book = $books->findById($bookIsbn);

$title = $book['title'];
$price = $book['price'];
$img = $book['bookCover'];
$author = $book['author'];
$edition = $book['edition'];
$quality = $book['quality']
$isbn = $book['isbn'];
?>
