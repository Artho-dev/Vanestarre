<?php

//Vérifie si le visiteur a un session ID attribué: si ce n'est pas le cas on lui attribue le session ID 0
if (session_id() == null) {
    session_id(0);
}

session_start();