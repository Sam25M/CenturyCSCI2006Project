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
		<meta charset="utf-8">
		<title>My Account</title>
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<?php include "includes/header.inc.php";?>
		<article>
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
