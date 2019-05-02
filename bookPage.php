<?php
	session_start();
	include "includes/config.inc.php";

	$subjectId = null; //for school market side.
	$postId = null; //for student market side.
	$inCart = false;
	$postInCart = false;
	if(isset($_GET['id'])){
		//school market side.
		include "includes/bookPageSchool.inc.php";
	}

	if(isset($_GET['postId'])){
		//student market side.
		include "includes/bookPageStudent.inc.php";
	}

	include "includes/addToCart.inc.php";
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
			<?php
				if ($subjectId != null) {
					echo "<a href=\"instructorList.php\">Back to Instructor List</a>";
				}
				if ($postId != null) {
					echo "<a href=\"studentMarketplace.php\">Back to Student Marketplace</a>";
				}
			?>
			<h2><?php if ($subjectId != null) {
				echo $subjectTitle;
			}
			if ($postId != null) {
				echo $title;
			}
			?></h2>
			<figure class="bookImg">
				<img src="images/<?php echo $img; ?>" alt="<?php echo $title; ?>" height="15%" width="15%">
			</figure>
			<form method="post" action="<?php
																		if ($subjectId != null) {
																			echo $_SERVER["PHP_SELF"]."?id=".$subjectId;
																		}
																		if ($postId != null) {
																			echo $_SERVER["PHP_SELF"]."?postId=".$postId;
																		}
																	?>">
			<table class="bookpagetable">
				<thead>
					<tr>
						<th colspan="2">Textbook Details</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><strong>Title</strong></td>
						<td id="bTitle" name="title"><?php echo $title; ?></td>
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
					<?php
						if ($subjectId != null) {
							echo "<tr>
								<td><strong>Edition/Copyright</strong></td>
								<td>".$edition."</td>
							</tr>
							<tr>
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
						<td name="isbn"><?php echo $isbn; ?></td>
					</tr>
				</tbody>
			</table>

			<?php
				if (isset($_COOKIE[$subjectId]) || $inCart) {
					echo "<p>In Cart</p>";
				}else {
					if ($subjectId != null) {
						echo "<input type=\"submit\" id=\"newButton\" name=\"newButton\" value=\"Add New to Cart\">
						<input type=\"submit\" id=\"usedButton\" name=\"usedButton\" value=\"Add Used to Cart\">";
					}
				}
				if (isset($_COOKIE[$postId]) || $postInCart) {
					echo "<p>In Cart</p>";
				}else {
					if ($postId != null) {
						echo "<input type=\"submit\" id=\"addCartButton\" name=\"addCartButton\" value=\"Add to Cart\">";
					}
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
	</body>
</html>
