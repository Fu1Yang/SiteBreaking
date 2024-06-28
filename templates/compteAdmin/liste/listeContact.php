<?php
use app\SiteBreaking\model\Database;


function afficherContact(){
    $statement = Database::getInstance()->getConnexion()->query("SELECT * FROM Contact");
    $index = 0;
    while ($row = $statement->fetch()) {
        $index++;
        if ($index <= 1) {
      
    
            echo '<div id="adresse">';
                echo '<div class="p">';
                    echo '<p><a href="https://www.google.com/maps/place/54+Rue+Jules+Louis+Breton,+18100+Vierzon/@47.2205194,2.0780836,17z/data=!3m1!4b1!4m6!3m5!1s0x47fadbc41b115acb:0x6b97f3e2ebb3a4a3!8m2!3d47.2205194!4d2.0806585!16s%2Fg%2F11s7cm_041?entry=ttu">Adresse: 54 Bis Jules louis breton 18100 Vierzon.</a></p>';
                    echo '<p><a href="tel:+33749523881">Numéro de téléphone: '.$row["numeroDeTel"].'</a></p>';
                    echo '<p><a href="mailto:associationbjs@gmail.com">E-mail: '.$row["email"].'</a></p>';
                echo '</div>';
            echo '</div>';
            echo '<h1>Les Horaires</h1>';
        }
       
        echo '<div class="cartes">';
        echo    '<div class="carte">';
        echo        '<div><h3>'.$row["jour"].'</h3></div>';
        echo        '<h4>'.$row["niveauEtStyle"].'</h4>';
        echo        '<p><span>'.$row["description"].'</span>.</p>';
        echo        '<p>'.$row["adresse"].'.</p>';
        echo    '</div>';
        echo '</div>';

}
}
afficherContact();