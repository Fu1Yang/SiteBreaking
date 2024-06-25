<?php require_once(__DIR__ . '/../includes/headerAccueilAdmin.php'); ?>

<h1 class="text-white">Page d'événement Administrateur</h1>

<form class="presentation" action="/evenementCreer" method="POST" enctype="multipart/form-data">
<legend>Ajouter un événement</legend>

<label for="titre">Titre de votre événement</label>
<input type="text" name="titre" id="titre" placeholder="Donner un titre a votre evenements">

<label for="description">La description de votre événement</label>
<textarea type="text" name="description" id="description" rows="4" cols="50" placeholder="Ecrire le text ici"></textarea>

<label for="dateEvenement">Date de l'événement exemple: 2024-04-17 09:11:00</label>
<input type="text" name="dateEvenement" id="dateEvenement" placeholder="Date de l'événement exemple 2024-05-01 20:00:00">

<label for="lieux">Le lieux de votre événement</label>
<input type="text" name="lieux" id="lieux" placeholder="Donner lieux de votre événement">


<label for="imageEve">Inserez vos photos de présentation</label>
<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
<input type="file" name="imageEve" id="imageEve">

<input type="submit" name="envoyer" id="envoyer" value="Créer un événement">
</form>
<a href="../compteAdmin" class="btn btn-danger">Revenir sur l'interface Admin</a>
