<?php

    include_once '../models/Model.php';

	if(isset($_POST['writeMessage'], $sessionid) && !empty($_POST['writeMessage'] &&  $sessionid != 0){
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
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}

