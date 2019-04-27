<?php
	include "includes/config.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>My Account</title>
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<?php include "includes/header.inc.php";?>
		<article>
			<h2>My Account</h2>
			<p id="welcomeUser"></p>
			<div>
				<ul>
					<li><a href="#">Payment Options</a></li>
					<li><a href="#">Change Profile</a></li>
					<li><a href="#">Order History</a></li>
					<li><a href="postedBooks.php">Posted Books</a></li>
					<li><a href="addBook.php">Post to Student Market</a></li>
				</ul>
			</div>
		</article>
		<?php include "includes/footer.inc.php";?>
	</body>
</html>
