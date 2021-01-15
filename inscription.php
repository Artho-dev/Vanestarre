<?php
    include_once 'utils.inc.php';
    page_start('Inscription', ['css/style.css']);

    $empty_field = 'Champ Vide';
    $empty_conditions = 'Veuillez accepter les conditions d\'utilisation.';
    $incorrect_password = 'Mot de passe incorrect';
?>
    <div id="backgroundRegister">
        <header id = registerHead>
            <div>
                <img src="assets/logoPurple.png" alt="">
                <h1 id="title">Vanéstarre</h1>
            </div>
        </header>

        <section id="">
            <div class="colum">
                <h2>Inscription</h2>
                <form action="confirm_inscription_Controller.php" method="post" name="action" value="register">
                    <div>
                        <label for="username">Identifiant d'utilisateur* :</label>
                        <input type="text" name="username" id="username" value="<? if (isset($username)) echo $username; ?>"> <? if (isset($username) && $username == "") echo '<p>', $empty_field ,'</p>'; ?>
                    </div>
                    <div>
                        <label for="name">Pseudonyme* :</label>
                        <input type="text" name="publicname" id="name" value="<? if (isset($name)) echo $name; ?>"> <? if (isset($name) && $name == "") echo '<p>', $empty_field ,'</p>'; ?>
                    </div>
                    <div>
                        <label for="mailadress">Adresse E-mail* :</label>
                        <input type="email" name="mail" id="mailadress" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<? if (isset($mail)) echo $mail; ?>"> <? if (isset($mail) && $mail == "") echo '<p>', $empty_field ,'</p>'; ?>
                    </div>
                    <div>
                        <label for="password">Mot de passe* :</label>
                        <input type="password" name="password" id="password" minlength="6"> <? if (isset($password) && $password == "") echo '<p>', $empty_field ,'</p>'; ?>
                    </div>
                    <div>
                        <label for="password_confirm">Confirmer mot de passe* :</label>
                        <input type="password" name="password_confirm" id="password_confirm" minlength="6"> <? if (isset($password_confirm) && $password_confirm == "") { echo '<p>', $empty_field ,'</p>'; }
                                                                                                            elseif (isset($password_confirm) && isset($password) && $password_confirm != $password) echo '<p>',$incorrect_password,'</p>'; ?>
                    </div>
                    <div>
                        <label for="birthdate">Date de naissance* :</label>
                        <input type="date" name="birthdate" id="birthdate" value="<? if (isset($birthdate)) echo $birthdate; ?>"> <? if (isset($birthdate) && $birthdate == "") echo '<p>', $empty_field ,'</p>'; ?>
                    </div>
                    <div>
                        <label for="country">Pays :</label>
                        <select name="country" id="country" value="
                            <?php
                                echo '<option value="">--SELECTIONNER UN PAYS--</option>';
                                $countries = getCountries();
                                for ($i = 0; $i < count($countries); ++$i) {
                                    echo '<option value="' . $countries[$i] . '">' . $countries[$i] . '</option>';
                                } ?>
                        </select> <?php if (isset($country) && $country == "") echo '<p>', $empty_field ,'</p>'; ?>
                    </div>
                    <div>
                        <label for="conditions">Je confirme avoir lu et j'accepte les conditions d'utilisation inexistantes de ce réseau social</label>
                        <input type="checkbox" name="conditions" id="conditions" value="<? if (isset($conditions)) echo $conditions; ?>"> <?php if (empty($conditions)) echo '<p>', $empty_conditions ,'</p>'; ?>
                    </div>
                    <button type="submit" class="buttonLogin" name="action" value="register">S'inscrire</button>
                </form>
            </div>

        </section>
    </div>

<?php
    page_end();
?>