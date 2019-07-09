<?php
require("dbh.inc.php");
if(isset($_POST['sendEmail'])){
		$to = $_POST['to'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];

		if(empty($to) || empty($subject) || empty($message)){
				header("location:../email.php?error=emptyfields&to=".$to."&subject=".$subject."&message=".$message);
		}
}
else{
		require'./PHPMailer/PHPMailerAutoload.php';
		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->
}
?>
