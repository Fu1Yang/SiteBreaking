<?php
use app\SiteBreaking\model\Database;

$id_contact = $_POST["id"];
$db = Database::getInstance()->getConnexion()->prepare("SELECT * FROM Contact WHERE id =:id");
$db->bindValue(":id",$id_contact);
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
<form action="contactModifier" method="post">
    <fieldset>
    <legend>Modifier Contact </legend>
    
    <label for="adresse">adresse</label>
    <input type="text" name="adresse" id="adresse" value="<?= htmlspecialchars($row["adresse"]) ?>">
    
    <label for="numeroDeTel">numeroDeTel</label>
    <input type="text" name="numeroDeTel" id="numeroDeTel" value="<?= htmlspecialchars($row["numeroDeTel"]) ?>">

    <label for="email">email</label>
    <input type="text" name="email" id="email" value="<?= htmlspecialchars($row["email"]) ?>">

    <label for="description">description</label>
    <input type="text" name="description" id="description" value="<?= htmlspecialchars($row["description"]) ?>">

    <label for="jour">jour</label>
    <input type="text" name="jour" id="jour" value="<?= htmlspecialchars($row["jour"]) ?>">

    <label for="niveauEtStyle">niveauEtStyle</label>
    <input type="text" name="niveauEtStyle" id="niveauEtStyle" value="<?= htmlspecialchars($row["niveauEtStyle"]) ?>">

    <input type="submit" name="envoyer" id="envoyer" value="Modifier les informations">
    </fieldset>
    <input type="hidden" name="id" value="<?= htmlspecialchars($id_contact) ?>">
</form>

<?php
    }
    $db->closeCursor();
} 
?>