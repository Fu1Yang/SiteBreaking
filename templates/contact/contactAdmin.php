<?php require_once(__DIR__ . '/../includes/headerAccueilAdmin.php'); ?>

<h1>Page contact Administrateur</h1>

<form class="presentation" action="/contactCreer" method="POST">
        <legend>Ajouter un contact</legend>

        <label for="adresse">Adresse</label>
        <input type="text" name="adresse" id="adresse" required maxlength="255">

        <label for="numeroDeTel">Numéro de téléphone</label>
        <input type="text" name="numeroDeTel" id="numeroDeTel" required pattern="\d{10}">

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required maxlength="255">

        <label for="description">Description</label>
        <input type="text" name="description" id="description" required maxlength="255">

        <label for="jour">Jour</label>
        <input type="text" name="jour" id="jour" required>

        <label for="niveauEtStyle">Niveau et Style</label>
        <input type="text" name="niveauEtStyle" id="niveauEtStyle" required maxlength="255">

        <input type="submit" name="envoyer" id="envoyer" value="Créer un contact">
    </form>



