<?php
use app\SiteBreaking\model\Database;

$id_client = $_POST["id"];

// Correction de la requête SQL pour utiliser correctement les paramètres préparés
$statement = Database::getInstance()->getConnexion()->prepare("SELECT * FROM Accueil WHERE id = :id");
$statement->bindValue(':id', $id_client);
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

<form action="modifierAccueil.php" method="post" enctype="multipart/form-data">
    <fieldset>
    <legend>Modifiez vos information de la page Accueil</legend>
        
    <label for="evenementRealiser">Le nombre d'événements réalisés</label>
    <input type="text" name="evenementRealiser" id="evenementRealiser" value="<?= htmlspecialchars($row["evenementRealiser"]) ?>" placeholder="Le nombre d'événements réalisés">

    <label for="titre">Le titre</label>
    <input type="text" name="titre" id="titre" value="<?= htmlspecialchars($row["titre"]) ?>" placeholder="Donner un titre">

    <label for="nom">Le nom de la photo</label>
    <input type="text" name="nom" id="nom" value="<?= htmlspecialchars($row["nom"]) ?>" placeholder="Donne un nom">

    <label for="image">Insérez vos photos de présentation</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
    <input type="file" name="image" id="image">

    <label for="text">Ecrire le texte ici</label>
    <textarea name="text" id="text" rows="4" cols="50" placeholder="Ecrire le texte ici"><?= htmlspecialchars($row["text"]) ?></textarea>

    <input type="submit" name="envoyer" id="envoyer" value="Modifier les informations">
    </fieldset>
    <input type="hidden" name="id" value="<?= $id_client ?>">
</form>

<?php
    }
    $statement->closeCursor();
} elseif (isset($_POST["evenementRealiser"]) && isset($_POST["titre"]) && isset($_POST["nom"]) && isset($_POST["text"])) {
    $evenementRealiser = $_POST["evenementRealiser"];
    $titre = $_POST["titre"];
    $nom = $_POST["nom"];
    $text = $_POST["text"];
    $id_client = $_POST["id"];

    $db = Database::getInstance()->getConnexion();
    $requete = $db->prepare("UPDATE Accueil SET evenementRealiser=:evenementRealiser, titre=:titre, nom=:nom, text=:text WHERE id=:id");

    $requete->bindValue(":evenementRealiser", $evenementRealiser);
    $requete->bindValue(':titre', $titre);
    $requete->bindValue(':nom', $nom);
    $requete->bindValue(':text', $text);
    $requete->bindValue(':id', $id_client);

    $result = $requete->execute();
    if (!$result) {
        echo "Un problème est survenu, les modifications n'ont pas été faites!";
    } else {
        echo "Vos modifications ont été bien effectuées";
        header("location:gestionClients.php");
    }
} else {
    echo "Modifier vos coordonnées";
}
?>
