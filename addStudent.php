<?php
include('header.php');
include('nav.php');

if(!isset($_SESSION['username'])=='admin'){
		header("location:./login.php?next=addStudent");
}


?>

<div class="container">
<div class="row">
<center>
	<h1>Add Student</h1> </center>
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
<form action="includes/addStudent.inc.php" method="POST" class="col s12">
 <div class="row">
				<div class="input-field col s12 m6">
				<input id="f_name" name="f_name" type="text" class="validate" value="<?php echo $_GET['f_name']; ?>">
					<label for="f_name">First Name</label>
				</div>
				<div class="input-field col s12 m6">
				<input id="l_name" name="l_name" type="text" class="validate" value="<?php echo $_GET['l_name']; ?>">
					<label for="l_name">Last Name</label>
				</div>
				<div class="input-field col s12">
				<input id="email" name="email" type="email" class="validate" value="<?php echo $_GET['email']; ?>">
					<label for="email">E-mail</label>
				</div>
				<div class="input-field col s12">
				<input id="phone" name="phone" type="text" class="validate" value="<?php echo $_GET['phone'] ?>">
					<label for="phone">Phone Number</label>
				</div>
				<div class="col s12 center-align">
<a href="./index.php" class="btn" style="width:50%;" >Cancel</a>
				<input class="btn" type="submit" name="addStudent" value="Add" style="width:40%;">
<div class="recaptchaContainer">
		<div class="g-recaptcha" data-sitekey="6LfkDrYUAAAAAHQLdSb-bt8a6IOutKN0l9Dhxw7N"></div>
</div>
</div>
</div>
</form>
</div>
</div>
<script type="text/javascript" src='https://google.com/recaptcha/api.js'></script>
<?php
include('footer.php');
?>
