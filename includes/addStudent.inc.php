<?php
require("dbh.inc.php");
require("emailAtRegister.php");
if(isset($_POST['addStudent']))
{
		$f_name = $_POST['f_name'];
		$l_name = $_POST['l_name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$secretKey = '6LfkDrYUAAAAABc_x14_bWpaVGxSu8CZEZbmQb4N';
		$responseKey = $_POST['g-recaptcha-response'];
		$remoteip = $_SERVER['REMOTE_ADDRESS'];
		/* die(var_dump($responseKey)); */

		$url = 'https://google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$responseKey.'&remoteip='.$remoteip;

		$response = file_get_contents($url);
		$response = json_decode($response,true);

		/* die(var_dump($response['success'])); */
		if($response['success']) {

				if(empty($f_name) || empty($l_name) || empty($email) || empty($phone)){
						header("location:../addStudent.php?emptyFields&f_name=".$f_name."&l_name=".$l_name."&email=".$email."&phone=".$phone);
				}
				elseif(!filter_var($email,FILTER_VALIDATE_EMAIL) && (!preg_match("/^[a-zA-Z0-9]*$/",$username))){
						header("location: ../addStudent.php?error=invalidmail");
						exit();
				}
				else{
						$sql = "INSERT into students(firstName,lastName,email,phoneNumber) values('$f_name','$l_name','$email','$phone')";
						$stmt = $conn->prepare($sql);
						if(!$stmt){
								header("location: ../addStudent.php?error=sqlerror");
								exit();
						}
						else{
								$res = $conn->query($sql);
								if($res){
										/* if(sendEmail($email)){ */
										/* 		header("location: ../students.php?registered&emailSent=1"); */
										/* 		exit(); */
										/* } */
										header("location: ../students.php?registered&emailSent=1");
								}
								else{
										header("location: ../addStudent.php?error=sqlerror");
										exit();
								}
						}
				}
		}
		else{
				header("location: ../addStudent.php?error=fillCaptcha");
		}
}
/* } */
/* else{ */
/* 		header("location:../addStudent.php?next=addStudent"); */
/* } */
?>
