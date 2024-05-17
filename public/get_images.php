<?php
$imagesDir = './assets/images/'; // Répertoire contenant les images
$images = glob($imagesDir . '*.{jpg,jpeg,png,gif,avif}', GLOB_BRACE); // Liste des fichiers d'images dans le répertoire

header('Content-Type: application/json');
echo json_encode($images); // Renvoie la liste des noms de fichiers d'images au format JSON
?>
