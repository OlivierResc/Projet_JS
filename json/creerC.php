<?php

session_start();

require_once '../DataBase/connect.php';


$obj = new stdClass();
$obj->success = false;
$obj->message = "Echec de la création du compte !";

$found = false;

$username = $_POST['username'];
$mail = $_POST['mail'];
$password = $_POST['password'];
$Rpassword = $_POST['Rpassword'];

if ($username != null && $password != null && $Rpassword != null && $mail != null) {
    if($password == $Rpassword) {
        insertUser($username,$mail,$password);
    }
}
elseif ($username != null && $password == null && $Rpassword == null && $mail == null){
    $found = false;
}
elseif ($username != null && $password == null && $Rpassword != null && $mail != null){
    $found = false;
}
elseif ($username != null && $password != null && $Rpassword == null && $mail != null){
    $found = false;
}
else {
        $found = false;
}


if(verifLogin($username,$password)){
    $found = true;
}

//$found = true;//normalement code qui vérifie si $_POST['username'] et $_POST['password'] sont ok
if ($found == true) {
    $obj->success = true;
}

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

echo json_encode($obj);