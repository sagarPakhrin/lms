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
		echo '				<div class="col s12 m4">
						<div class="card">
						<div class="card-image">
';
/* if($row['imageURL']) */
/* { */
/* 		echo '<img src="'.$row['imageURL'].'">'; */
/* } else{ */

		echo '<img src="./uploads/default.jpg">';
/* } */

						echo '<span class="card-title">'.$row['title'].'</span>
						</div>
						<div class="card-content">
						<p>'.$row['description'].'</p>
						</div>
						<div class="card-action">
						<a href="./bookdetail.php?id='.$row['id'].'">View Detail</a>
						</div>
						</div>
						</div>
';
		}
}
?>
</div>
</div>

<?php include("footer.php"); ?>
