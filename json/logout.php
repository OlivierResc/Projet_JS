<?php

/*$CONNECT_URL = 'mysql-olivier-rescigno-portofolio.alwaysdata.net ';
$LOGIN = '174440';
$PASSWORD = 'MagicOR14***';
$DBNAME = 'olivier-rescigno-portofolio_bd_js';
try {
    $Connexion = new PDO('mysql:host=' . $CONNECT_URL . ';port=3306;dbname=' . $DBNAME . ';charset=utf8;', $LOGIN, $PASSWORD);
    return $Connexion;
}
catch (PDOException $e) {
    var_dump($e);
    die();
}*/


session_start();

// Détruit toutes les variables de session
$_SESSION = array();

// Si vous voulez détruire complètement la session, effacez également
// le cookie de session.
// Note : cela détruira la session et pas seulement les données de session !
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalement, on détruit la session.
session_destroy();


header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode(true);