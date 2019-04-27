<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>College Bookstore</title>
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<?php include "includes/header.inc.php";?>
		<form>
			<input type="button" value="School Marketplace" id="schoolBtn" onclick="location.href='instructorList.php';"/>
			<input type="button" value="Student Marketplace" id="studentBtn" onclick="location.href='studentMarketplace.php';"/>
			<!--School Marketplace button will go to instructorList.php. Student Marketplace button will
		go to studentMarketplace.php -->
		</form>
		<img class="library" src="images/library.jpg" alt="library">

		<?php include "includes/footer.inc.php";?>
	</body>
</html>
