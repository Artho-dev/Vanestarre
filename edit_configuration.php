<?php
include_once 'models/configuration_Model.php';

if (isset($_POST['nbr_page'], $_POST['min_alert'], $_POST['max_alert']) && $_POST['submit'] == 'config') {
    $nbPage = (int) $_POST['nbr_page'];
    $min_alert = (int) $_POST['min_alert'];
    $max_alert = (int) $_POST['max_alert'];
    if (!empty($nbPage) && !empty($min_alert) && !empty($max_alert) &&
        preg_match('/[0-9]*/', $nbPage) && preg_match('/[0-9]*/', $min_alert) && preg_match('/[0-9]*/', $max_alert)) {
        updateNbPage($nbPage);
        updateMinAlert($min_alert);
        updateMaxAlert($max_alert);
    }
    header('location: profil.php');
}
else {
    die('Erreur Fatale');
}