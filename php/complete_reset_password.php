<?php
include_once '../models/Model.php';
session_start();

if (isset($_POST['password'], $_POST['confirm_password'])) {

    if ($_POST['password'] == $_POST['confirm_password'] && !empty($_POST['password']) && !empty($_POST['confirm_password'])) {
        $userid = $_SESSION['vanestarre']['reset_id'];
        $password = $_POST['password'];
        updatePasswordById($userid, $password);
        header('location: ../inscription.php');
    }
    else {
        header('location: reset_password.php?id='.$_SESSION['vanestarre']['reset_id'].'&code='.$_SESSION['vanestarre']['reset_code']);
    }
}
else {
    header('location: ../index.php');
}