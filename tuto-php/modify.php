<?php

require_once('cnx.php');

$message = "";

if(isset($_POST['modify'])) {
    $sqlModification = "UPDATE clients SET client_prenom = ?, client_nom = ?, client_mail = ? WHERE  client_id = ?";
    $rs_modif = $cnx->prepare($sqlModification);
    $var_prenom = $_POST['client_prenom'];
    $var_nom = $_POST['client_nom'];
    $var_mail = $_POST['client_mail'];
    $var_clientID = $_POST['client_id'];
    $rs_modif->bindValue(1, $var_prenom, PDO::PARAM_STR);
    $rs_modif->bindValue(2, $var_nom, PDO::PARAM_STR);
    $rs_modif->bindValue(3, $var_mail, PDO::PARAM_STR);
    $rs_modif->bindValue(4, $var_clientID, PDO::PARAM_INT);
    $rs_modif->execute();

    $message = '<p claass="green"> Client modifié</p>';
}






if(isset($_GET['id'])) {
    $sql = "SELECT * FROM clients WHERE client_id = ?";
    $rs_select = $cnx->prepare($sql);
    $var_clientID = $_GET['id'];
    $rs_select ->bindValue(1, $var_clientID, PDO::PARAM_INT);
    $rs_select->execute();
    $donnees = $rs_select-> fetch(PDO::FETCH_ASSOC);


    $prenom = $donnees['client_prenom'];
    $nom = $donnees['client_nom'];
    $mail = $donnees['client_mail'];
}else {
    $prenom = "";
    $nom ="";
    $mail = "";
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


<h1>Modifier le client</h1>

<form action="" method="POST">
<input type="text" name="client_nom" value="<?= $nom;?>">
<br><br>
<input type="text" name="client_prenom" value="<?= $prenom;?>">
<br><br>
<input type="email" name="client_mail" value="<?= $mail;?>">
<br><br>
<input type="hidden" name="client_id" value="<?= $_GET['id'];?>">
<br><br>
<input type="submit" name="modify" value="Modifier">

</form>
<?= $message; ?>
<a href="index.php">Retour à l'accueil</a>
    
</body>
</html>