<?php
    session_start();
    $_SESSION['vanestarre']['userid'] = 0;
    header('Location: ../index.php');