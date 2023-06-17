<?php

require_once('cnx.php');
$message = "";

if(isset($_POST['create'])){

    if((empty($_POST['client_nom'])) || (empty($_POST['client_prenom'])) || empty($_POST['client_mail'])) {
        $message = '<p class="info">Veuillez remplir les champs </p>';
    } else {
        $sql="INSERT INTO `clients` (`client_nom`, `client_prenom`, `client_mail`) VALUES (?,?,?)";

        $rs_insert = $cnx -> prepare($sql);

        $var_nom = $_POST['client_nom'];
        $var_prenom = $_POST['client_prenom'];
        $var_mail = $_POST['client_mail'];


        $rs_insert->bindValue(1, $var_nom, PDO::PARAM_STR);
        $rs_insert->bindValue(2, $var_prenom, PDO::PARAM_STR);
        $rs_insert->bindValue(3, $var_mail, PDO::PARAM_STR);


        $rs_insert->execute();


        $message = '<p class="green">Client créé</p>';

    }


}

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<h1>Créer un nouveau client</h1>

<form action="" method="POST">
    <input type="text" name="client_nom" placeholder="Nom">
    <br><br>
    <input type="text" name="client_prenom" placeholder="Prenom">
    <br><br>
    <input type="email" name="client_mail" placeholder="E-mail">
    <br><br>
    <?= $message ;?> 
    <br><br>
    <input type="submit" name="create" value="Créer">
</form>
    
<a href="index.php">Retour à l'accueil</a>

</body>
</html>