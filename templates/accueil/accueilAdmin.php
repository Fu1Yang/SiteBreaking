<?php
use app\SiteBreaking\model\Database;
use app\SiteBreaking\model\Evenement;

?>
<?php require_once(__DIR__ . '/../includes/headerAccueilAdmin.php'); ?>

<form class="photoCarousel" action="/accueil" method="POST" enctype="multipart/form-data">

<label for="photo">Insert vos Photo</label>
<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
<input type="file" name="photos" id="photo">
<div class="d-grid"><input type="submit" name="inscription" value="insert vos photo" class="btn btn-primary btn-block"></div>
</form>


<form action="/accueilAdmin" method="POST" enctype="multipart/form-data">
<label for="evenementRealiser">Le nombre d'évenement realiser</label>
<input type="text" name="evenementRealiser" id="evenementRealiser" placeholder="Le nombre d'évenement realiser">

<label for="titre">Le titre</label>
<input type="text" name="titre" id="titre" placeholder="Donner un titre">

<label for="nom">Le nom de la photo</label>
<input type="text" name="nom" id="nom" placeholder="Donne un nom">


<label for="photoIdentiter">Insert vos Photo</label>
<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
<input type="file" name="photoIdentiter" id="photoIdentiter">
<div class="d-grid"><input type="submit" name="inscription" value="insert vos photo" class="btn btn-primary btn-block"></div>

<label for="text">Ecrire le text ici</label>
<textarea type="text" name="text" id="text" rows="4" cols="50" placeholder="Ecrire le text ici"></textarea>

<input type="submit" name="envoyer" id="envoyer" value="Transmettre les information">
</form>

