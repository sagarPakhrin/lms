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
				$sql = "SELECT * from admin WHERE username=? OR email=?";
				$stmt = $conn->prepare($sql);
				if(!$stmt){
						header("location: ../login.php?error=prepareError");
						exit();
				}
				else{
						$stmt->bind_param("ss",$username,$username);
						$stmt->execute();
						$result = $stmt->get_result();
						$result = $result->fetch_assoc();
						if($result){
								$pwdCheck = password_verify($password,$result['password']);
								if(!$pwdCheck){
										header("location: ../login.php?error=wrongpassword");
										exit();
								}
								else if($pwdCheck == true){
										session_start();
										$_SESSION['username']=$username;
										$_SESSION['password']=$result['password'];
										die( $_GET['next']);
										if($_GET['next']){
												header("location:".$_GET['next']);
												exit();
										}
										else{
												header("location: ../index.php?login=success");
												exit();
										}
								}
						}
						else{
								header("location: ../login.php?error=noUser");
								exit();
						}
				}
		}
}
else{
		header("location:../login.php");
}
?>
