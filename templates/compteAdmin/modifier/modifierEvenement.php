<?php
use app\SiteBreaking\model\Database;

$id_evenement = $_POST["id"];

$statement = Database::getInstance()->getConnexion()->prepare("SELECT * FROM Evenement WHERE id = :id");
$statement->bindValue(':id', $id_evenement);
$statement->execute();

if (!isset($_POST["modif"])) {
    while ($row = $statement->fetch()) {
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

<form action="evenement-modifier" method="post" enctype="multipart/form-data">
    <fieldset>
    <legend>Modifiez vos information de la page Evenement</legend>
        
    <label for="titre">Titre</label>
    <input type="text" name="titre" id="titre" value="<?= htmlspecialchars($row["titre"]) ?>">

    <label for="description">Description</label>
    <input type="text" name="description" id="description" value="<?= htmlspecialchars($row["description"]) ?>">

    <label for="date">La date exemple: 2024-08-09 08:00:00</label>
    <input type="text" name="date" id="date" value="<?= ($row["date_evenement"]) ?>">

    <label for="lieu">Le lieu</label>
    <input type="text" name="lieu" id="lieu" value="<?= htmlspecialchars($row["lieu"]) ?>">

    <label for="image">Modifiez votre image</label>
    <p>Le nom du fichier image: <?= htmlspecialchars($row["image"]) ?></p>
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
    <input type="file" name="image" id="image">

    <input type="submit" name="envoyer" id="envoyer" value="Modifier les informations">
    </fieldset>
    <input type="hidden" name="id" value="<?= htmlspecialchars($id_evenement) ?>">
</form>
<a href="../compteAdmin" class="btn btn-danger">Revenir sur l'interface Admin</a>
<?php
    }
    $statement->closeCursor();
} 
?>
