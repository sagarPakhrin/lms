<?php
include("header.php");
include("nav.php");
?>
<div class="container" style="margin-top:20px;">

<?php
require("./includes/dbh.inc.php");
$id = $_GET['id'];
$sql = "select * from books where id='$id'";
$result = $conn->query($sql);
if($result->num_rows>0){
		$row = $result->fetch_assoc();
		echo "<div class='row'>";
		echo "<div class='col s12 m6'>";
		if($row['imageURL']){
		echo "<img src='".$row['imageURL']."'class='responsive-img'>";
		}
		else{
				echo "<img src='./uploads/default.jpg' class='responsive-img'>";
		}
		echo "</div>";
		echo "<div class='col s12 m6'>";
		echo "<h1>Title:".$row['title']."</h1>";
		echo "<h4>By: ".$row['author']."</h4>";
		echo "<p>".$row['description']."</p>";
		echo "<div class='row right-align'>";
		if($_SESSION['username']){
				echo "<div class='col'>";
				echo "<a href='./borrowbook.php?id=".$row['id']."' class='btn'>Borrow</a>";
				echo "</div>";
				echo "<div class='col'>";
				echo "<a href='./editbook.php?id=".$row['id']."' class='btn'>edit</a>";
				echo "</div>";
				echo "<div class='col'>";
				echo "<a href='./includes/deletebook.inc.php?deletebook&id=".$id."' class='btn'>delete</a>";
				echo "</div>";
		}
		echo "</div>";
		echo "</div>";
		echo "</div>";
}

?>

</div>
