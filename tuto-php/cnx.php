<?php


$dsn = 'mysql:host=localhost;dbname=magasins;charset=utf8';
$user = 'root';
$pass = '';

try {
    $cnx = new PDO($dsn, $user, $pass);
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
} catch(PDOException $e){
    echo 'Une erreur est survenue : '.$e->getMessage();
}

?>