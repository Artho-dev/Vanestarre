<?php
include_once 'utils.inc.php';
include_once 'models/Model.php';

page_start('Vanéstarre', ['css/home.css']);

?>

    <header>
        <div>
            <img class="logoHeader" src="assets/logoPurple.png" alt="logo">
            <h1 id="title"> Vanéstarre</h1>
        </div>
        <div id="backgroundSearch">
            <form action="index.php" method="get">
                <input name="tag" placeholder="Recherche par Tag" id="searchBar" type="search">
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
                <?php
                    $user = getUserById($sessionid);
                    $user_username = $user['name'];
                    echo $user_username;
                ?>
            </span>
            <a href="profil.php"><img class="iconPicture" src="profil_picture/profile-user.png" alt=""></a>
        </div>
    </header>

    <div id="sectionPost">
        <div id="newPost">
            <?php
                if (getRoleById($sessionid) == 'admin') {

                    echo '<form action="php/post_message.php" method="post" id="writeMessageBox" enctype="multipart/form-data" >
	                            <input type="text" placeholder="Ecrire un message ..." onchange="countChar()" name="writeMessage" id="writeMessage" maxlength="50" value="" >
	                            <div id="writeButtonBox">
	                                <div id="fileBox">
	                                    <input onchange="changeFilePath()" type="file" name="image_file" id="fileChooser" accept="image/png, image/jpeg, image/gif">
	                                    <label id="labelFile" for="fileChooser">Choisir une image</label>
	                                    <span id="filePath" >Aucun fichier sélectionée</span>
                                    </div>
	                             
	                                <div>   
	                                    <span id="countCharMessage">0/50</span>
		                                <button type="submit" class="sendButton" name="submit" id="sendButton">Envoyer</button>
	                                </div>      
                                </div>';
                    if (isset($errorMsg) && errorMsg != null) echo '<span class="errorInput">', $errorMsg, '</span>';
                    echo  '</form> ';

				}
            ?>



            <?php displayPosts($posts, $sessionid) ?>

        </div>


    </div>

    <footer>
        <div>
            <?php   if ($page > 1) {
                        $next_page = $page - 1;
                        $href = 'index.php?page='.$next_page;
                        if (isset($tag) && !empty($tag)) {
                            $href .= '&tag='.$tag;
                        }
                        echo '<button id="leftArrow"><a href="' , $href , '"><img src="assets/arrow.png" alt=""></a></button>';
                    } ?>
            <span id="page" >Page <?php echo $page , ' sur ' , $totalPages; ?></span>
            <?php   if ($page < $totalPages) {
                        $next_page = $page + 1;
                        $href = 'index.php?page='.$next_page;
                        if (isset($tag) && !empty($tag)) {
                            $href .= '&tag='.$tag;
                        }
                        echo '<button id="righArrow"><a href="' , $href , '"><img src="assets/arrow.png" alt=""></a></button>';
                    } ?>
        </div>
    </footer>

<?php
    page_end()
?>