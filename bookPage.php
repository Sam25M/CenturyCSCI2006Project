<?php
	include "includes/config.inc.php";

	$subjectId = null; //for school market side.
	$postId = null; //for student market side.
	if(isset($_GET['id'])){
		//school market side.
		include "includes/bookPageSchool.inc.php";
	}

	if(isset($_GET['postId'])){
		//student market side.
		include "includes/bookPageStudent.inc.php";
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php if ($subjectId != null) {
			echo $subjectTitle;
		}
		if ($postId != null) {
			echo "Student Marketplace";
		}
		?></title>
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<?php include "includes/header.inc.php";?>
		<article class="book">
			<h2><?php if ($subjectId != null) {
				echo $subjectTitle;
			}
			if ($postId != null) {
				echo $title;
			}
			?></h2>
			<figure class="bookImg">
				<img src="images/<?php echo $img; ?>.jpg" alt="<?php echo $title; ?>" height="15%" width="15%">
			</figure>
			<table class="bookpagetable">
				<thead>
					<tr>
						<th colspan="2">Textbook Details</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><strong>Title</strong></td>
						<td id="bTitle"><?php echo $title; ?></td>
					</tr>
					<?php
						if($subjectId != null){
							echo "<tr>
								<td><strong>Price (New)</strong></td>
								<td id=\"bNewPrice\">$".$newPrice."</td>
							</tr>
							<tr>
								<td><strong>Price (Used)</strong></td>
								<td id=\"bUsedPrice\">$".$usedPrice."</td>
							</tr>";
						}
						if($postId != null){
							echo "<tr>
								<td><strong>Price</strong></td>
								<td id=\"bPrice\">$".$price."</td>
							</tr>";
						}
					?>
					<tr>
						<td><strong>Author</strong></td>
						<td><?php echo $author; ?></td>
					</tr>
					<tr>
						<td><strong>Edition/Copyright</strong></td>
						<td><?php echo $edition; ?></td>
					</tr>
					<?php
						if ($subjectId != null) {
							echo "<tr>
								<td><strong>Published Date</strong></td>
								<td>".$pubDate."</td>
							</tr>";
						}
						if ($postId != null) {
							echo "<tr>
								<td><strong>Condition</strong></td>
								<td>".$quality."</td>
							</tr>";
						}
					?>
					<tr>
						<td><strong>ISBN</strong></td>
						<td><?php echo $isbn; ?></td>
					</tr>
				</tbody>
			</table>
			<form method="post" action="cart.php">
			<?php
				if ($subjectId != null) {
					echo "<input type=\"submit\" id=\"newButton\" value=\"Add New to Cart\">
					<input type=\"submit\" id=\"usedButton\" value=\"Add Used to Cart\">";
				}
				if ($postId != null) {
					echo "<input type=\"submit\" id=\"addCartButton\" value=\"Add to Cart\"";
				}
			?>
			</form>
			<?php
				if($subjectId != null){
					echo "<section>
						<h3>Textbook Description</h3>
						<p>".$text."</P>
					</section>";
				}
			?>
		</article>
		<?php include "includes/footer.inc.php";?>
		<script src="js/bookPages.js" type="text/javascript"></script>
	</body>
</html>
