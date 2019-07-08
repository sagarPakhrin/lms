<?php include("header.php"); ?>
<?php include("nav.php"); ?>
<div class="container">
<div class="row">
<?php
require("./includes/dbh.inc.php");
$sql = "select * from books";

$result = $conn->query($sql);
if ($result->num_rows>0){
		while($row = $result->fetch_assoc()){
		echo '				<div class="col s12 m4">';
		echo '				<div class="card">';
		echo '				<div class="card-image">';
		echo '				<img src="./uploads/default.jpg">';
		echo '				<span class="card-title">'.$row['title'].'</span>';
		echo '				</div>';
		echo '				<div class="card-content">';
		echo '				<p>'.$row['description'].'</p>';
		echo '				</div>';
		echo '				<div class="card-action">';
		echo '				<a href="./bookdetail.php?id='.$row['id'].'">View Detail</a>';
		echo '				</div>';
		echo '				</div>';
		echo '				</div>';
		}
}
?>
</div>
</div>

<?php include("footer.php"); ?>
