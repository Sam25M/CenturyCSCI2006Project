<!DOCTYPE html>
<html lang="en">
	<head>
		<title>College Bookstore</title>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<?php include "includes/header.inc.php";?>
		<form id="homeBtns" class="w3-row-padding">
			<div class="w3-col s6 w3-center"><input type="button" value="School Marketplace" id="schoolBtn" onclick="location.href='instructorList.php';"/></div>
			<div class="w3-col s6 w3-center"><input type="button" value="Student Marketplace" id="studentBtn" onclick="location.href='studentMarketplace.php';"/></div>
			<!--School Marketplace button will go to instructorList.php. Student Marketplace button will
		go to studentMarketplace.php -->
		</form>
		<div class="w3-row-padding">
		<div class="w3-col s12 w3-center"><img class="library" src="images/library.jpg" alt="library"></div>
		</div>

		<?php include "includes/footer.inc.php";?>
	</body>
</html>
