<?php

session_start();

require_once '../DataBase/connect.php';


$obj = new stdClass();
$obj->success = false;
$obj->message = "Les informations saisies ne correspondent pas!";

$found = false;
$id = verifId($_SESSION['user']);


$username = $_POST['username'];
$mail = $_POST['mail'];
$password = $_POST['password'];
$Rpassword = $_POST['Rpassword'];


if ($username != null && $password != null && $Rpassword != null && $mail != null) {
    if($password == $Rpassword) {
        changeUsername($username, $id);
        changePassword($password, $id);
        changeMail($mail,$id);
        $found = true;
    }
}
elseif ($username != null && $password == null && $Rpassword == null && $mail == null){
    changeU($id,$username);
    $found = true;
}
elseif ($username != null && $password == null && $Rpassword == null && $mail != null){
    changeU($id,$username);
    changeM($id,$mail);
    $found = true;
}
elseif ($username != null && $password != null && $Rpassword != null && $mail == null){
    if($password == $Rpassword) {
        changeU($id, $username);
        changeP($id, $password);
        $found = true;
    }
}
else {
    if($password == $Rpassword) {
        changeP($id, $password);
        changeM($id, $mail);
        $found = true;
    }
}

if($found == true){
    $obj->success = false;
    $_SESSION['user'] = $username;
    $obj->user = $_SESSION['user'];
    $obj->success = true;
    $obj->id = $id;
    $obj->password = $password;
}

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

echo json_encode($obj);