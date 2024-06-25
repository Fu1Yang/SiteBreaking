<?php
use app\SiteBreaking\model\Database;
use app\SiteBreaking\model\Evenement;

function affichageEvenements(){
    $statement = Database::getInstance()->getConnexion()->query("SELECT * FROM Evenement");
    while ($row = $statement->fetch()) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["titre"]."</td>";
        echo "<td>".$row["description"]."</td>";
        echo "<td>".$row["date_evenement"]."</td>";
        echo "<td>".$row["lieu"]."</td>"; 
        // Vérifier si la colonne "photo" est vide
        $image = !empty($row["image"]) ? $row["image"] : null;
        echo "<td>".$image."</td>";
        echo "<td width=300px>";
        echo "<form method='POST' action='/evenement-update'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<button type='submit' name='action' value='update' class='btn btn-primary'>";
        echo "<span class='glyphicon glyphicon-align-left' aria-hidden='true'></span> Modifier";
        echo "</button>";
        echo "</form>";
        echo "<form method='POST' action='/evenementDelete'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<button type='submit' name='action' value='delete' class='btn btn-danger'>";
        echo "<span class='glyphicon glyphicon-remove'></span> Supprimer";
        echo "</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
}
affichageEvenements();






   



