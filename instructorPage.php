<?php
	include "includes/config.inc.php";

	$instructorId = null;
	if(isset($_GET['id'])){
		$instructorId = $_GET['id'];
	}

	$instructors = new InstructorDB($pdo);
	$subjects = new SubjectDB($pdo);
	$allSubjects = $subjects->getAll();
	$instructor = $instructors->findById($instructorId);
	$instructorName = $instructor['firstName']." ".$instructor['lastName'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $instructorName; ?></title>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<?php include "includes/header.inc.php";?>
		<!--Has a list of courses for a single instructor.-->
		<article class="w3-container">
			<?php
				echo "<h2>".$instructorName."</h2>";
			?>
			<ul>
				<?php
				foreach ($allSubjects as $item) {
					if ($item['instructorId'] == $instructorId) {
						echo "<li><a href=\"bookPage.php?id=".$item['subjectId']."\">".$item['category']." ".$item['subjectId']." ".$item['title']."</a></li><br>";
					}
				}
				?>
			</ul>
		</article>
		<?php include "includes/footer.inc.php";?>
	</body>
</html>
