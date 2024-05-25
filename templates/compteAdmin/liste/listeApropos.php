<?php
use app\SiteBreaking\model\Database;
use app\SiteBreaking\model\Apropos;

function afficherApropos(){
    $statement = Database::getInstance()->getConnexion()->query("SELECT * FROM Apropos");
    while ($row = $statement->fetch()) {

        echo '<div id="image">';
        echo '<img src="./assets/logo/logo.png" alt="logo du site">';
        echo '<img src="./assets/logo/_7f12db21-a2cb-44e7-ac30-86e57ac4153f.jpg" alt="photo de profile">';
        echo '</div>';
        
        echo '<div id="description">';
        echo'<p>Situé au cœur de la France, dans le département du Cher, Breaking Journey est une association régie par la loi 1901.</p>';
        echo"<p>Ce projet novateur réunit des athlètes et des artistes, acteurs majeurs de la scène mondiale de la danse Breaking. Il s'agit d'une structure dédiée à la jeunesse et aux sports, idéalisée par<strong> Paola Soares da Silva, une danseuse de haut niveau et vice-championne de Breaking, ainsi que par le champion du monde et référent du Breaking au Centre Val de Loire pour les JO 2024, Matheus Barbosa Lopes.</strong></p>";
        echo'<p>Les objectifs de Breaking Journey sont multiples :</p>';
        echo'<ol>';
        echo'<li>La diffusion et la promotion des cultures urbaines à travers une approche sociale, éducative et professionnelle.</li>';
        echo'<li>Faire du territoire un lieu attractif grâce à des événements et des œuvres chorégraphiques originales.</li>';
        echo'</ol>';
        echo"<p>L'association vise également à apporter des animations à un public en zone rurale, contribuant ainsi à dynamiser la vie culturelle et sociale de la région. En alliant le dynamisme des cultures urbaines à des actions éducatives et professionnelles, Breaking Journey aspire à créer un impact positif durable sur la jeunesse et la communauté locale.</p>";
        echo '</div>';

}
}
afficherApropos();