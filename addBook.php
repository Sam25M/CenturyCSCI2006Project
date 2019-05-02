<?php
	session_start();
	if (!isset($_SESSION['user'])) {
		header("Location: logIn.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Add a Book to Sell</title>
		<!--bootstrap css stylesheet, this is making our css slightly inflated for some reason -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="css/mainStyles.css" rel="stylesheet"/>
		<script src="js/index.js" type="text/javascript"></script>
		<script src="js/radio.js" type="text/javascript"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<?php include "includes/header.inc.php";?>
		<div class="container">
			<!--bootstrap form, from https://getbootstrap.com/docs/4.3/components/forms/ -->
				<form method="GET" action="studentMarketplace.php">
			  <div class="form-group row">
			    <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" id="inputTitle" name="inputTitle" placeholder="Title">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="inputAuthor" class="col-sm-2 col-form-label">Author</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" id="inputAuthor" name="inputAuthor" placeholder="Author">
			    </div>
			  </div>
				<div class="form-group row">
			    <label for="inputIsbn" class="col-sm-2 col-form-label">Isbn</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" id="inputIsbn" name="inputIsbn" placeholder="Isbn#">
			    </div>
			  </div>
				<div class="form-group row">
			    <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
			    <div class="col-sm-6">
			      <input type="number" class="form-control" id="inputPrice" name="inputPrice" placeholder="$Price" step = ".01">
			    </div>
			  </div>
				<div class="form-group row">
					<label for="inputCondition" class="col-sm-2 col-form-label">Condition</label>
					<div class="col-sm-2">
						<select class="custom-select" id="inputCondition" name="condition">
			        <option selected>Choose Quality...</option>
			        <option value="New">New</option>
			        <option value="Good">Good</option>
			        <option value="Poor">Poor</option>
						</select>
					</div>
				</div>
			  <fieldset class="form-group">
			    <div class="row">
			      <legend class="col-form-label col-sm-2 pt-0">Genre</legend>
			      <div class="col-sm-10">
			        <div class="form-check">
			          <input class="form-check-input" type="radio" onclick="hide();" name="gridRadios" id="gridRadios1" value="Computer Science" checked>
			          <label class="form-check-label" for="gridRadios1">
			            Computer Science
			          </label>
			        </div>
			        <div class="form-check">
			          <input class="form-check-input" type="radio" onclick="hide();" name="gridRadios" id="gridRadios2" value="Mathematics">
			          <label class="form-check-label" for="gridRadios2">
			            Mathematics
			          </label>
			        </div>
							<div class="form-check">
			          <input class="form-check-input" type="radio" onclick="hide();" name="gridRadios" id="gridRadios3" value="History">
			          <label class="form-check-label" for="gridRadios3">
			            History
			          </label>
			        </div>
							<div class="form-check">
			          <input class="form-check-input" type="radio" onclick="hide();" name="gridRadios" id="gridRadios4" value="Sociology">
			          <label class="form-check-label" for="gridRadios4">
			            Sociology
			          </label>
			        </div>
							<div class="form-check">
			          <input class="form-check-input" type="radio" onclick="unhide();" name="gridRadios" id="gridRadios5" value="option5">
			          <label class="form-check-label" for="gridRadios5">
			            Other
			          </label> <input type="text" name="othergenre" id="otherbox" disabled/>
			        </div>
			        <div class="form-check disabled">
			          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios6" value="option6" disabled>
			          <label class="form-check-label" for="gridRadios6">
			            Art
			          </label>
			        </div>
			      </div>
			    </div>
				</fieldset>
				<!-- SET UP CHECKBOX. came with bootstrap form, delete if unused
			  <div class="form-group row">
			    <div class="col-sm-2">Checkbox</div>
			    <div class="col-sm-10">
			      <div class="form-check">
			        <input class="form-check-input" type="checkbox" id="gridCheck1">
			        <label class="form-check-label" for="gridCheck1">
			          Example checkbox
			        </label>
			      </div>
			    </div>
			  </div>
			-->
			  <div class="form-group row">
			    <div class="col-sm-10">
			      <button type="submit" class="btn btn-primary">Sell Book</button>
			    </div>
			  </div>
			</form>

		</div>
		<?php include "includes/footer.inc.php";?>
		<!-- script tags only necessary for any bootstrap components that use javascript -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>
