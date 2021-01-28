<?php
    include_once '../models/Model.php';

	require_once '../header.php';
	require_once '../php/connexion_handler.php';

	if(isset($_POST['writeMessage'], $sessionid) && !empty($_POST['writeMessage']) &&  $sessionid != 0 && getRoleById($sessionid) == 'admin'){
		$message = (string) $_POST['writeMessage'];
		$id = (int) 1;
		$image = '';
		$errorMsg = null ;
		$has_image = false;
		//print_r($_FILES['image_file']);

		if($_FILES['image_file']['error'] == 0){
		    $imageFileName = $_FILES['image_file']['name'];
            $imageTmpName = $_FILES['image_file']['tmp_name'];
            $imageExt = explode('.',$imageFileName);
            $imageExtension = strtolower(end($imageExt));
            $imageNewName = uniqid("" ,true) . "." . $imageExtension;
            $imageDestination = 'upload/'. $imageNewName;
            $imageSize = $_FILES['image_file']['size'];

            if ($imageSize > 500000 ){
                $errorMsg = "Fichier trop volumineux (500 Ko maximum)";
            }

            $image = $imageDestination;
            $has_image = true;
            move_uploaded_file($imageTmpName,"../" . $imageDestination);

        }

		if (strlen($message) <= 51 && strlen($message) > 0 &&  $errorMsg == null) {
			insertPost($id, $message, $has_image, $image);
		}
        header('Location: '.$_SERVER['HTTP_REFERER']);
	}

