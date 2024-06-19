<?php
include_once './Database.php';

$mail = $_POST['mail'];
$password = $_POST['motdepasse'];

$host = "localhost";
$user = "site_departement";
$passwd = "departement";
$base = "site_departement";

$db = new Database();
$db->connect_db($host, $user, $passwd, $base);

$res = $db->connection_user($mail, $password);

if($res){
    header('Refresh: 0; URL=../index.php');
}else{
    echo "Identifiant ou mot de passe incorrect";
}