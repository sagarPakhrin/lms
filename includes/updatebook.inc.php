<?php
if(isset($_POST['updateDetail'])){
		require ("dbh.inc.php");
		$id = $_POST['id'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$description = $_POST['description'];

		if(empty($title) || empty($author) || empty($description )){
				header("location: ../editbook.php?id=".$id."&error=emptyfields&title=".$title."&author=".$author);
				exit();
		}
		else{
				$file = $_FILES['imageURL'];
				$fileName = $_FILES['imageURL']['name'];
				$fileTmpName = $_FILES['imageURL']['tmp_name'];
				$fileSize=$_FILES['imageURL']['size'];
				$fileError = $_FILES['imageURL']['error'];
				$fileType = $_FILES['imageURL']['type'];

				$fileExt = explode('.',$fileName);

				$fileActualExt = strtolower(end($fileExt));

				$allowed = array("jpg","png","jpeg","pdf","gif");

				if(in_array($fileActualExt,$allowed)){
						if($fileError === 0){
								if($fileSize < 50000000){
										$fileNameNew = uniqid('',true).".".$fileActualExt;
										$fileDestination = '../uploads/'.$fileNameNew;
										$fileNameForDataBase = 'uploads/'.$fileNameNew;
										if(move_uploaded_file($fileTmpName,$fileDestination)){
												$sql = "UPDATE books SET title='$title', author='$author',description='$description', imageURL='$fileNameForDataBase' WHERE id=$id";
												if ($conn->query($sql) ) {
														header("location: ../bookdetail.php?id=".$id);
														exit();
												}
												else{
														echo "Error: " . $sql . "<br>" . $conn->error;
												}
										}

								}
								else{
										header("location:../index.php");
								}
						}
				}
				else{
						header("location: ../editbook.php?id=".$id."&error=filesizenotallowed&title=".$title."&author=".$author);
				}
		}
}
?>
