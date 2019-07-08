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
		else{
				$sql = "INSERT INTO books(title,author,description) VALUES('$title','$author','$description')";
				/* $stmt = $conn->prepare($sql); */

				/* $stmt->bind_param("sss",$title,$author,$description); */
				if ($conn->query($sql) ) {
						echo "Book Added";
						header("location:../index.php");
				}
				else{
						echo "Error: " . $sql . "<br>" . $conn->error;
				}

				/* $stmt->execute(); */
				/* $stmt->close(); */
				/* $conn->close(); */
				/* header("location:../index.php"); */
		}
}
else {
		header("location:../addBook.php");
		exit();
}
?>
