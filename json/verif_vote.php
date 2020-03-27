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
    $obj->a_vote = verifVote($equipe,$id);
    $obj->message = "Vous avez déjà voté pour l'équipe des";
    $obj->nom = $nomE;
}



header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($obj);

