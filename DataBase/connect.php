<?php

function dbConnect()
{
    $CONNECT_URL = 'mysql-olivier-rescigno-portofolio.alwaysdata.net';
    $LOGIN = '174440';
    $PASSWORD = 'MagicOR14***';
    $DBNAME = 'olivier-rescigno-portofolio_bd_js';

    $Connexion = new PDO('mysql:host=' . $CONNECT_URL . ';port=3306;dbname=' . $DBNAME . ';charset=utf8;', $LOGIN, $PASSWORD);
    return $Connexion;
}


function verifLogin($user, $pass)
{
    $db = dbConnect();
    $result = $db->prepare('SELECT password, id_user , admin, username FROM user WHERE username = :username AND password = :password;');
    $result->bindParam(':username', $user);
    $result->bindParam(':password', $pass);
    $result->execute();
    $res=$result->fetch();
    if ($res != false) {
        //return array('ok', 'id_user' => $result['id_user'], 'admin' => $result['admin'], 'username' => $result['username']);
        return true;
    }
}

function verifStat($user){
    $db = dbConnect();
    $result = $db->prepare('SELECT admin, username FROM user WHERE username = :username;');
    $result->bindParam(':username', $user);
    $result->execute();
    $res=$result->fetch();
    {
        return $res['admin'];
    }
}

function verifId($user){
    $db = dbConnect();
    $result = $db->prepare('SELECT id_user, username FROM user WHERE username = :username;');
    $result->bindParam(':username', $user);
    $result->execute();
    $res=$result->fetch();
    {
        return $res['id_user'];
    }
}

function verifMail($user){
    $db = dbConnect();
    $result = $db->prepare('SELECT email, username FROM user WHERE username = :username;');
    $result->bindParam(':username', $user);
    $result->execute();
    $res=$result->fetch();
    {
        return $res['email'];
    }
}

function verifUsername($user){
    $db = dbConnect();
    $result = $db->prepare('SELECT username FROM user WHERE username = :username;');
    $result->bindParam(':username', $user);
    $result->execute();
    $res=$result->fetch();
    {
        return $res['username'];
    }
}

function grilleEquipe(){
    $db = dbConnect();
    $result = $db->prepare('SELECT id_equipe, nom_equipe FROM équipe;');
    //$result->bindParam(':id_equipe', $equipe);
    $result->execute();
    $res=$result->fetchAll(PDO::FETCH_COLUMN,1);
    {
        return $res;
    }
}

function grilleLogo(){
    $db = dbConnect();
    $result = $db->prepare('SELECT id_equipe, img_equipe FROM équipe;');
    //$result->bindParam(':id_equipe', $equipe);
    $result->execute();
    $res=$result->fetchAll(PDO::FETCH_COLUMN,1);
    {
        return $res;
    }
}

function grilleClass(){
    $db = dbConnect();
    $result = $db->prepare('SELECT nom_equipe FROM équipe ORDER BY nb_votes DESC;');
    //$result->bindParam(':id_equipe', $equipe);
    $result->execute();
    $res=$result->fetchAll(PDO::FETCH_COLUMN,0);
    {
        return $res;
    }
}

function grilleClassId(){
    $db = dbConnect();
    $result = $db->prepare('SELECT nom_equipe FROM équipe ORDER BY id_equipe;');
    //$result->bindParam(':id_equipe', $equipe);
    $result->execute();
    $res=$result->fetchAll(PDO::FETCH_COLUMN,0);
    {
        return $res;
    }
}

function grilleId(){
    $db = dbConnect();
    $result = $db->prepare('SELECT id_equipe, nom_equipe FROM équipe;');
    //$result->bindParam(':id_equipe', $equipe);
    $result->execute();
    $res=$result->fetchAll(PDO::FETCH_COLUMN,0);
    {
        return $res;
    }
}

function listeId(){
    $db = dbConnect();
    $result = $db->prepare('SELECT id_equipe, img_equipe FROM équipe;');
    //$result->bindParam(':id_equipe', $equipe);
    $result->execute();
    $res=$result->fetchAll(PDO::FETCH_COLUMN,0);
    {
        return $res;
    }
}

