<?php
include('header.php');
?>

<div class="container">
<div class="row">
<center>
	<h1> Register</h1> </center>
<center>
<?php
if(isset($_GET['error'])){
		if($_GET['error']=='emptyfields'){
				echo "
		     <span class='red-text text-darken-2'>Fill in all the fields</span>";
		}
		if($_GET['error']=='invalidmail'){
				echo "
		     <span class='red-text text-darken-2'>Please Enter a Valid Email</span>";
		}
		if($_GET['error']=='invalidusername'){
				echo "
		     <span class='red-text text-darken-2'>Please Enter a valid username</span>";
		}
		if($_GET['error']=='passwordCheck'){
				echo "
		     <span class='red-text text-darken-2'>Your Passwords Donot Match</span>";
		}
}
?>
</center>
<form action="includes/signup.inc.php" method="POST" class="col s12">
 <div class="row">
				<div class="input-field col s12">
					<input id="username" name="username" type="text" class="validate">
					<label for="username">Username</label>
				</div>
				<div class="input-field col s12">
					<input id="email" name="email" type="email" class="validate">
					<label for="email">E-mail</label>
				</div>
				<div class="input-field col s12">
					<input id="phone" name="phone" type="text" class="validate">
					<label for="phone">Phone Number</label>
				</div>
				<div class="input-field col s12">
					<input id="password" name="password" type="password" class="validate">
					<label for="password">Password</label>
				</div>
				<div class="input-field col s12">
					<input id="pwd-repeat" name="pwd-repeat" type="password" class="validate">
					<label for="pwd-repeat">Verify your password</label>
				</div>
				<div class="col s12 center-align">
				<input class="btn" type="submit" name="signup-submit" value="signup" style="width:100%;">
</div>
</div>
</form>
<div class="row">
	<div class="col s12 right-align">
<div style="padding-right:20px;">
<span class="">Already Registered?</span>
<a href="login.php">Login</a>
</div>
</div>
</div>
</div>
</div>

<?php
include('footer.php');
?>
