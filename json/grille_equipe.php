<?php

session_start();

require_once '../DataBase/connect.php';

$obj = new stdClass();
$obj = false;

//$_SESSION['equipe_select'] = $_POST["idE"];
$equipe = $_SESSION['equipe_select'];

$nomE = nomE($equipe);
$villeE = villeE($equipe);
$classementE = classementE($equipe);
$voteE = voteE($equipe);
//$voteAct = changeVote($equipe, $voteE);


if ((isset($_SESSION['user']))){
    $obj->id = $equipe;
    $obj->success = true;
    $obj->nom = $nomE;
    $obj->ville = $villeE;
    $obj->classement = $classementE;
    $obj->vote = $voteE;
    //$obj->voter = $voteAct;
}



header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($obj);
