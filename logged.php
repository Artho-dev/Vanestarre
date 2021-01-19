<?php
include_once 'utils.inc.php';

page_start('Vanéstarre', ['css/home.css']);

?>

    <header>
        <div>
            <img class="logoHeader" src="assets/logoPurple.png" alt="logo">
            <h1 id="title"> Vanéstarre</h1>
        </div>
        <div id="iconNav">
            <img class="iconHeader" id="parameterIcon" src="assets/parameter.png" alt="">
            <img class="iconHeader" id="notificationIcon" src="assets/notification.png" alt="">
            <img class="iconPicture"src="assets/picture.PNG" alt="">
        </div>
    </header>

    <section id="sectionPost">
        <h2 id="sectionPostTitle">Derniers post de</h2>

        <div id="newPost">

            <?php displayPosts($posts, $sessionid) ?>

        </div>


    </section>

    <footer></footer>

<?php
page_end()
?>