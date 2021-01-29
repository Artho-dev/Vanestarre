<?php

include_once 'models/Model.php';
include_once 'models/reaction_Model.php';
include_once 'models/configuration_Model.php';

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

function tagMessage($str) {
    $array_str = preg_split( '/[\s]/', $str);
    $new_str = '';
    for ($i = 0; $i < count($array_str); ++$i) {
        if (preg_match('/^β[^\s]+$/', $array_str[$i])) {
            $new_str .= '<a class="tag" href="index.php?tag='.strtolower(substr($array_str[$i], 2, )).'">'.$array_str[$i].'</a>';
        }
        else {
            $new_str .= $array_str[$i];
        }

        if ($i != count($array_str)-1) $new_str .= ' ';
    }

    return $new_str;
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
                    <img ';
        $profil = getProfile($user['userid']);
        $profil_picture = $profil['picture'];
        if (isset($profil_picture) && !empty($profil_picture)){
            echo 'src="'.$profil_picture.'" ';
        } else{
            echo  'src="profil_picture/profile-user.png" ';
        }
             echo 'class="profilPicture" alt="">
                    <section class="user">
                        <h2 class="">' , $user_name , '</h2>
                        <p>@' , $user_username , '</p>
                    </section>
                </div>';

        if ($sessionid != 0 && getRoleById($sessionid) == 'admin'){
            echo '<img class="postDots" onclick="displayOption(this)" src="https://img.icons8.com/material-rounded/24/000000/menu-2.png" alt=""/>  
                  <div class="interactionBox">
                        <span onclick="supprPost(this)" class="supprPost">Supprimer</span>
                        <span onclick="modifPost(this)" class="modifPost">Modifier</span>
                  </div>';
        }
        echo  '<p>' , tagMessage($message) , '</p>';
        if ($has_image == true){
        echo '<img class="imgPost" src="'. $image .'" alt="" >';
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

function getTotalPages($limit) {
    return ceil(getPostAmount()/$limit);
}

function getTotalPagesWithTag($limit, $tag) {
    return ceil(getPostAmountWithTag($tag)/$limit);
}

require_once 'php/connexion_handler.php';

$postPerPage = getNbPage();

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $page = (int) $_GET['page'];
}
else {
    $page = 1;
}

if (isset($_GET['tag']) && !empty($_GET['tag'])) {
    $posts = getPostsByTag($_GET['tag'], $page, $postPerPage);
    $tag = $_GET['tag'];
    $totalPages = getTotalPagesWithTag($postPerPage, $tag);
}
else {
    $posts = getPosts($page, $postPerPage);
    $totalPages = getTotalPages($postPerPage);
}

if ($totalPages < $page) die('Erreur: page introuvable');

if (isset ($sessionid) && $sessionid == 0) {
    require_once 'unlogged.php';
}
elseif (isset ($sessionid)) {
    require_once 'logged.php';
}
