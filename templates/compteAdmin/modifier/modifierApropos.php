<?php
use app\SiteBreaking\model\Database;

$id_apropos = $_POST["id"];
$db = Database::getInstance()->getConnexion()->prepare("SELECT * FROM Apropos WHERE id =:id");
$db->bindValue(":id",$id_apropos);
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
<form action="aproposModifier" method="post" enctype="multipart/form-data">
    <fieldset>
    <legend><b>Modifier Apropos</b></legend>
    
    <label for="logo"><b>Modifiez votre logo:</b></label>
    <p>Le nom du fichier image: <?= htmlspecialchars($row["logo"]) ?></p>
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
    <input type="file" name="logo" id="logo">
    <br>
    <label for="image"><b>Modifiez votre image:</b></label>
    <p>Le nom du fichier image: <?= htmlspecialchars($row["images"]) ?></p>
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
    <input type="file" name="image" id="image">
     <br>   
    <label for="description"><b>description</b></label>
    <input type="text" name="description" id="description" value="<?= htmlspecialchars($row["description"]) ?>">

    <input type="submit" name="envoyer" id="envoyer" value="Modifier les informations">
    </fieldset>
    <input type="hidden" name="id" value="<?= htmlspecialchars($id_apropos) ?>">
</form>
<a href="../compteAdmin" class="btn btn-danger">Revenir sur l'interface Admin</a>
<?php
    }
    $db->closeCursor();
} 
?>