<?php
if(isset($_POST["signup-submit"])){
		require 'dbh.inc.php';

		$username = $_POST['username'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$password = $_POST['password'];
		$pwdRepeat = $_POST['pwd-repeat'];

		if(empty($username) || empty($email) || empty($email) || empty($password)|| empty($password)){
				header("location: ../signup.php?error=emptyfields&username=".$username."&email=".$email);
				exit();
		}
		elseif(!filter_var($email,FILTER_VALIDATE_EMAIL) && (!preg_match("/^[a-zA-Z0-9]*$/",$username))){
				header("location: ../signup.php?error=invalidmail");
				exit();
		}

		elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				header("location: ../signup.php?error=invalidmail&username=".$username);
				exit();
		}

		elseif(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
				header("location: ../signup.php?error=invalidusername&email=".$mail);
				exit();
		}
		elseif($password !== $pwdRepeat){
				header("location: ../signup.php?error=passwordCheck&username=".$username."&email=".$email);
				exit();
		}
		else{
				$sql = "SELECT username from admin where username='$username'";
		}
} 
else{
		header("location:../signup.php");
}
