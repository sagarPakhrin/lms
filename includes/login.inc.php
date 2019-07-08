<?php
if(isset($_POST['login-submit'])){
		require 'dbh.inc.php';


		$username = $_POST['username'];
		$password = $_POST['password'];
		if(empty($username) || empty($password)){
				header("location: ../login.php?error=emptyFields");
				exit();
		}
		else{
				$sql = "SELECT * admin WHERE username=? OR email=?";
				if(!$conn->prepare($sql)){
						header("location: ../login.php?error=prepareError");
						exit();
				}
				else{
						$stmt->bind_param("ss",$username,$username);
						$stmt->execute();
						$stmt->bind_result($results);
						$stmt->fetch_array(MYSQLI_ASSOC);
						if($results){
								$pwdCheck = password_verify($password,$result['password']);
								if($pwdCheck){
										header("location: ../login.php?error=wrongpassword");
										exit();
								}
								else if($pwdCheck == true){
										session_start();
										$_SESSION['username']=$username;
								}
						}
						else{
								/* header("location: ../login.php?error=noUser"); */
								exit();
						}
				}
		}
}
else{
		header("location:../login.php");
}
?>
