<?php
require("dbh.inc.php");
require("emailAtRegister.php");
if(isset($_POST['addStudent']))
{
		$f_name = $_POST['f_name'];
		$l_name = $_POST['l_name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];

		if(empty($f_name) || empty($l_name) || empty($email) || empty($phone)){
				header("location:../addStudent.php?emptyFields&f_name=".$f_name."&l_name=".$l_name."&email=".$email."&phone=".$phone);
		}
		elseif(!filter_var($email,FILTER_VALIDATE_EMAIL) && (!preg_match("/^[a-zA-Z0-9]*$/",$username))){
				header("location: ../signup.php?error=invalidmail");
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
								if(sendEmail($email)){
										header("location: ../students.php?registered&emailSent=1");
										exit();
								}
						}
						else{
								header("location: ../addStudent.php?error=sqlerror");
								exit();
						}
				}
		}
}
/* } */
/* else{ */
/* 		header("location:../login.php?next=addStudent"); */
/* } */
?>
