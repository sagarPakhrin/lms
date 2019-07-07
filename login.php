<?php include("header.php"); 
?>
<?php
require("includes/engine.php");
if(isset($_POST['login'])){
		$username = validate($_POST['username']);
		$password = md5(validate($_POST['password']));
		$stmt = $conn->prepare("select username,password from admin where username =? and password =? LIMIT 1");
		$stmt->bind_param("ss",$username,$password);
		$result = $stmt->get_result();
		if($result->num_rows>0){
		}

		$stmt->close();
}

function validate($data){
		$data = trim($data);
		$data = htmlspecialchars($data);
		$data = stripslashes($data);
		return $data;
}
?>
<center>
	<h1>Login</h1>
</center>

<div class="row">
<div class="container">
		<form class="col s12" method="POST" action="login.php">
			<div class="row">
				<div class="input-field col s12">
					<input name="username" id="username" type="text" class="validate">
					<label for="username">Username</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input name="password" id="password" type="password" class="validate">
					<label for="password">Password</label>
				</div>
			</div>
		<div class="row">
		<div class="right-align">
		<input class="btn" type="submit" name="login" value="login">
		</div>
		</div>
		</form>
		</div>
</div>

<?php include("footer.php"); ?>
