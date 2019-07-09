<?php
include("header.php");
include("nav.php");
if(!$_SESSION['username']){
		header("location:./login.php");
}
?>
<center>
	<h1>Add A Book</h1>
</center>
 <div class="row">
<div class="container">
		<form class="col s12" method="POST" action="./includes/addBook.inc.php" enctype="multipart/form-data">
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
<div class="file-field input-field">
			<div class="btn">
				<span>Upload Cover Photo</span>
				<input type="file" name="imageURL">
			</div>
			<div class="file-path-wrapper">
				<input class="file-path validate" type="text">
			</div>
		</div>
		<button class="btn" name="addBook">Add</button>
		</div>
		</form>
	</div>
</div>

<?php include("footer.php"); ?>
