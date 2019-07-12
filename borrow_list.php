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
						if(!$row['returned_date']){
								$bookId = $row['bookId'];
								$studentId = $row['studentId'];
								$booksql = "select title from books where id=$bookId";
								$bookstmt = $conn->query($booksql);
								$bookTitle = $bookstmt->fetch_assoc();

								$studentsql = "select firstName,lastName from students where id=$studentId";

								$studentstmt = $conn->query($studentsql);
								$studentsData = $studentstmt->fetch_assoc();
								echo '
						<div class="col s12 z-depth-1" style="margin-top:5px;padding-top:5px;padding-bottom:5px;">
								<h4>'.$bookTitle['title'].'</h4>
								<p>Borrowed By: '.$studentsData['firstName'].' '.$studentsData['lastName'].'</p>
								<p class="borrowed_date">Borrowed Date: '.$row['borrowed_date'].'</p>
								<p class="due_date">Due Date: '.$row['due_date'].'</p>
								<p class="borrowId">Borrow Id: '.$row['id'].'</p>
								<div class="right-align">
																		<a href="./includes/returnbook.inc.php?id='.$row['id'].'" class="btn red darken-5">Returned</a>
								</div>
						</div>';

						}
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
