<?php


session_start();

require_once '../DataBase/connect.php';

$obj = new stdClass();
$obj->success = false;

$id = 1;

if ((isset($_SESSION['user']))) {
    $obj->image = selectLogo($id);
    $obj->liste = grilleLogo();

}

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

echo json_encode($obj);