<?php
include_once '../models/Model.php';

require_once '../header.php';
require_once 'connexion_handler.php';

if(isset($_POST['post_id'], $sessionid) && !empty($_POST['post_id']) &&  $sessionid != 0 && getRoleById($sessionid) == 'admin'){
    $postId = (int)$_POST['post_id'];
    $post = getPost($postId);

    if ($post['has_image'] == true ){
        unlink("../" . $post['image'] );
    }

    deletePost($postId);
    header('Location: '.$_SERVER['HTTP_REFERER']);
}