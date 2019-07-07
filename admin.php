<?php
session_start();
if(!$_SESSION['username']){
		echo "not signed";
		header('location:login.php');
}
?>
<?php include("header.php"); ?>
<?php include("footer.php"); ?>
