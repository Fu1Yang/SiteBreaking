<?php
use app\SiteBreaking\model\Database;


function affichagePartenaire(){
    $statement = Database::getInstance()->getConnexion()->query("SELECT * FROM Partners");
    while ($row = $statement->fetch()) {
        $photo = !empty($row["partner_name"]) ? $row["partner_name"] : null;        // Vérifie si la colonne "photo" est vide
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$photo."</td>";
        echo "<td>".$row['partner_url']."</td>";
        echo "<td width=300px>";
        echo "<button type='submit' name='action' value='update' class='btn btn-primary'>";
        echo "<span class='glyphicon glyphicon-align-left' aria-hidden='true'></span><a href='../aproposAdmin' style='color:white'> ajouter un partenaire</a>";
        echo "</button>";
        echo "<form method='POST' action='/partenaireDelete'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<button type='submit' name='action' value='delete' class='btn btn-danger'>";
        echo "<span class='glyphicon glyphicon-remove'></span> Supprimer";
        echo "</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
}
affichagePartenaire();