function nomE($id){
    $db = dbConnect();
    $result = $db->prepare('SELECT id_equipe, nom_equipe FROM équipe WHERE id_equipe = :id_equipe;');
    $result->bindParam(':id_equipe', $id);
    $result->execute();
    $res=$result->fetch();
    {
        return $res['nom_equipe'];
    }
}

function villeE($id){
    $db = dbConnect();
    $result = $db->prepare('SELECT id_equipe, ville FROM équipe WHERE id_equipe = :id_equipe;');
    $result->bindParam(':id_equipe', $id);
    $result->execute();
    $res=$result->fetch();
    {
        return $res['ville'];
    }
}

function classementE($id){
    $db = dbConnect();
    $result = $db->prepare('SELECT classement FROM équipe WHERE id_equipe = :id_equipe;');
    $result->bindParam(':id_equipe', $id);
    $result->execute();
    $res=$result->fetch();
    {
        return $res['classement'];
    }
}

function voteE($id){
    $db = dbConnect();
    $result = $db->prepare('SELECT id_equipe, nb_votes FROM équipe WHERE id_equipe = :id_equipe;');
    $result->bindParam(':id_equipe', $id);
    $result->execute();
    $res=$result->fetch();
    {
        return $res['nb_votes'];
    }
}

function nomJ($equipe){
    $db = dbConnect();
    $result = $db->prepare('SELECT id_equipe, nom_joueur FROM joueur WHERE id_equipe = :id_equipe;');
    $result->bindParam(':id_equipe', $equipe);
    $result->execute();
    //$res=$result->fetch();
    $res=$result->fetchAll(PDO::FETCH_COLUMN,1);
    {
        return $res;
    }
}

function numJ($equipe){
    $db = dbConnect();
    $result = $db->prepare('SELECT id_equipe, numero FROM joueur WHERE id_equipe = :id_equipe;');
    $result->bindParam(':id_equipe', $equipe);
    $result->execute();
    $res=$result->fetchAll(PDO::FETCH_COLUMN,1);
    {
        return $res;
    }
}

function natJ($equipe){
    $db = dbConnect();
    $result = $db->prepare('SELECT id_equipe, nationalite FROM joueur WHERE id_equipe = :id_equipe;');
    $result->bindParam(':id_equipe', $equipe);
    $result->execute();
    $res=$result->fetchAll(PDO::FETCH_COLUMN,1);
    {
        return $res;
    }
}

function changeUsername($name,$id)
{
    $db = dbConnect();
    $result = $db->prepare('UPDATE user SET username = :username WHERE id_user = :id_user;');
    $result->bindParam(':username',$name);
    $result->bindParam(':id_user', $id);
    $result->execute();
    $res=$result->fetch();
    {
        $res['username'];
    }
}

function changeMail($mail,$id)
{
    $db = dbConnect();
    $result = $db->prepare('UPDATE user SET email = :email WHERE id_user = :id_user;');
    $result->bindParam(':id_user',$id);
    $result->bindParam(':email',$mail);
    $result->execute();
    $res=$result->fetch();
    {
        $res['email'];
    }
}

function changePassword($password,$id)
{
    $db = dbConnect();
    $result = $db->prepare('UPDATE user SET password = :password WHERE id_user = :id_user;');
    $result->bindParam(':password',$password);
    $result->bindParam(':id_user',$id);
    $result->execute();
    $res=$result->fetch();
    {
        $res['password'];
    }
}

function changeU($id,$name)
{
    $db = dbConnect();
    $result = $db->prepare('UPDATE user SET username = :username WHERE id_user = :id_user;');
    $result->bindParam(':id_user',$id);
    $result->bindParam(':username',$name);
    $result->execute();
}

function changeM($id,$mail)
{
    $db = dbConnect();
    $result = $db->prepare('UPDATE user SET email = :email WHERE id_user = :id_user;');
    $result->bindParam(':id_user',$id);
    $result->bindParam(':email',$mail);
    $result->execute();
}

function changeP($id,$pass)
{
    $db = dbConnect();
    $result = $db->prepare('UPDATE user SET password = :password WHERE id_user = :id_user;');
    $result->bindParam(':id_user',$id);
    $result->bindParam(':password',$pass);
    $result->execute();
}

