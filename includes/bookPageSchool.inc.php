<?php
$subjectId = $_GET['id'];

$books = new SchoolBookDB($pdo);
$book = $books->findById($subjectId);
$subjects = new SubjectDB($pdo);
$subject = $subjects->findById($subjectId);
$subjectTitle = $subject['title'];

$title = $book['title'];
$newPrice = $book['newprice'];
$usedPrice = $book['usedprice'];
$img = $book['bookCover'];
$author = $book['author'];
$edition = $book['edition'];
$pubDate = $book['pubDate'];
$isbn = $book['isbn'];
$text = $book['description'];
?>
