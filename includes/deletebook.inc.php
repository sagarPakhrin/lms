<?php
require("dbh.inc.php");
if(isset($_GET['deletebook'])){
$id = $_GET['id'];
$sql = "DELETE FROM books where id=$id";
if ($conn->query($sql)) {
		header("location:../index.php?delete=success");
		exit();
}
}
else{
		$id = $_GET['id'];
		header("locatino:../bookdetail.php?id=$id");
		exit();
}
?>
