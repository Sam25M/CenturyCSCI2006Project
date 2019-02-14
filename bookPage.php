<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title></title>
		<link href="css/mainStyles.css" rel="stylesheet"/>
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
		<article class="book">
			<h2></h2>
			<figure class="bookImg">
				<img src="images/textbook_csci.jpg" alt="Starting Out with C++ from Control Structures to Objects" height="15%" width="15%">
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
						<td id="bTitle"></td>
					</tr>
					<tr>
						<td><strong>Price (New)</strong></td>
						<td id="bNewPrice"></td>
					</tr>
					<tr>
						<td><strong>Price (Used)</strong></td>
						<td id="bUsedPrice"></td>
					</tr>
					<tr>
						<td><strong>Author</strong></td>
						<td></td>
					</tr>
					<tr>
						<td><strong>Edition/Copyright</strong></td>
						<td></td>
					</tr>
					<tr>
						<td><strong>Published Date</strong></td>
						<td></td>
					</tr>
					<tr>
						<td><strong>ISBN</strong></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<input type="button" id="newButton" value="Add New to Cart">
			<input type="button" id="usedButton" value="Add Used to Cart">
			<section>
				<h3>Textbook Description</h3>
			</section>
		</article>
		<footer>CSCI 2006 Project; Spring 2019; Baani; By: Shelby Medlock and Tom McDonald</footer>
		<script src="js/bookPages.js" type="text/javascript"></script>
	</body>
</html>
