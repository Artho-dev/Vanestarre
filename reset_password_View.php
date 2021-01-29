<?php
include_once 'utils.inc.php';

page_start('Réinitialisation du Mot de Passe', ['../css/inscription.css']);

define('error_password', 'Mot de passe Incorrect');
?>
    <div id="backgroundRegister">
        <header id="registerHead">
            <div>
                <a href="index.php"><img src="assets/logo.png" alt=""></a>
                <h1 id="title">Vanéstarre</h1>
            </div>
        </header>

        <section>
            <div id="connectForm" class="colum">
                <h2 class="formTitle">Réinitialisation du Mot de Passe</h2>
                <form action="complete_reset_password.php" method="post">
                    <div>
                        <label for="password">Nouveau Mot de Passe :</label>
                        <input class="inputInscription" type="password" name="password" id="password" value="" minlength="8" >
                    </div>
                    <div>
                        <label for="confirm_password">Confirmation Nouveau Mot de Passe :</label>
                        <input class="inputInscription" type="password" name="confirm_password" id="confirm_password" value="" minlength="8" >
                    </div>
                    <button class="inputInscription" type="submit" name="reset_password" value="mail">Confirmer</button>
                </form>
            </div>
        </section>
    </div>

<?php
page_end();
?>