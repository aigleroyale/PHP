<?php
require_once('cnx.php');


$sql = "SELECT client_nom, client_prenom, client_mail, client_id FROM clients ORDER BY client_id DESC";

$rs_select = $cnx->prepare($sql);
$rs_select->execute();

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PHP</title>
</head>
<body>

<h1>Liste des clients</h1>

<table>
    <thead>
        <th>Nom</th>
        <th>Prenom</th>
        <th>E-mail</th>
        <th>Actions</th>
    </thead>
    <tbody>

    <?php
    while($donnees = $rs_select -> fetch(PDO::FETCH_ASSOC)){
    ?>
    <tr>
        <td><?= $donnees['client_nom'] ?></td>
        <td><?= $donnees['client_prenom'] ?></td>
        <td><?= $donnees['client_mail'] ?></td>
        <td>
            <a href="modify.php?id=<?php echo $donnees['client_id']; ?>">Modifier le client</a>
            <a href="delete.php?id=<?php echo $donnees['client_id']; ?>">Supprimer le client</a>
    </td>




    </tr>
    <?php }?>


    </tbody>
</table>

<a href="create.php">Créer un nouveau client</a>
    
</body>
</html>