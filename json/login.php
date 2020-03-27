<?php

session_start();

require_once '../DataBase/connect.php';


$obj = new stdClass();
$obj->success = false;
$obj->message = "Mauvais identifiant ou mot de passe!";
$obj->msg_new = "Veuillez-vous connecter avec vos nouveaux identifiants";

$found = false;

$username = $_POST['username'];
$password = $_POST['password'];

/*if(get('username',$username,$password)){
    $found = true;
}*/

if(verifLogin($username,$password)){
    $found = true;
}

//$found = true;//normalement code qui vérifie si $_POST['username'] et $_POST['password'] sont ok
if ($found) {
    $obj->success = true;
    $_SESSION['user'] = $username;
}

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($obj);

