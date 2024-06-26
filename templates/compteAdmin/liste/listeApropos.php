<?php
use app\SiteBreaking\model\Database;


function afficherApropos(){
    $statement = Database::getInstance()->getConnexion()->query("SELECT * FROM Apropos");
    while ($row = $statement->fetch()) {

        echo '<div id="image">';
        echo '<img src="./assets/logoApropos/'.$row["logo"].'" alt="logo du site">';
        echo '<img src="./assets/imageApropos/'.$row["images"].'" alt="photo de profile">';
        echo '</div>';
        
        echo '<div id="description" >';
        echo'<p">'.$row["description"].'</p>';
        echo '</div>';

}
}
afficherApropos();