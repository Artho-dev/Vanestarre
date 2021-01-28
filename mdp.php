<?php
include_once 'utils.inc.php';

page_start('Inscription', ['css/inscription.css']);

define('error_empty_field','Veuillez remplir le champ ci-dessus');
define('error_empty_conditions', 'Veuillez accepter les conditions d\'utilisation');
define('error_incorrect_password', 'Veuillez entrer deux mots de passe identiques');
define('error_username_taken', 'Nom d\'utilisateur déjà pris');
define('error_mail_taken', 'E-mail déjà pris');
define('error_login', 'Identifiant/Email ou mot de passe incorrect');
?>
    <div id="backgroundRegister">
        <header id = "registerHead">
            <div>
                <a href="index.php"><img src="assets/logo.png" alt=""></a>
                <h1 id="title">Vanéstarre</h1>
            </div>
        </header>

        <section>
            <div id="connectForm" class="colum">
                <h2 class="formTitle">Mot de passe oublié</h2>
                <form action="" method="post" name="mail">
                    <?php if (isset($invalid_login) && $invalid_login) echo '<span class="errorInput">',error_login,'</span>'; ?>
                    <div>
                        <label for="login_username">Adresse E-mail :</label>
                        <input class="inputInscription" type="text" name="login_username" id="login_username" value="">
                    </div>
                    <button class="inputInscription" type="submit" name="login" value="login_page">Envoyer</button>
                </form>
            </div>
        </section>
    </div>

<?php
page_end();
?>