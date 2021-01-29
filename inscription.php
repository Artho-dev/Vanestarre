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
                <h2 class="formTitle">Connexion</h2>
                <form action="connexion_Controller.php" method="post" name="login">
                    <?php if (isset($invalid_login) && $invalid_login) echo '<span class="errorInput">',error_login,'</span>'; ?>
                    <div>
                        <label for="login_username">Identifiant d'utilisateur :</label>
                        <input class="inputInscription" type="text" name="login_username" id="login_username" value="">
                    </div>
                    <div>
                        <label for="login_password">Mot de passe :</label>
                        <input class="inputInscription" type="password" name="login_password" id="login_password" minlength="8">
                    </div>
                    <a href="forgotten_password.php" style="color: #ecd0ff; font-size: 12px;  ">Mot de passe oublié</a>
                    <button class="inputInscription" type="submit" name="login" value="login_page">Se connecter</button>
                </form>
            </div>

            <div id="inscriptionForm" class="colum">
                <h2 class="formTitle">Inscription</h2>
                <form action="confirm_inscription_Controller.php" method="post" name="action">
                    <div>
                        <label for="username">Identifiant d'utilisateur* :</label>
                        <input class="inputInscription" type="text" name="username" id="username"  pattern="^[a-z0-9]+$" placeholder="Caractères inaccentués minuscules et chiffres seulement" value="<? if (isset($username) && $username != -1) echo $username; ?>">
                    </div>
                    <? if (isset($username) && $username == "") echo '<span class="errorInputInscription">', error_empty_field ,'</span>';
                        elseif (isset($username) && $username == -1) echo '<span class="errorInputInscription">', error_username_taken ,'</span>'; ?>
                    <div>
                        <label for="name">Pseudonyme* :</label>
                        <input class="inputInscription" type="text" name="publicname" id="name" value="">
                    </div>
                    <? if (isset($name) && $name == "") echo '<span class="errorInputInscription">', error_empty_field ,'</span>'; ?>
                    <div>
                        <label for="mailadress">Adresse E-mail* :</label>
                        <input class="inputInscription" type="email" name="mail" id="mailadress" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="">
                    </div>
                    <? if (isset($mail) && $mail == "") echo '<span class="errorInputInscription">', error_empty_field ,'</span>';
                        elseif (isset($mail) && $mail == -1) echo '<span class="errorInputInscription">', error_mail_taken ,'</span>';?>
                    <div>
                        <label for="password">Mot de passe* :</label>
                        <input class="inputInscription" type="password" name="password" id="password" minlength="8" placeholder="Doit contenir 8 caractères ou plus">
                    </div>
                    <? if (isset($password) && $password == "") echo '<span class="errorInputInscription">', error_empty_field ,'</span>'; ?>
                    <div>
                        <label for="password_confirm">Confirmer mot de passe* :</label>
                        <input class="inputInscription" type="password" name="password_confirm" id="password_confirm" minlength="8">
                    </div>
                    <?  if (isset($password_confirm) && $password_confirm == "") {
                            echo '<span class="errorInputInscription">', error_empty_field ,'</span>';
                        }
                        elseif (isset($password_confirm, $password) && $password_confirm != $password)
                            echo '<span class="errorInputInscription">',error_incorrect_password,'</span>'; ?>
                    <div>
                        <label for="birthdate">Date de naissance* :</label>
                        <input class="inputInscription" type="date" name="birthdate" id="birthdate" value="">
                    </div>
                    <? if (isset($birthdate) && $birthdate == "") echo '<span class="errorInputInscription">', error_empty_field ,'</span>'; ?>
                    <div>
                        <label for="country">Pays :</label>
                        <select class="inputInscription" name="country" id="country">
                            <?php
                            echo '<option value="">--SELECTIONNER UN PAYS--</option>';
                            $countries = getCountries();
                            for ($i = 0; $i < count($countries); ++$i) {
                                echo '<option value="' . $countries[$i] . '">' . $countries[$i] . '</option>';
                            } ?>
                        </select>
                    </div>
                    <div>
                        <label for="conditions">Je confirme avoir lu et j'accepte les conditions d'utilisation inexistantes de ce réseau social:</label>
                        <input type="checkbox" name="conditions" id="conditions" value="accepted">
                    </div>
                    <?php
                        if (isset($conditions) && $conditions == 'refused')
                            echo '<span class="errorInputInscription">', error_empty_conditions ,'</span>';
                    ?>
                    <button class="inputInscription" type="submit" name="action" value="register">S'inscrire</button>
                </form>
            </div>

        </section>
    </div>

<?php
    page_end();
?>