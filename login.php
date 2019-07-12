<?php include("header.php"); 
?>
<center>
	<h1>Login</h1>
</center>

<div class="row">
<div class="container">
		<form class="col s12" method="POST" action="./includes/login.inc.php">
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
		<input class="btn" type="submit" name="login-submit" value="login">
		</div>
		</div>
		</form>
		</div>
</div>

<?php include("footer.php"); ?>
