<?php
include("header.php");
include("nav.php");
?>
<?php
require("./includes/dbh.inc.php");
$id = $_GET['id'];
$sql = "select * from books where id='$id'";
$result = $conn->query($sql);
if($result->num_rows>0){
$row = $result->fetch_assoc();
echo '<center> <h1>Edit Book Detail</h1> </center>';
echo ' <div class="row">';
echo '<div class="container">';
echo '
<div class="col s12" style="margin-bottom:20px;">
	<center>
<img src="'.$row["imageURL"].'" alt="">
</center>
</div>
<form class="col s12" method="POST" action="./includes/updatebook.inc.php?id='.$id.'" enctype="multipart/form-data">
			<div class="row">
				<div class="input-field col s6">
					<input id="title" name="title" type="text" class="validate" value='.$row['title'].'>
					<label for="title">Title</label>
				</div>
				<div class="input-field col s6">
					<input id="author" name="author" type="text" class="validate" value="'.$row['author'].'">
					<input id="id" name="id" type="text" class="validate" value="'.$row['id'].'" style="display:none">
					<label for="author">Author</label>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
				 <textarea id="textarea1" name="description" placeholder="Description" class="materialize-textarea" cols="10">'.$row["description"].'</textarea>
				</div>
			</div>
		<div class="right-align">
<div class="file-field input-field">
			<div class="btn">
				<span>Change Cover Photo</span>
				<input type="file" name="imageURL">
			</div>
			<div class="file-path-wrapper">
				<input class="file-path validate" type="text">
			</div>
</div>
		<button class="btn" name="updateDetail">Update</button>
		<a href="bookdetail.php?id='.$row['id'].'" class="btn">Cancel</a>
		</div>
		</form>
	</div>
</div>';
}
?>
<?php include("footer.php"); ?>
