<?php
	include "includes/config.inc.php";

	$instructors = new InstructorDB($pdo);
	$allInstructors = $instructors->getAll();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Instructors</title>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
