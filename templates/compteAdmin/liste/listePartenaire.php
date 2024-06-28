<?php
use app\SiteBreaking\model\Database;


function listeApropos(){
    $statement = Database::getInstance()->getConnexion()->query("SELECT * FROM Partners");

   
    while ($row = $statement->fetch()) {
   
            echo '<a href="'.$row["partner_url"].'"><img src="./assets/NosPartenaires/'.$row["partner_name"].'" alt="logo de nos partenaire"></a>';
 }
}
listeApropos();