<?php
use app\SiteBreaking\model\Database;
use app\SiteBreaking\model\Utilisateur;

function afficherDb(){
    $statement = Database::getInstance()->getConnexion()->query("SELECT * FROM Utilisateur");
    while ($row = $statement->fetch()) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["nom_utilisateur"]."</td>";
        echo "<td>".$row["prenom_utilisateur"]."</td>";
        echo "<td>".$row["mot_de_passe"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["role"]."</td>";
        echo "<td>".$row["date_inscription"]."</td>";
        echo "<td>".$row["token"]."</td>";
        echo "<td>".$row["validation_email"]."</td>";
        echo "<td width=300px>";
        echo "<form method='POST' action='utilisateurUpdate'>";
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
afficherDb();





   



