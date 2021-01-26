<?php
    if (isset($_SESSION['vanestarre']['userid']) && requestUserByID($_SESSION['vanestarre']['userid'])->rowCount() != 0) {
        $sessionid = $_SESSION['vanestarre']['userid'];
    }
    else {
        $sessionid = 0;
    }