<?php
include_once 'utils.inc.php';

page_start('Vanéstarre', ['css/style.css']);
?>

    <div id="backgroundHome">
        <header>
            <div>
                <img src="assets/logo.png" alt="logo">
                <h1 id="title"> Vanéstarre</h1>
            </div>
            <button id="buttonHeader" type="button" class="buttonLogin">Se connecter</button>
        </header>
        <section id="home">
            <div id="slogan" class="colum">
                <h2>
                    Le plus <strong>beau</strong> des reseaux sociaux
                    <br>
                    (car c'est le mien)
                </h2>
                <img id="typo" src="assets/Typo.png" id="typo" alt="typo">
            </div>

            <div id="buttonHome" class="colum">
                <button type="button" onclick=window.location.href="inscription.php" class="buttonLogin">S'inscrire</button>
                <button type="button" onclick=window.location.href="inscription.php" class="buttonRegister">Se connecter</button>
            </div>
        </section>
    </div>

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