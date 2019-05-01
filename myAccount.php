<?php
	session_start();
	include "includes/config.inc.php";

	$userId = $_SESSION['user'];
	$users = new UserDB($pdo);
	$user = $users->findById($userId);
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
			<h3 id="welcomeUser">Welcome, <?php echo $user['firstName']; ?></h3>
			<h4><a href="logOut.php">Log Out</a></h4>
			<div>
				<ul>
					<li><a href="payOptions.php">Payment Options</a></li>
					<li><a href="#">Change Profile</a></li>
					<li><a href="orderHistory.php">Order History</a></li>
					<li><a href="#">Posted Books</a></li><!--Possibly take out later-->
					<li><a href="addBook.php">Post to Student Market</a></li><!--Possibly take out later-->
				</ul>
			</div>
		</article>
		<?php include "includes/footer.inc.php";?>
	</body>
</html>
