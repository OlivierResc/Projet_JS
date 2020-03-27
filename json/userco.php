<?php
session_start();

require_once '../DataBase/connect.php';

$userco = new stdClass();
$userco->success = false;

$username = $_SESSION['user'];
if(verifStat($username) == 0){
    $adn = 'membre';
}
else{
    $adn = 'administrateur';
}


if ((isset($_SESSION['user']))) {
    $userco->user = $username;
    $userco->mail = verifMail($username);
    $userco->admin = $adn;
    $userco->id = verifId($username);
    $userco->success = true;
}


header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($userco);