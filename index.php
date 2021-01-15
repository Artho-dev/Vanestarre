<?php

include_once 'models/Model.php';
include_once 'models/reaction_Model.php';

require_once 'header.php';

function checkEmoji($sessionid, $postid, $type) {
    if (getReactionAmountByMemberAndType($sessionid, $postid, $type) == 1) {
        echo $type , 'Color';
    }
    else {
        echo $type;
    }
}

function getReactionAmount($postid, $type) {
    return requestReactionsFromPostAndType($postid, $type)->rowCount();
}

function displayPosts($posts, $sessionid) {

    while( $post = $posts->fetch() ) {

        $user = getUserById($post['senderid']);
        $user_username = $user['username'];
        $user_name = $user['name'];

        $id = $post['postid'];
        $message = $post['message'];

        $reaction_table = array('style', 'swag', 'cute', 'love');

        echo '<div class="post">
                <div class="postHeader">
                    <img src="assets/picture.PNG" class="profilPicture" alt="">
                    <section class="user">
                        <h2 class="">' , $user_name , '</h2>
                        <p>@' , $user_username , '</p>
                    </section>
                    <img class="postDots" src="https://img.icons8.com/material-rounded/24/000000/menu-2.png"/>
                </div>
                <p>' , $message , '</p>
                <div class="postFooter">';

        for ($i=0; $i < count($reaction_table); ++$i) {
            $t = $i+1;
            $href = 'href="php/reaction.php?t=' . $t . '&id=' . $id . '"';
            if (session_id() == 0) {
                $href = '';
            }
            echo '<a ', $href ,'><img class="postEmoji" src="assets/reaction_' , checkEmoji($sessionid, $id, $reaction_table[$i]) , '.png" alt=""></a>';
            echo '<span>' , getReactionAmount($id, $reaction_table[$i]) ,'</span>';
        }

        echo '</div></div>';

    }

}

$sessionid = 1;
$posts = getPosts();

require_once 'index_View.php';