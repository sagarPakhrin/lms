<?php include("header.php"); ?>
<?php include("nav.php"); ?>
<div class="container">
<?php
require("./includes/dbh.inc.php");
$sql = "select * from books";

$result = $conn->query($sql);
if ($result->num_rows>0){
		while($row = $result->fetch_assoc()){
				echo "id: ". $row['id']."</br>";
				echo "Title: ". $row['title']."</br>";
				echo "Description: ". $row['description']."</br>";
		}
}
?>


</div>

<?php include("footer.php"); ?>
