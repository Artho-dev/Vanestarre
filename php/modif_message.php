<?php
    include_once '../models/Model.php';

    if(isset($_POST['text'], $_POST['post_id'], $sessionid) && !empty($_POST['text'] && !empty($_POST['post_id']) &&  $sessionid != 0)){
        $message = (string) $_POST['text'];
        $post_id = (int) $_POST['post_id'];
        $image = '';

        if (strlen($message) <= 50 && strlen($message) > 0) {
            $has_image = true;
            if(strlen($image) == 0) $has_image = false;
            updatePost($post_id, $message, $has_image, $image);

        }
        else {
            echo 'error string_lenght: ' . strlen($message);
        }
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }