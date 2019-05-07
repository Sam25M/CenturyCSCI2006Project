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
		<title>My Account</title>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<?php include "includes/header.inc.php";?>
		<article class="w3-container">
			<h2>My Account</h2>
			<h3 id="welcomeUser">Welcome, <?php echo $user['firstName']; ?></h3>
			<h4><a href="logOut.php">Log Out</a></h4>
			<div class="w3-container">
				<ul>
					<li><a href="payOptions.php">Payment Options</a></li>
					<li><a href="orderHistory.php">Order History</a></li>
					<li><a href="userPosts.php">Posted Books</a></li>
					<li><a href="addBook.php">Post to Student Market</a></li>
				</ul>
			</div>
		</article>
		<?php include "includes/footer.inc.php";?>
	</body>
</html>
