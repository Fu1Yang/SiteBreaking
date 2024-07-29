<?php
// Répertoire contenant les images
$imagesDir = './assets/images/'; 
// Liste des fichiers d'images dans le répertoire
$images = glob($imagesDir . '*.{jpg,jpeg,png,gif,avif}', GLOB_BRACE); 

header('Content-Type: application/json');
 // Renvoie la liste des noms de fichiers d'images au format JSON
echo json_encode($images);
?>
