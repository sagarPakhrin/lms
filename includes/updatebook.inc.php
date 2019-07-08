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

				$sql = "UPDATE books SET title='$title', author='$author',description='$description' WHERE id=$id";

				if ($conn->query($sql) ) {
						header("location: ../bookdetail.php?id=".$id);
						exit();
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
else{
		header("location:../index.php");
}
?>
