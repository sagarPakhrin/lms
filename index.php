<?php include("header.php"); ?>
<?php include("nav.php"); ?>
<?php 
if(!isset($_SESSION['username'])){
		header("location:./login.php");
}
?>



<div class="container">
<div class="row">
<div class="container">
<div class="row">
    <form class="col s12" method="POST" action="./includes/search_book.inc.php">
      <div class="row">
        <div class="input-field col s12 m8">
          <input id="bookName" type="text" class="validate" name="bookName">
          <label for="bookName">Search Book</label>
				</div>
				<div class="input-field col s12 m4">
          <input id="searchBook" type="submit" class="btn" name="search" value="Search">
        </div>
      </div>
    </form>
  </div>
<div class="row">
<div class="col s12">
<?php 
if(isset($_GET['id'])){
require("./includes/dbh.inc.php");
$id = $_GET['id'];
$sql = "select * from books where id=".$id;
$result = $conn->query($sql);
if ($result->num_rows>0){
		while($row = $result->fetch_assoc()){
		echo '				<div class="col s12">
						<div class="card">
						<div class="card-image">
';
if($row['imageURL'])
{
		echo '<img src="'.$row['imageURL'].'">';
} else{

		echo '<img src="./uploads/default.jpg">';
}

						echo '<span class="card-title">'.$row['title'].'</span>
						</div>
						<div class="card-content">
						<p>'.$row['description'].'</p>
						</div>
						<div class="card-action">
						<a href="./bookdetail.php?id='.$row['id'].'">View Detail</a>
						</div>
						</div>
						</div>
';
		}
}

}
else if(isset($_GET['error'])){
		echo "<span>".$_GET['error']."</span>";
}
?>
</div>
</div>
</div>
</div>
<div class="divider"></div>
<div class="row">
<center>
		<h1>Books</h1>
</center>
<?php
require("./includes/dbh.inc.php");
$sql = "select * from books";
$result = $conn->query($sql);
if ($result->num_rows>0){
		while($row = $result->fetch_assoc()){
		echo '				<div class="col s12 m4">
						<div class="card">
						<div class="card-image">
';
if($row['imageURL'])
{
		echo '<img src="'.$row['imageURL'].'">';
} else{

		echo '<img src="./uploads/default.jpg">';
}

						echo '<span class="card-title">'.$row['title'].'</span>
						</div>
						<div class="card-content">
						<p>'.$row['description'].'</p>
						</div>
						<div class="card-action">
						<a href="./bookdetail.php?id='.$row['id'].'">View Detail</a>
						</div>
						</div>
						</div>
';
		}
}
?>
</div>
</div>

<?php include("footer.php"); ?>
