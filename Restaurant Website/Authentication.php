<?php
    header('Content-Type: application/json');
session_start();
    $aResult = array();

$aResult['name'] = $_Session['login_user_name'];
$aResult['email'] = $_Session['login_user_name'];
$aResult['user_type'] = $_Session['login_type'];

    echo json_encode($aResult);

?>
