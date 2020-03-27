<?php

session_start();

require_once '../DataBase/connect.php';

$obj = new stdClass();
$obj->success = false;

$equipe = $_SESSION['equipe_select'];

if ((isset($_SESSION['user']))){
    $obj->nom = nomJ($equipe);
    $obj->num = numJ($equipe);
    $obj->nat = natJ($equipe);
    $obj->success = true;
}

//$obj->success = true;


header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($obj);