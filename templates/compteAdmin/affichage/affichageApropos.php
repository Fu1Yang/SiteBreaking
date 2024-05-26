<?php
use app\SiteBreaking\model\Database;
use app\SiteBreaking\model\Apropos;

function affichageApropos(){
    $statement = Database::getInstance()->getConnexion()->query("SELECT * FROM Apropos");
    while ($row = $statement->fetch()) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["logo"]."</td>";
        echo "<td>".$row['images']."</td>";
        echo "<td>".$row["description"]."</td>";

        // Vérifier si la colonne "photo" est vide
        $photo = !empty($row["logo"]) ? $row["logo"] : null;
        $image = !empty($row['images']) ? $row['images'] : null;
        echo "<td>".$photo."</td>";
        echo "<td>".$image."</td>";
        echo "<td width=300px>";
        echo "<form method='POST' action='update.php'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<button type='submit' name='action' value='update' class='btn btn-primary'>";
        echo "<span class='glyphicon glyphicon-align-left' aria-hidden='true'></span> Modifier";
        echo "</button>";
        echo "</form>";
        echo "<form method='POST' action='/compteAdmin'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<button type='submit' name='action' value='delete' class='btn btn-danger'>";
        echo "<span class='glyphicon glyphicon-remove'></span> Supprimer";
        echo "</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
}
affichageApropos();