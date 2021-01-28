<?php
include_once 'utils.inc.php';

page_start('Mot de Passe Oublié', ['css/inscription.css']);

define('error_mail', 'E-mail déjà pris');
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
                <h2 class="formTitle">Mot de passe oublié</h2>
                <form action="php/password_recovery.php" method="post" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                    <?php if (isset($invalid_mail) && $invalid_mail) echo '<span class="errorInput">',error_mail,'</span>'; ?>
                    <div>
                        <label for="mail">Adresse E-mail :</label>
                        <input class="inputInscription" type="text" name="mail" id="mail" value="">
                    </div>
                    <button class="inputInscription" type="submit" name="forgot_password" value="mail">Envoyer</button>
                </form>
            </div>
        </section>
    </div>

<?php
page_end();
?>