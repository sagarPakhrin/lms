<?php
include("header.php");
include("nav.php");
?>
<div class="container">
		<div class="row">
				<div class="col s12 m6">
<?php
if(isset($_GET['borrowBook']) ||$_GET['status']=='nosuchid'||$_GET['status']=='success'){
		require("./includes/dbh.inc.php");
		$id = $_GET['id'];
		$_SESSION['bookId'] = $id;
		$sql = "select * from books where id='$id'";
		$result = $conn->query($sql);

		if($result->num_rows>0){
				$book = $result->fetch_assoc();
				echo '				<div class="card">';
				echo '				<div class="card-image">';
				echo '				<img src="./uploads/default.jpg">';
				echo '				<span class="card-title">'.$book['title'].'</span>';
				echo '				</div>';
				echo '				<div class="card-content">';
				echo '				<h3>'.$book['author'].'</h3>';
				echo '				<p>'.$book['description'].'</p>';
				echo '				</div>';
				echo '				<div class="card-action">';
				echo '				</div>';
				echo '				</div>';
		}
}
else{
		header("location:./index.php");
}
?>
				</div>
				<div class="col s12 m6 valign-wrapper">
						<div class="row">
								<form class="col s12" action="./includes/borrowBook.inc.php" method="POST">
										<div class="row">
												<div class="input-field col s6">
<div class="row">
<input placeholder="Student Id" name="studentId" type="text" class="validate" required value="<?php echo $_GET['studentId']; ?>">
</div>
<div class="row">
 <input type="text" class="datepicker">
<label for="dueDate">Due Date</label>
</div>
<div class="row">
														<input placeholder="Book Id" name="bookId" type="text" class="validate" value="<?php echo  $_SESSION['bookId'];?>" style="display:none">
</div>
												</div>
												<div class="input-field col s6">
														<div class="right-align">
																<input class="btn" type="submit" name="search" value="Search">
														</div>
												</div>
										</div>
										<div class="row">
<?php
if(isset($_GET['studentId'])){
		require("./includes/dbh.inc.php");
		$studentId = $_GET['studentId'];
		$sql = "select * from students where id='$studentId'";
		$result = $conn->query($sql);

		if($result->num_rows>0){
				$student = $result->fetch_assoc();
				echo '	  <div class="row">';
				echo '				<div class="input-field col s12">';
				echo '<h3>'.$student['firstName'].' '.$student['lastName'].'</h3>';
				echo '<p class="flow-text">'.$student['email'].'</p>';
				echo '<p class="flow-text">'.$student['phoneNumber'].'</p>';
				echo '				</div>';
				echo '			</div>';
		}
}
?>
										</div>
								</form>
						</div>
				</div>
		</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script >
const Calender = document.querySelector('.datepicker');
M.Datepicker.init(Calender,{
format:'dd/mm/yyyy',
		showClearBtn:true
});
</script>
<?php include("footer.php"); ?>
