<?php

session_start();

require_once '../DataBase/connect.php';

$obj = new stdClass();
$obj->success = false;

$img_taille = $_FILES['userfile']['size'];
$img_type = $_FILES['userfile']['type'];
$img_nom  = $_FILES['userfile']['name'];
$img_blob = file_get_contents ($_FILES['userfile']['tmp_name']);


if ((isset($_SESSION['user']))) {
    $obj->success = true;
    insertImg($img_nom, $img_taille, $img_type, $img_blob);
    $obj->taille = $img_taille;
    $obj->type = $img_type;
    $obj->nom = $img_nom;
    $obj->blob = $img_blob;
}

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

echo json_encode($obj);