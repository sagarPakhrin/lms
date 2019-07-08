<?php
include("header.php");
include("nav.php");
?>
<center>
	<h1>Add A Book</h1>
</center>
 <div class="row">
<div class="container">
		<form class="col s12" method="POST" action="./includes/addBook.inc.php">
			<div class="row">
				<div class="input-field col s6">
					<input id="title" name="title" type="text" class="validate">
					<label for="title">Title</label>
				</div>
				<div class="input-field col s6">
					<input id="author" name="author" type="text" class="validate">
					<label for="author">Author</label>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
				 <textarea id="textarea1" name="description" placeholder="Description" class="materialize-textarea" cols="10"></textarea>
				</div>
			</div>
<div class="right-align">
<button class="btn" name="addBook">Add</button>
</div>
		</form>
	</div>
</div>

<?php include("footer.php"); ?>
