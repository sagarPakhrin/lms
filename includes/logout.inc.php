<?php
if(isset($_GET['log_user_out'])){
		session_start();
		session_unset();
		session_destroy();
		header("location: ../index.php");
		exit();
}
else{
		header("location: ../index.php");
		exit();
}
?>
