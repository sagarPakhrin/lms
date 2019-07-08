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
echo '<center>';
echo '	<h1>Edit Book Detail</h1>';
echo '</center>';
echo ' <div class="row">';
echo '<div class="container">';
echo '		<form class="col s12" method="POST" action="./includes/updatebook.inc.php" enctype="multipart/form-data">';
echo '			<div class="row">';
echo '				<div class="input-field col s6">';
echo '					<input id="title" name="title" type="text" class="validate" value='.$row['title'].'>';
echo '					<label for="title">Title</label>';
echo '				</div>';
echo '				<div class="input-field col s6">';
echo '					<input id="author" name="author" type="text" class="validate" value="'.$row['author'].'">';
echo '					<label for="author">Author</label>';
echo '				</div>';
echo '			</div>';
echo '			<div class="row">';
echo '				<div class="col s12">';
echo '				 <textarea id="textarea1" name="description" placeholder="Description" class="materialize-textarea" cols="10">'.$row["description"].'</textarea>';
echo '				</div>';
echo '			</div>';
echo '		<div class="right-align">';
echo '<input class="text" type="text" name="imageURL" value="">';
echo '		<label for="imageURL" class="btn green">Upload Image</label>';
echo '		<button class="btn" name="updateDetail">Update</button>';
echo '		</div>';
echo '		</form>';
echo '	</div>';
echo '</div>';
}
?>
<?php include("footer.php"); ?>
