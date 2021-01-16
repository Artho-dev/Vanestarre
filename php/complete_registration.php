<?php

echo '<h1>Inscription Terminée</h1>';

if(isset($_GET['id'], $_GET['code']) && !empty($_GET['id']) && !empty($_GET['code'])) {
    $id = (int) $_GET['id'];
    $code = (int) $_GET['code'];

    
}

