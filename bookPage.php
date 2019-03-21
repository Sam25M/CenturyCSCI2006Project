<?php
	include "includes/config.inc.php";

	$subjectId = null;
	if(isset($_GET['id'])){
		$subjectId = $_GET['id'];
	}

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
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo $subjectTitle; ?></title>
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<?php include "includes/header.inc.php";?>
		<article class="book">
			<h2><?php echo $subjectTitle; ?></h2>
			<figure class="bookImg">
				<img src="images/<?php echo $img; ?>.jpg" alt="<?php echo $title; ?>" height="15%" width="15%">
			</figure>
			<table class="bookpagetable">
				<thead>
					<tr>
						<th colspan="2">Textbook Details</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><strong>Title</strong></td>
						<td id="bTitle"><?php echo $title; ?></td>
					</tr>
					<tr>
						<td><strong>Price (New)</strong></td>
						<td id="bNewPrice">$<?php echo $newPrice; ?></td>
					</tr>
					<tr>
						<td><strong>Price (Used)</strong></td>
						<td id="bUsedPrice">$<?php echo $usedPrice; ?></td>
					</tr>
					<tr>
						<td><strong>Author</strong></td>
						<td><?php echo $author; ?></td>
					</tr>
					<tr>
						<td><strong>Edition/Copyright</strong></td>
						<td><?php echo $edition; ?></td>
					</tr>
					<tr>
						<td><strong>Published Date</strong></td>
						<td><?php echo $pubDate; ?></td>
					</tr>
					<tr>
						<td><strong>ISBN</strong></td>
						<td><?php echo $isbn; ?></td>
					</tr>
				</tbody>
			</table>
			<input type="button" id="newButton" value="Add New to Cart">
			<input type="button" id="usedButton" value="Add Used to Cart">
			<section>
				<h3>Textbook Description</h3>
				<p><?php echo $text; ?></P>
			</section>
		</article>
		<?php include "includes/footer.inc.php";?>
		<script src="js/bookPages.js" type="text/javascript"></script>
	</body>
</html>
