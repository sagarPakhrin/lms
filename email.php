<?php
include("header.php");
include("nav.php");
?>

<div class="container">
 <div class="row">
    <form class="col s12 m12" action="./includes/sendemail.inc.php" method="POST">
      <div class="row">
        <div class="input-field col s12 m6">
				<input id="to" name ="to" type="text" class="validate" value="<?php echo $_GET['to']; ?>">
<label>To</label>
        </div>
			</div>
				<div class="row">
        <div class="input-field col s12 m6">
				<input id="subject" name="subject" type="text" class="validate" value="<?php echo $_GET['subject']; ?>">
          <label for="subject">Subject</label>
        </div>
			</div>
				<div class="row">
        <div class="input-field col s12">
				<textarea id="textarea1" class="materialize-textarea" name="message"><?php echo $_GET['message']; ?></textarea>
          <label for="textarea1">Textarea</label>
        </div>
<div class="right-align">
		<a class="btn waves-effect waves-light" href="index.php">Cancel</a>
		<button class="btn waves-effect waves-light" name="sendEmail">Send<i class="material-icons right">send</i></button>
</div>
      </div>
    </form>
  </div>
</div>

<?php include("footer.php"); ?>
