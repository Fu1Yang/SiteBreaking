<?php
use app\SiteBreaking\model\Database;
use app\SiteBreaking\model\Evenement;

?>
<?php require_once(__DIR__ . '/../includes/headerAccueilAdmin.php'); ?>
<h1>Page d'accueil Administrateur</h1>

<form class="photoCarousel" action="/photo-carousel" method="POST" enctype="multipart/form-data">
    <fieldset>
    <legend>Ajouter une Photo a votre carrousel</legend>
        <label for="photos">Insérez vos photos</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
        <input type="file" name="photos" id="photos">
        <div class="d-grid"><input type="submit" name="insererPhoto" value="Insérez vos photos" class="btn btn-primary btn-block"></div>
    </fieldset>
</form>


<form class="presentation" action="/accueil-carte" method="POST" enctype="multipart/form-data">
<legend>Modifiez vos cartes de présentation</legend>
<label for="evenementRealiser">Le nombre d'événements réalisés</label>
<input type="text" name="evenementRealiser" id="evenementRealiser" placeholder="Le nombre d'événements réalisesr">

<label for="titre">Le titre</label>
<input type="text" name="titre" id="titre" placeholder="Donner un titre">

<label for="nom">Le nom de la photo</label>
<input type="text" name="nom" id="nom" placeholder="Donne un nom">


<label for="photoIdentiter">Inserez vos photos</label>
<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
<input type="file" name="photoIdentiter" id="photoIdentiter">
<div class="d-grid"><input type="submit" name="inscription" value="Inserez vos photos" class="btn btn-primary btn-block"></div>

<label for="text">Ecrire le text ici</label>
<textarea type="text" name="text" id="text" rows="4" cols="50" placeholder="Ecrire le text ici"></textarea>

<input type="submit" name="envoyer" id="envoyer" value="Transmettre les information">
</form>

