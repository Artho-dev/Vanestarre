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
        $has_image =(boolean) $post['has_image'];
        $image =(string) $post['image'];
        $date = $post['creation_date'];
        $yearDate= substr($date,0, 4);
        $monthDate= substr($date,5, 2);
        $dayDate= substr($date,8, 2);

        $id = $post['postid'];
        $message = $post['message'];

        $reaction_table = array('style', 'swag', 'cute', 'love');

        echo '<div class="post" id="post',$id,'">
                <div class="postHeader">
                    <img src="assets/picture.PNG" class="profilPicture" alt="">
                    <section class="user">
                        <h2 class="">' , $user_name , '</h2>
                        <p>@' , $user_username , '</p>
                    </section>
                </div>';

        if ($sessionid == 1){
            echo '<img class="postDots" onclick="displayOption(this)" src="https://img.icons8.com/material-rounded/24/000000/menu-2.png" alt=""/>  
                  <div class="interactionBox">
                        <span onclick="supprPost(this)" class="supprPost">Supprimer</span>
                        <span onclick="modifPost(this)" class="modifPost">Modifier</span>
                  </div>';
        }
        echo  '<p>' , $message , '</p>';
        if ($has_image == true){
        echo '<img class="imgPost" src="'. $image .'" >';
        }

        echo '<span class="datePost">'. $dayDate. '/'.$monthDate . '/' . $yearDate .'</span>
              <div class="postFooter">';


        for ($i=0; $i < count($reaction_table); ++$i) {
            $t = $i+1;
            $reactionHref = '';
            $reactionAttribut = 'id="'.$t.'_'. $id .'" onclick="reaction(this)"';
            if ($sessionid == 0) {
                $reactionAttribut= '';
                $reactionHref = 'href="inscription.php"';
            }
            echo '<a ', $reactionHref ,'><img class="postEmoji" ', $reactionAttribut , ' src="assets/reaction_' , checkEmoji($sessionid, $id, $reaction_table[$i]) , '.png" alt=""></a>';
            echo '<span class="emojiCount">' , getReactionAmount($id, $reaction_table[$i]) ,'</span>';
        }
        echo '</div></div>';
    }
}

require_once 'php/connexion_handler.php';

if (isset($_GET['tag']) && !empty($_GET['tag'])) {
    $posts = getPostsByTag($_GET['tag'],1, 2);
}
else {
    $posts = getPosts(1, 10);
}

if (isset ($sessionid) && $sessionid == 0) {
    require_once 'unlogged.php';
}
elseif (isset ($sessionid)) {
    require_once 'logged.php';
}
