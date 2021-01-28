<?php
    include_once '../models/Model.php';

    require_once '../header.php';
    require_once 'connexion_handler.php';

    if(isset($_POST['text'], $_POST['post_id'], $sessionid) && !empty($_POST['text'] && !empty($_POST['post_id']) &&  $sessionid != 0 && getRoleById($sessionid) == 'admin')){
        $message = (string) $_POST['text'];
        $post_id = (int) $_POST['post_id'];

        $post = getPost($post_id);
        $image = $post['image'] ;
        $has_image = $post['has_image'] ;

        updatePost($post_id, $message, $has_image, $image);

        header('Location: '.$_SERVER['HTTP_REFERER']);
    }