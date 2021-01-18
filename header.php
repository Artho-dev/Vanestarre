<?php

//Vérifie si le visiteur a un session ID attribué: si ce n'est pas le cas on lui attribue le session ID 0

session_start();

//TODO supprimer le debug
/*if ($_SESSION['vanestarre']['userid'] != null) {
    echo '<h1>Session ID: ',$_SESSION['vanestarre']['userid'],'</h1>';
    echo '<h1>Password: ',$_SESSION['vanestarre']['password'],'</h1>';
}
else {
    echo '<h1>Session ID: null</h1>';
}*/
