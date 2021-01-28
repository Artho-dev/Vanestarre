<?php
include_once 'utils.inc.php';
page_start('Vanéstarre', ['css/home.css']);

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
    <form method="post" action="php/modif_profile.php" id="profil">
        <div id="profilDelimiter">
            <img class="editProfil" onclick="editProfil(this)" src="assets/editPurple.png" alt=""/>
            <img <?php if (isset($profil_picture) && !empty($profil_picture)){
                        echo 'src="'.$profil_picture.'" ';
                } else{
                        echo  ' src="assets/picture.PNG" ';
                 } ?> id="profilPictureChange" alt="">
            <input onchange="changeFilePath()" type="file" name="image_file" id="fileChooser" accept="image/png, image/jpeg, image/gif">
            <label style="display: none;"  id="labelFile" for="fileChooser">Choisir une image</label>
            <span style="display: none;" id="filePath" >Aucun fichier sélectionée</span>
            <p id="bio" class="infoUser">
                <?php if (isset($profil_bio) && !empty($profil_bio)){
                            echo $profil_bio;
                        }
                        else{
                            echo 'Bio ...';
                        } ?>
            </p>
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
            <p class="nameInfo">Role : </p>
            <span id="roleProfil" class="infoUser"><?php echo $roles[$user_role] ?></span>
        </div>
    </form>

    <?php
        if (getRoleById($sessionid) == 'admin'){
            echo '<form method="post" action="edit_configuration.php" id="config">
                      <div id="configDelimiter">
                           <img class="editProfil" onclick="editConfig(this)" src="assets/edit.png" alt=""/>
                            <h2 id="titleConfig">Configuration</h2>
                      </div>
                      <div id="configInfo">
                        <p class="nameInfo">Nombre de post par page : </p>
                        <span id="nbrPageConfig" class="infoConfig">'. $config_page .'</span>
                        <p class="nameInfo">Alerte bitcoin au bout de : </p>
                        <span>min : </span>
                        <span id="minAlert" class="infoConfig">'. $config_min_reaction .'</span>
                        <span>max : </span>
                        <span id="maxAlert" class="infoConfig">'.$config_max_reaction . '</span>
                     </div>
                  </form>';
        }
    ?>



</div>



<?php
page_end()
?>