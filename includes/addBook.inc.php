<?php
require('dbh.inc.php');
if(isset($_POST['addBook'])){
		$title = $_POST['title'];
		$author = $_POST['author'];
		$description = $_POST['description'];


		if(empty($title) || empty($author) || empty($description )){
				header("location: ../addBook.php?error=emptyfields&title=".$title."&author=".$author);
				exit();
		}

}
else {
		header("location:../addBook.php");
		exit();
}
?>
