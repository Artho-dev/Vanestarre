<?php
if (isset($_POST['nbr_page'], $_POST['min_alert'], $_POST['max_alert']) && $_POST['submit'] == 'config') {
    $nbPage = $_POST['nbr_page'];
    $min_alert = $_POST['min_alert'];
    $max_alert = $_POST['max_alert'];
    if (!empty($nbPage) && !empty($min_alert) && !empty($max_alert) &&
        is_int($nbPage) && is_int($min_alert) && is_int($max_alert)) {
        updateNbPage($nbPage);
        updateMinAlert($min_alert);
        updateMaxAlert($max_alert);
    }
    else {
        header('location: profil.php');
    }
}
else {
    die('Erreur Fatale');
}