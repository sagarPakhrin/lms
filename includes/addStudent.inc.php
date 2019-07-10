<?php
require("dbh.inc.php");
/* if(isset($_SESSION['username'])=='admin'){ */
		if(isset($_GET['addStudent']))
		{
				echo $_SESSION['username'];
		}
		else
		{
				echo "not logged in";
		}
/* } */
/* else{ */
/* 		header("location:../login.php?next=addStudent"); */
/* } */
?>
