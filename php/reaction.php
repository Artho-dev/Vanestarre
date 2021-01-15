<?php
include_once '../models/Model.php';
include_once '../models/reaction_Model.php';

require_once '../header.php';

if (isset($_GET['t'],$_GET['id']) && session_id() != 0 && !empty($_GET['t']) && !empty($_GET['id'])) {
    $id = (int) $_GET['id'];
    $t = (int) $_GET['t'];
    $sessionid = session_id();

    if ($t >= 1 && $t <= 4) {
        $reaction_table = array('style', 'swag', 'cute', 'love');
        $type = $reaction_table[$t-1];

        $request = requestReaction($sessionid, $id);
        $reaction_amount = $request->rowCount();
        $reaction = $request->fetch();

        if ($reaction_amount == 1) {
            deleteReaction($sessionid, $id);
            if ($reaction['type'] != $type) {
                insertReaction($sessionid, $id, $type);
            }
        }
        else {
            insertReaction($sessionid, $id, $type);
        }
    }
    header('Location: '.$_SERVER['HTTP_REFERER']);
}
else {
    exit('Fatal Error: Request Not Found');
}