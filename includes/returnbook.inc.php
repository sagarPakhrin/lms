<?php
require("dbh.inc.php");
if(isset($_GET['returnbook'])){
		$borrowId = (int)$_GET['id'];
		$returned_date = date('Y/m/d');
		$sql = "UPDATE borrow_book set returned_date = '$returned_date' where id='$borrowId'";
		if($stmt = $conn->query($sql)){
				header("location:../borrow_list.php?status=returned");
		}
		else{
				header("location:../borrow_list.php?error=".$conn->error);
		}
}

?>
