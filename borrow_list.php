<?php
include("header.php");
include("nav.php");
?>

<div class="container">
<div class="row" style="padding-top:20px;">
<?php
require("./includes/dbh.inc.php");
$sql = "select * from borrow_book";
$stmt = $conn->query($sql);
if($stmt){
		if($stmt->num_rows>0){
				while($row = $stmt->fetch_assoc()){
						$bookId = $row['bookId'];
						$studentId = $row['studentId'];
						$booksql = "select title from books where id=$bookId";
						$bookstmt = $conn->query($booksql);
						$bookTitle = $bookstmt->fetch_assoc();

						$studentsql = "select firstName,lastName from students where id=$studentId";

						$studentstmt = $conn->query($studentsql);
						$studentsData = $studentstmt->fetch_assoc();
						echo '
						<div class="col s12 z-depth-1">
								<h4>'.$bookTitle['title'].'</h4>
								<p>Borrowed By: '.$studentsData['firstName'].' '.$studentsData['lastName'].'</p>
								<p class="borrowed_date">Borrowed Date: '.$row['borrowed_date'].'</p>
								<p class="due_date">Due Date: '.$row['due_date'].'</p>
						</div>';

				}
		}
}
else{
		echo "not test";
}
?>
</div>
</div>

<?php include("fotter.php"); ?>
