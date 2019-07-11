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
				$file = $_FILES['imageURL'];
				$fileName = $_FILES['imageURL']['name'];
				$fileTmpName = $_FILES['imageURL']['tmp_name'];
				$fileSize=$_FILES['imageURL']['size'];
				$fileError = $_FILES['imageURL']['error'];
				$fileType = $_FILES['imageURL']['type'];
				$moveFile = false;

				$fileExt = explode('.',$fileName);

				$fileActualExt = strtolower(end($fileExt));

				$allowed = array("jpg","png","jpeg");
				if(in_array($fileActualExt,$allowed)){
						if($fileError === 0){
								if($fileSize < 50000000){
										$fileNameNew = uniqid('',true).".".$fileActualExt;
										$fileDestination = '../uploads/'.$fileNameNew;
										move_uploaded_file($fileTmpName,$fileDestination);
								}
								else{
										header("location:../addBook.php?error=fileTooBig");
								}
						}
						else{
								header("location:../addBook.php?error=errorUploadingFile");
						}
				}
				else{
						header("location:../addBook.php?error=filenotassowed");
				}

				$sql = "INSERT INTO books(title,author,description,imageURL) VALUES('$title','$author','$description','$fileDestination')";

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
