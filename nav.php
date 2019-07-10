<nav class="purple darken-5">
		<div class="container">
				<div class="nav-wrapper">
					<a href="index.php" class="brand-logo">Librise</a>
					<ul id="nav-mobile" class="right hide-on-med-and-down">
<?php
echo "<li><a href='index.php'>Home</a></li>";
if(isset($_SESSION['username'])){
		echo " <li><a href='addBook.php'>Add a Book</a></li> ";
		echo " <li><a href='addStudent.php'>Add Student</a></li> ";
		echo " <li><a href='students.php'>View students</a></li> ";
		echo " <li><a href='email.php'>Send Email</a></li> ";
		echo " <li><a href='./includes/logout.inc.php?log_user_out'>Logout</a></li> ";
}
else{
		echo "<li><a href='login.php'>Login</a></li>";
}
?>
					</ul>
				</div>
		</div>
</nav>
