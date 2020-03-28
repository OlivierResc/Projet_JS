<?php

session_start();

require_once '../DataBase/connect.php';

$obj = new stdClass();
$obj = false;

$_SESSION['id'] = verifId($_SESSION['user']);
//$equipe = 16;

if ((isset($_SESSION['user']))){
    $obj->grille = grilleEquipe();
    $obj->ids = grilleId();
    $obj->lid = listeId();
    $obj->success = true;
    $_SESSION['equipe_select'] = $_POST["idE"];
    $obj->liste = grilleLogo();
}

//$obj->grille = array("Mavericks", "Denver", "Lakers", "Olympiakos");
/*$obj->detail = array(
    "Mavericks" => 'Doncic','Porzingis',
    "Denver" => 'Jokic','MPJ'
);*/
//$obj->success = true;


header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($obj);


