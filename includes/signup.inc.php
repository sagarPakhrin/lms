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
				header("location: ../signup.php?error=invalidusername&mail=".$mail);
				exit();
		}
		elseif($password !== $pwdRepeat){
				header("location: ../signup.php?error=passwordCheck&username=".$username."&email=".$email);
				exit();
		}
		else{
				$sql = "SELECT username from admin where username=?";
				$stmt = $conn->prepare($sql);
				/* $stmt->bind_param("s", $username); */
				$stmt->execute();
		/* 		$user = $stmt->fetch(); */

				/* if($user){ */
				/* 		header("location: ../signup.php?error=usernametaken&username="."&email=".$email); */
				/* 		exit(); */
				/* } */
				/* else{ */
				/* 		$sql = "INSERT INTO admin(username,phone,email,password) values(?,?,?,?)"; */
				/* 		$stmt = $conn->prepare($sql); */
				/* 		$hashPWd = password_hash($password,PASSWORD_DEFAULT); */
				/* 		$stmt->bind_param("ssss", $firstname,$phone,$email,$hashPWd); */
				/* 		$stmt->execute(); */
				/* 		header("location: ../signup.php?signup=success"); */
				/* 		exit(); */
				/* } */
		}

} 
else{
header("location:../signup.php");
}
