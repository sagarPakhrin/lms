<?php
require("dbh.inc.php");
if(isset($_POST['bookName'])){
		$bookName = $_POST['bookName'];
		if(empty($bookName)){
				header("location:../index.php?error=emptyfield");
		}
		else{
				$book_name_lower = strtolower($bookName);
				$sql = "select * from books where lower(title)='$book_name_lower'";
				$stmt = $conn->query($sql);
				if($stmt){
						if($stmt->num_rows>0){
								$book = $stmt->fetch_assoc();
								header("location:../index.php?id=".$book['id']);
						}
						else{
								header("location:../index.php?error=nosuchbook");
						}
				}
				else{
						header("location:../index.php?error=queryerror");
				}
		}
}
else{
		header("location:../index.php");
}
?>
