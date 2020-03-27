<?php

session_start();

require_once '../DataBase/connect.php';

$obj = new stdClass();
$obj->success = false;

//$_SESSION['equipe_select'] = $_POST["idE"];
$equipe = $_SESSION['equipe_select'];
$id = verifId($_SESSION['user']);



$nomE = nomE($equipe);
$villeE = villeE($equipe);
$classementE = classementE($equipe);
$voteE = voteE($equipe);

if ((isset($_SESSION['user']))){
    $obj->success = true;
    InsertVote($equipe,$id);
    $obj->vote = voteE($equipe);
    $obj->voteAct = changeVote($equipe, $voteE);
    $obj->message = "Vous venez de voter pour l'equipe des";
    $obj->nom = $nomE;
    $obj->id = $id;
}



header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($obj);

