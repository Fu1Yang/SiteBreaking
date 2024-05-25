<?php
use app\SiteBreaking\model\Database;
use app\SiteBreaking\model\Evenement;

?>
<?php require_once(__DIR__ . '/../includes/headerAccueilAdmin.php'); ?>
<h1>Page Apropos Administrateur</h1>

<form class="photoCarousel" action="/logoApropos" method="POST" enctype="multipart/form-data">
    <fieldset>
    <legend>Ajouter votre logo</legend>
        <label for="logo">Insérez vos logos</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
        <input type="file" name="logo" id="logo">
        <div class="d-grid"><input type="submit" name="envoyer" value="Insérez votre logo" class="btn btn-primary btn-block"></div>
    </fieldset>
</form>

<form class="photoCarousel" action="/photo-carousel" method="POST" enctype="multipart/form-data">
    <fieldset>
    <legend>Ajouter une Photo</legend>
        <label for="images">Insérez vos photos</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
        <input type="file" name="images" id="photos">
        <div class="d-grid"><input type="submit" name="images" value="Insérez votre photo" class="btn btn-primary btn-block"></div>
    </fieldset>
</form>


<form class="aproposAdm" action="/accueil-carte" method="POST" >
    <fieldset>
        <legend>Présentation</legend>
        
        <label for="text">Description de l'association</label>
        <textarea type="text" name="text" id="text" rows="4" cols="50" placeholder="Ecrire le text ici"></textarea>
    </fieldset>
    <input type="submit" name="envoyer" id="envoyer" value="Transmettre les information">
</form>


<form class="aproposAdm" action="/accueil-carte" method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend>Ajouter un Partenaire</legend>
        <label for="leLien">Ajouter le lien vers le site du partenaire</label>
        <input type="text" name="leLien" id="leLien" placeholder="Exemple: https://www.google.fr">

        <label for="images">Insérez le logo du partenaire</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
        <input type="file" name="images" id="photos">
    
    </fieldset>
    <input type="submit" name="envoyer" id="envoyer" value="Ajouter le partenaire">
</form>
