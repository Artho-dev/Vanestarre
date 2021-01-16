<?php
    include_once 'utils.inc.php';

    page_start('Inscription', ['css/inscription.css']);

    define('error_empty_field','Veuillez remplir le champ ci-dessus');
    define('error_empty_conditions', 'Veuillez accepter les conditions d\'utilisation');
    define('error_incorrect_password', 'Veuillez entrer deux mots de passe identiques');
    define('error_username_taken', 'Nom d\'utilisateur déjà pris');
    define('error_mail_taken', 'E-mail déjà pris');
?>
    <div id="backgroundRegister">
        <header id = "registerHead">
            <div>
                <a href="index.php"><img src="assets/logo.png" alt=""></a>
                <h1 id="title">Vanéstarre</h1>
            </div>
        </header>

        <section>
            <div id="inscriptionForm" class="colum">
                <h2>Inscription</h2>
                <form action="confirm_inscription_Controller.php" method="post" name="action">
                    <div>
                        <label for="username">Identifiant d'utilisateur* :</label>
                        <input class="inputInscription" type="text" name="username" id="username"  pattern="[a-z0-9]+" title="Caractères inaccentués minuscules et chiffres seulement" value="<? if (isset($username) && $username != -1) echo $username; ?>">
                    </div>
                    <? if (isset($username) && $username == "") echo '<span class="errorInput">', error_empty_field ,'</span>';
                        elseif (isset($username) && $username == -1) echo '<span class="errorInput">', error_username_taken ,'</span>'; ?>
                    <div>
                        <label for="name">Pseudonyme* :</label>
                        <input class="inputInscription" type="text" name="publicname" id="name" value="<? if (isset($name)) echo $name; ?>">
                    </div>
                    <? if (isset($name) && $name == "") echo '<span class="errorInput">', error_empty_field ,'</span>'; ?>
                    <div>
                        <label for="mailadress">Adresse E-mail* :</label>
                        <input class="inputInscription" type="email" name="mail" id="mailadress" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<? if (isset($mail) && $mail != -1) echo $mail; ?>">
                    </div>
                    <? if (isset($mail) && $mail == "") echo '<span class="errorInput">', error_empty_field ,'</span>';
                        elseif (isset($mail) && $mail == -1) echo '<span class="errorInput">', error_mail_taken ,'</span>';?>
                    <div>
                        <label for="password">Mot de passe* :</label>
                        <input class="inputInscription" type="password" name="password" id="password" minlength="6" title="Doit contenir 6 caractères ou plus">
                    </div>
                    <? if (isset($password) && $password == "") echo '<span class="errorInput">', error_empty_field ,'</span>'; ?>
                    <div>
                        <label for="password_confirm">Confirmer mot de passe* :</label>
                        <input class="inputInscription" type="password" name="password_confirm" id="password_confirm" minlength="6">
                    </div>
                    <?  if (isset($password_confirm) && $password_confirm == "") {
                            echo '<span class="errorInput">', error_empty_field ,'</span>';
                        }
                        elseif (isset($password_confirm, $password) && $password_confirm != $password)
                            echo '<span class="errorInput">',error_incorrect_password,'</span>'; ?>
                    <div>
                        <label for="birthdate">Date de naissance* :</label>
                        <input class="inputInscription" type="date" name="birthdate" id="birthdate" value="<? if (isset($birthdate)) echo $birthdate; ?>">
                    </div>
                    <? if (isset($birthdate) && $birthdate == "") echo '<span class="errorInput">', error_empty_field ,'</span>'; ?>
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
                    <div>
                        <label for="conditions">Je confirme avoir lu et j'accepte les conditions d'utilisation inexistantes de ce réseau social:</label>
                        <input type="checkbox" name="conditions" id="conditions" value="accepted">
                    </div>
                    <?php
                        if (isset($conditions) && $conditions == 'refused')
                            echo '<span class="errorInput">', error_empty_conditions ,'</span>';
                    ?>
                    <button class="inputInscription" type="submit" name="action" value="register">S'inscrire</button>
                </form>
            </div>

        </section>
    </div>

<?php
    page_end();
?>