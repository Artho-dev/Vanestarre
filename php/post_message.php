<form method="post" id="writeMessageBox">
	<input type="text" placeholder="Ecrire un message ..." onchange="countChar()" name="writeMessage" id="writeMessage" maxlength="50" value="" >
	<div id="writeButtonBox">
		<span id="countCharMessage">0/50</span>
		<button class="sendButton" name="sendMessage" id="sendButton">Envoyer</button>
    </div>
</form>

<?php
	include_once '../models/Model.php';
	if(isset($_POST['sendMessage'])){
		$message = $_POST['writeMessage'];
		if (strlen($message) <= 50 && strlen($message) > 0) {
			insertPost("1", $message);
		}
		else {
			echo 'error string_lenght: ' . strlen($message);
		}
	}
?>

