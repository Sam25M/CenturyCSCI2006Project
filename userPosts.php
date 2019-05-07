<?php
	session_start();
	include "includes/config.inc.php";
  $postsDB = new AddedBookDB($pdo);
	$allPosts = $postsDB->getAll();
  $match = false;
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
			<h3>Posted Books</h3>
			<div>
        <?php
					if (!empty($allPosts)) {
						echo "<ul>";
						foreach ($allPosts as $item) {
							if ($item['sellerId'] == $_SESSION['user']) {
								$match = true;
								echo "<li>".$item['title']."</li>";
							}
						}
						if ($match == false) {
							echo "<li>No books posted</li>";
						}
						echo "</ul>";
					}
				?>
			</div>
		</article>
		<?php include "includes/footer.inc.php";?>
	</body>
</html>
