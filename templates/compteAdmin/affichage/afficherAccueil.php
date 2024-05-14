<?php
use app\SiteBreaking\model\Database;
use app\SiteBreaking\model\Accueil;

function afficherAccueil(){
    $statement = Database::getInstance()->getConnexion()->query("SELECT * FROM Accueil");
    while ($row = $statement->fetch()) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["evenementRealiser"]."</td>";
        echo "<td>".$row["titre"]."</td>";
        echo "<td>".$row["nom"]."</td>";
        echo "<td>".$row["image"]."</td>";
        echo "<td>".$row["text"]."</td>";
        echo "<td width=300px>";
        echo "<form method='POST' action='update.php'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<button type='submit' name='action' value='update' class='btn btn-primary'>";
        echo "<span class='glyphicon glyphicon-align-left' aria-hidden='true'></span> Modifier";
        echo "</button>";
        echo "</form>";
        echo "<form method='POST' action='/accueil-delete'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<button type='submit' name='action' value='delete' class='btn btn-danger'>";
        echo "<span class='glyphicon glyphicon-remove'></span> Supprimer";
        echo "</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
}
afficherAccueil();