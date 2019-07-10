<?php
require('./dbh.inc.php');
if(isset($_POST['search'])){
		$studentId = $_POST['studentId'];
		$bookId = $_POST['bookId'];
		$sql = "select * from students where id='$studentId'";
		$result = $conn->query($sql);
		if ($result->num_rows>0){
				$student = $result->fetch_assoc();
				header("location:../borrowbook.php?status=success&studentId=".$studentId."&id=".$bookId);
		}
		else{
				header("location: ../borrowbook.php?status=nosuchid&id=".$bookId);
		}
}
if(isset($_POST['borrowBook'])){

}
?>
