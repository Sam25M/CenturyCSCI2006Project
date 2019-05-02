<?php
	include "includes/config.inc.php";

	$instructors = new InstructorDB($pdo);
	$allInstructors = $instructors->getAll();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Instructors</title>
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<?php include "includes/header.inc.php";?>
		<ul>
		<?php
			foreach ($allInstructors as $item) {
				echo "<li><a href=\"instructorPage.php?id=".$item['instructorId']."\">".$item['lastName'].", ".$item['firstName']."</a></li><br>";
			}
		?>
		</ul>
		<?php include "includes/footer.inc.php";?>
	</body>
</html>
