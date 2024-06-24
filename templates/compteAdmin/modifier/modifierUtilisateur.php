<?php

use app\SiteBreaking\model\Database;
$id_utilisateur = $_POST["id"];
$db = Database::getInstance()->getConnexion()->prepare("SELECT role, validation_email FROM Utilisateur WHERE id =:id");
$db->bindValue(":id",$id_utilisateur);
$db->execute();

if (!isset($_POST["modif"])) {
    while ($row = $db->fetch()) {
      



?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/accueilModifier.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jacquard+24&display=swap" rel="stylesheet">
  <script src="./assets/js/accueil.js"></script>
  <title>Breaking Journey</title>
  <link style="width: 30px;" rel="icon" href="../assets/logo/icon.ico" type="image/ico">
</head>
<form action="utilisateurModifier" method="post">
    <fieldset>
    <legend>Modifier Utilisateur </legend>
    
    <label for="role">Attention quand vous changez le rôle d'un utilisateur</label>
    <input type="text" name="role" id="role" value="<?= htmlspecialchars($row["role"]) ?>">
    
    <label for="validationEmail">M'email à valider 1 = valider et 0 = non valider</label>
    <input type="text" name="validationEmail" id="validationEmail" value="<?= htmlspecialchars($row["validation_email"]) ?>">

    <input type="submit" name="envoyer" id="envoyer" value="Modifier les informations">
    </fieldset>
    <input type="hidden" name="id" value="<?= htmlspecialchars($id_utilisateur) ?>">
</form>

<?php
    }
    $db->closeCursor();
} 
?>