<?php
use app\SiteBreaking\model\Database;
use app\SiteBreaking\model\Evenement;

function afficherImages(){
    $statement = Database::getInstance()->getConnexion()->query("SELECT * FROM Evenement");
    while ($row = $statement->fetch()) {

 

echo "<article>";

echo '<div  class="description">';
echo '<h2>'.$row["titre"].'</h2>';
echo '<p>'.$row["description"].'</p>';
echo '<p>Le: '.$row["date_evenement"].'</p>';
echo '<p>Le lieux: '.$row["lieu"].'</p>';
echo '</div>';

echo '<img src="./assets/images/breakdance-olympics-copy.jpg" alt="">';
echo '</article>';

}
}
afficherImages();