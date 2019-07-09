<?php
include("header.php");
include("nav.php");
?>

<div class="container">
 <div class="row">
    <form class="col s12 m12" action="./includes/sendemail.inc.php" method="POST">
      <div class="row">
        <div class="input-field col s12 m6">
          <input id="to" type="text" class="validate">
          <label for="to">To</label>
        </div>
			</div>
				<div class="row">
        <div class="input-field col s12 m6">
          <input id="subject" type="text" class="validate">
          <label for="subject">Subject</label>
        </div>
			</div>
				<div class="row">
        <div class="input-field col s12">
					<textarea id="textarea1" class="materialize-textarea"></textarea>
          <label for="textarea1">Textarea</label>
        </div>
      </div>
<div class="right-align">
		<button class="btn waves-effect waves-light" name="sendEmail">Send<i class="material-icons right">send</i></button>
</div>
    </form>
  </div>
</div>
