<?php
use app\SiteBreaking\model\Database;
use app\SiteBreaking\model\Accueil;

function afficherImages(){
    $statement = Database::getInstance()->getConnexion()->query("SELECT * FROM Accueil");

    $index = 0;
    while ($row = $statement->fetch()) {
        $index++;
        if ($index < 2) {
            echo '<div class="evenementEffectuer">';
            echo '<div id="h1">';
            echo   '<h1>Les événement effectué de puits sa création</h1>';
            echo '</div>';
            echo '<div id="paragraphe">';
            echo  ' <p class="evenementRealiser"><b>'.$row["evenementRealiser"].'</b></p>';
            echo '</div>';
            echo '</div>';
        }
       echo '<div class="row">';
       echo' <div class="col-sm-8 mb-3 mb-sm-0">';
       echo  '<div class="card">';
       echo     '<div class="card-body">';
       echo      '<h5 class="card-title">'.$row["titre"].'</h5>';
       echo      '<p class="card-text">'.$row["text"].'</p>';
       echo   '</div>';
       echo '</div>';
       echo '</div>';
       echo '<div class="col-sm-4">';
       echo  '<div class="card">';
       echo    '<div class="card-body">';
       echo     '<h5 class="card-title">'.$row["nom"].'</h5>';
       echo      '<img src="./assets/logo/'.$row["image"].'" alt="image de profile">';
       echo    '</div>';
       echo  '</div>';
       echo '</div>';
       echo '</div>';
      


}}
afficherImages();