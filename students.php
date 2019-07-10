<?php include("header.php"); ?>
<?php include("nav.php"); ?>
<div class="container">
<div class="row">
<?php
require("./includes/dbh.inc.php");
$sql = "select * from students";

$result = $conn->query($sql);
if ($result->num_rows>0){
			echo '	<table>';
      echo '  <thead>';
      echo '    <tr>';
      echo '        <th>First Name</th>';
      echo '        <th>Last Name</th>';
      echo '        <th>Email</th>';
      echo '        <th>Phone Number</th>';
      echo '    </tr>';
      echo '  </thead>';
			echo '<tbody>';
		while($row = $result->fetch_assoc()){
			echo '<tr>';
				echo '<td>'.$row['firstName'].'</td>';
				echo '<td>'.$row['lastName'].'</td>';
				echo '<td>'.$row['email'].'</td>';
				echo '<td>'.$row['phoneNumber'].'</td>';
			echo '</tr>';
		}
		echo '</tbody>';
		echo "</table>";
}
?>
</div>
</div>

<?php include("footer.php"); ?>
