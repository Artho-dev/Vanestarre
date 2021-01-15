<?php
    include 'utils.inc.php';

    page_start('Vanéstarre', ['css/style.css']);
?>

    <div id="backgroundHome">
        <header>
            <div>
                <img src="assets/logo.png" alt="">
                <h1 id="title"> Vanéstarre</h1>
            </div>
            <button id="buttonHeader" type="button" class="buttonLogin">Se connecter</button>
        </header>
        <section id="home">
            <div id="slogan" class="colum">
                <h2>
                    Le plus <strong>beau</strong> des réseaux-sociaux
                    <br>
                    (car c'est le mien)
                </h2>
                <img src="assets/Typo.png" id="typo" alt="">
            </div>

            <div class="colum">
                <button type="button" onclick=window.location.href='inscription.php' class="buttonLogin">S'inscrire</button>
                <button type="button" class="buttonRegister">Se connecter</button>
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