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
		$message = (string) $_POST['writeMessage'];
		$id = (int) 1;
		$image = '';
		
		if (strlen($message) <= 50 && strlen($message) > 0) {
			$has_image = 1;
			if(strlen($image) == 0) $has_image = 0;
			insertPost($id, $message, $has_image, $image);
		}
		else {
			echo 'error string_lenght: ' . strlen($message);
		}
	}
?>

