<?php
    include_once 'utils.inc.php';
    page_start('Confirmation d\'Inscription', ['css/style.css']);
?>

    <div id="backgroundRegister">
        <header id = registerHead>
            <div>
                <img src="assets/logoPurple.png" alt="">
                <h1 id="title"> Vanéstarre</h1>
            </div>
        </header>

        <section id="">
            <div class="colum">
                <?php
                    echo '<h2>Bravo ' . $name . '! Vous y êtes presque !</h2>';
                    echo '<h2>Un mail de confirmation vous a été envoyé à l\'adresse suivante: ' . $mail . '.</h2>';
                ?>
            </div>
        </section>
    </div>

<?php
    page_end();
?>