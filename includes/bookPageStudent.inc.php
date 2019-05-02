<?php
$postId = $_GET['postId'];

$books = new AddedBookDB($pdo);
$book = $books->findById($postId);

$title = $book['title'];
$price = $book['price'];
$img = $book['bookCover'];
$author = $book['author'];
$quality = $book['condition'];//quality
$isbn = $book['isbn'];
$sellerId = $book['sellerId'];
?>
