<?php
use app\SiteBreaking\model\Database;
use app\SiteBreaking\model\Evenement;

?>
<?php require_once(__DIR__ . '/../includes/headerAccueilAdmin.php'); ?>
<h1>Page Apropos Administrateur</h1>

<form class="aproposAdm" action="/aproposPage" method="POST" enctype="multipart/form-data">
    <fieldset>
    <legend>Page Apropos</legend>

        <label for="logo">Insérez un logo</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
        <input type="file" name="logo" id="logo">

        <label for="images">Insérez une photo</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
        <input type="file" name="images" id="images">

        
        <label for="description">Description de l'association</label>
        <textarea type="text" name="description" id="description" rows="15" cols="50" placeholder="Ecrire le text ici"></textarea>

        <div class="d-grid"><input type="submit" name="envoyer" value="envoyer" class="btn btn-primary btn-block"></div>
    </fieldset>

</form>


<form class="aproposPartenaire" action="/aproposPartenairesPage" method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend>Ajouter un Partenaire</legend>
        <label for="leLien">Ajouter le lien vers le site du partenaire</label>
        <input type="text" name="leLien" id="leLien" placeholder="Exemple: https://www.google.fr">

        <label for="imagePartenaire">Insérez le logo du partenaire</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
        <input type="file" name="imagePartenaire" id="imagePartenaire">
    
    </fieldset>
    <input type="submit" name="envoyer" id="envoyer" value="Ajouter le partenaire">
</form>
