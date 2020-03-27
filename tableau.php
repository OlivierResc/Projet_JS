<?php
session_start(); /* le tableau £_SESSION est maintenant crée + initialisé*/

// "true; DELETE from user; SELECT * from user WHERE"
$obj = new stdClass();
// PDO
// requêtes parametrées
mysql_query(
    "SELECT * FROM user ".
    'WHERE username=%s '.
    'AND password=%s ',
    array($_POST['username'], $_POST['password'])
);

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($obj);

