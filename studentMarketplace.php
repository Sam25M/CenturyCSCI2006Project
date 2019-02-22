<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Student Marketplace</title>
		<!--bootstrap css stylesheet, this is making our css slightly inflated for some reason -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<script src="js/index.js" type="text/javascript"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<header>
			<nav id="headnav">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="logIn.html">My Account</a></li>
					<li><a href="accountReg.html">Account Registration</a></li>
					<li><a href="cart.html">Cart</a></li>
				</ul>
				<h1>College Bookstore</h1>
				<!--Will be populated by php.-->
			</nav>
		</header>
		<main>
			<?php
				#button I found on bootstrap
				echo "<a href=\"addBook.php\" class=\"btn btn-primary btn-lg active\" role=\"button\" aria-pressed=\"true\">Add Post</a>";
			 ?>
		</main>
		<footer>CSCI 2006 Project; Spring 2019; Baani; By: Shelby Medlock and Tom McDonald</footer>
		<!-- script tags only necessary for any bootstrap components that use javascript -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>
