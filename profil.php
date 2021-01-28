<?php
include_once 'utils.inc.php';
include_once 'models/Model.php';

require_once 'header.php';
require_once 'php/connexion_handler.php';

page_start('Vanéstarre', ['css/home.css']);

$user = getUserById($sessionid);
$user_name = $user['name'];
$user_username = $user['username'];
$user_mail = $user['mail'];
$user_birth = $user['birth_date'];
$user_country = $user['country'];

$config = getConfiguration();
$config_page = $config['post_per_page'];
$config_min_reaction = $config['min_reaction'];
$config_max_reaction = $config['max_reaction'];

//$profil = getProfile($sessionid);
//$profil_bio = $profil['description'];
//$profil_picture = $profil['picture'];

?>

<header>
    <div>
        <a href="index.php"><img class="logoHeader" src="assets/logoPurple.png" alt="logo"></a>
        <h1 id="title"> Vanéstarre</h1>
    </div>
    <div id="backgroundSearch">
        <form action="index.php" method="get">
            <input placeholder="Recherche par Tag" id="searchBar" type="search">
            <button id="searchButton" >
                <img src="assets/search.png" alt="">
            </button>
        </form>
    </div>
    <div id="iconNav">
        <img class="iconHeader" id="parameterIcon" src="assets/parameter.png" onclick="displayOption(this)" alt="">
        <div id="parameterOption" class="interactionBox">
            <span id="darkMode" onclick="darkModeCss()">Dark mode</span>
        </div>
        <img class="iconHeader" id="notificationIcon" src="assets/notification.png" alt="">
        <a href="php/deconnexion.php"><img class="iconHeader" id="logoutIcon" src="assets/logout.png" alt=""></a>
            <span class="userHeader">
                <?php echo $user_name; ?>
            </span>
        <img class="iconPicture" src="profil_picture/profile-user.png" alt="">
    </div>
</header>

<div id="profilBox">
    <div id="profil">
        <div class="delimiterBottom">
            <img class="editProfil" onclick="editProfil()" src="https://img.icons8.com/material-rounded/24/000000/edit--v3.png" alt=""/>
            <img src="assets/picture.PNG" class="profilPictureChange" alt="">
            <p id="bio">
                <?php if (isset($profil_bio) && !empty($profil_bio)){
                            echo $user_name;
                        }
                        else{
                            echo 'Bio ...';
                        } ?>
            </p>

            <div id="followBox">
                <span id="follow">30 <br><strong>Follow</strong></span>
            </div>
        </div>
        <div id="userInfo">
            <p class="nameInfo">Identitifiant d'utilisateur : </p>
            <span id="usernameProfil" class="infoUser"><?php echo $user_username ?></span>
            <p class="nameInfo">Pseudonyme : </p>
            <span id="nameProfil" class="infoUser"><?php echo $user_name ?></span>
            <p class="nameInfo">Adresse E-mail : </p>
            <span id="mailProfil" class="infoUser"><?php echo $user_mail ?></span>
            <p class="nameInfo">Date de naissance : </p>
            <span id="birthProfil" class="infoUser"><?php echo $user_birth ?></span>
            <p class="nameInfo">Country : </p>
            <span id="countryProfil" class="infoUser"><?php echo $user_country ?></span>
        </div>
    </div>

    <div id="config">
        <div class="delimiterBottom">
            <img class="editProfil" onclick="displayOption(this)" src="assets/edit.png" alt=""/>
            <h2 id="titleConfig">Configuration</h2>
        </div>
        <div id="configInfo">
            <p class="nameInfo">Nombre de post par page : </p>
            <span class="infoConfig"><?php echo $config_page ?></span>
            <p class="nameInfo">Alerte bitcoin au bout de : </p>
            <span class="infoConfig">min : <?php echo $config_min_reaction ?>  </span>
            <span class="infoConfig">max : <?php echo $config_max_reaction ?>  </span>
        </div>
    </div>


</div>



<?php
page_end()
?>