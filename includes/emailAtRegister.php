<?php
function sendEmail($receiver){
		$to = $receiver
		$subject = "Added to Librise Community";
		$message = "Welcom to Librise Library";

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
		$mail->addAddress($to,'Sagar Lama');
		$mail->addReplyTo($Username,'Sagar Lama');

		$mail->Subject = $subject;
		$mail->isHTML(true);
		$mail->Body = $message;

		if(!$mail->send()){
				echo 'Mailer Error: ' . $mail->ErrorInfo;
		}
		else{
				return true;

		}
}
?>
