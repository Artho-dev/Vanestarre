<?php
    if (isset($_SESSION['vanestarre']['userid']) && $_SESSION['vanestarre']['userid'] != 0 && requestUserByID($_SESSION['vanestarre']['userid'])->rowCount() != 0) {
        $sessionid = $_SESSION['vanestarre']['userid'];
    }
    else {
        $sessionid = 0;
    }