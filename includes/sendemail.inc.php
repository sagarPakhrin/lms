<?php
require("dbh.inc.php");
if(isset($_POST['sendEmail'])){
		$to = $_POST['to'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];

		if(empty($to) || empty($subject) || empty($message)){
				header("location:../email.php?error=emptyfields&to=".$to."&subject=".$subject."&message=".$message);
		}
else{
		require'./PHPMailer/PHPMailerAutoload.php';
		require '/etc/myconfigfiles/emailDetails.php';
		$mail = new PHPMailer;

		$mail->IsSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = true;
		$mail->Username = $gmail['Username'];
		$mail->Password = $gmail['Password'];
		$mail->SMTPSecure = 'tls';
		$mail->Post = 587;
		$mail->setFrom($gmail['Username'],'Sagar Lama');
		$mail->addAddress($to,'Anil Rai');
		$mail->addReplyTo($Username,'Sagar Lama');

		$mail->Subject = $subject;
		$mail->isHTML(true);
		$mail->Body = $message;

		if(!$mail->send()){
				echo 'Mailer Error: ' . $mail->ErrorInfo;
		}
		else{
				header("location:../email.php?email=sent");
				exit();

		}
}
}
?>
