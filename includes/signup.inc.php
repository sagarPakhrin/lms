<?php
if(isset($_POST["signup-submit"])){
		require 'dbh.inc.php';

		$username = $_POST['username'];
		$inputUsername = $_POST['username'];
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
				$sql = "SELECT username from admin WHERE username=?";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("s",$username);
				$stmt->execute();
				$stmt->bind_result($username);
				$result = $stmt->fetch();

				if($result){
						header("location: ../signup.php?error=usernameTaken&username=".$username."&email=".$email);
						exit();
				}else{
						$sql = "INSERT into admin(username,phone,email,password) values(?,?,?,?)";
						$stmt = $conn->prepare($sql);
						if(!$stmt){
								header("location: ../signup.php?error=sqlerror");
								exit();
						}
						else{
								$hashPassword = password_hash($password,PASSWORD_DEFAULT);
								/* $stmt->bind_param("ssss",$username,$phone,$email,$hashPassword); */
								$res = $conn->query("INSERT INTO admin(username,phone,email,password) values('$inputUsername','$phone','$email','$hashPassword')");
								if($res){
										header("location: ../login.php?signup=success");
										exit();
								}
								else{
										header("location: ../signup.php?error=sqlerror");
										exit();
								}
						}
				}
				$stmt->close();
		}
		$conn->close();
} 
else{
		header("location:../signup.php");
}
