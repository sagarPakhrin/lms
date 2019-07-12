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
if(isset($_POST['submitBorrow'])){
		session_start();
		$bookId = $_SESSION['bookId'];
		$studentId = $_SESSION['studentId'];
		$dueDate = $_POST['dueDate'];
		$borrowed_date = date('Y/m/d');
		if(!empty($dueDate)){
				$sql = "insert into borrow_book(bookId,studentId,due_date,borrowed_date) values($bookId,$studentId,'$dueDate','$borrowed_date')";
				echo $sql;
				$result = $conn->query($sql);
				if($result){
						header("location:../index.php");
				}
		}
		else{
				header("location:../borrowbook.php?status=success&studentId=".$studentId."&id=".$bookId);
		}
}
?>