function changeVote($id, $nbV)
{
    $db = dbConnect();
    $result = $db->prepare('UPDATE équipe SET nb_votes = :nb_votes + 1 WHERE id_equipe = :id_equipe;');
    $result->bindParam(':id_equipe',$id);
    $result->bindParam(':nb_votes',$nbV);
    $result->execute();
    $re = $db->prepare('SELECT id_equipe, nb_votes FROM équipe WHERE id_equipe = :id_equipe;');
    $re->bindParam(':id_equipe', $id);
    $re->execute();
    $res=$re->fetch();
    {
        return $res['nb_votes'];
    }
}

function verifVote($equipe,$idU)
{
    $db = dbConnect();
    $result = $db->prepare('SELECT id_user, id_equipe FROM vote WHERE id_equipe = :id_equipe AND id_user = :id_user;');
    $result->bindParam(':id_equipe',$equipe);
    $result->bindParam(':id_user',$idU);
    $result->execute();
    $res=$result->fetch();
    if($res != false)
    {
        return true;
    }
}

function InsertVote($equipe, $idU)
{
    $db = dbConnect();
    $result = $db->prepare('INSERT INTO vote (id_equipe,id_user) VALUES (:id_equipe, :id_user);');
    $result->bindParam(':id_equipe',$equipe);
    $result->bindParam(':id_user',$idU);
    $result->execute();
}

function insertImg($img_nom,$img_taille,$img_type,$img_blob)
{
    $db = dbConnect();
    $result = $db->prepare('INSERT INTO images (img_nom, img_type, img_blob, img_taille) VALUES (:img_nom, :img_type, :img_blob,:img_taille);');
    $result->bindParam(':img_nom', $img_nom);
    $result->bindParam(':img_taille', $img_taille);
    $result->bindParam(':img_type', $img_type);
    $result->bindParam(':img_blob', $img_blob);
    $result->execute();
}

function selectImg($id){
    $db = dbConnect();
    $result = $db->prepare('SELECT img_blob FROM images WHERE img_id = :img_id');
    $result->bindParam(':img_id', $id);
    $result->execute();
    $res=$result->fetch();
    {
        return $res['img_blob'];
    }
}

function selectLogo ($id){
    $db = dbConnect();
    $result = $db->prepare('SELECT img_equipe FROM équipe WHERE id_equipe = :id_equipe;');
    $result->bindParam(':id_equipe', $id);
    $result->execute();
    $res=$result->fetch();
    {
        return $res['img_equipe'];
    }
}

function insertUser($nomU,$mailU,$passwordU){
    $db = dbConnect();
    $result = $db->prepare('INSERT INTO user (username, password, email) VALUES (:username, :password, :email);');
    $result->bindParam(':username', $nomU);
    $result->bindParam(':password', $passwordU);
    $result->bindParam(':email', $mailU);
    $result->execute();
}

/*
function loadDb()
{
    return $db = new PDO('mysql:host=mysql-olivier-rescigno-portofolio.alwaysdata.net;dbname=olivier-rescigno-portofolio_bd_js', '174440', 'MagicOR14***');
}

function execRequete($query)
{
    return $this->loadDb()->query($query);
}

function get($attribut, $pseudo, $pass)
{
    $query = loadDb()->prepare('SELECT ' . $attribut . ' FROM user WHERE username= :username AND password= :password');
    $query->bindValue(':username', $pseudo, PDO::PARAM_STR);
    $query->bindValue(':password', $pass, PDO::PARAM_STR);
    $query->execute();
    foreach ($query as $row) {
        $result = $row[$attribut];
    }

    return isset($result);
}*/

/*function verifLogin($username, $password)
{
    if ($username != null && $password != null) {
        $bd = dbConnect();
        $result = $bd->prepare('SELECT password, id_user , admin, username FROM user WHERE username = :username;');
        $result->bindParam(':username',$username);
        $result->execute();
        if ($result != false) {
            $result = $result->fetch();
            {
                return array('ok', 'id_user' => $result['id_user'], 'admin' => $result['admin'], 'username' => $result['username']);
            }
        }
    }
}*/


