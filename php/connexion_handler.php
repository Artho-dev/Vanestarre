<?php
    if (isset($_SESSION['vanestarre']['userid'],$_SESSION['vanestarre']['password']) && requestUserByIDAndPassword($_SESSION['vanestarre']['userid'],$_SESSION['vanestarre']['password'])->rowCount() != 0) {
        $sessionid = $_SESSION['vanestarre']['userid'];
    }
    else {
        $sessionid = 0;
    }