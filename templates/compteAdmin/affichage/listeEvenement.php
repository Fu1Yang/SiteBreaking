<?php
use app\SiteBreaking\model\Database;
use app\SiteBreaking\model\Evenement;


$evenement = Evenement::read($id=1);
 

echo "<article>";

echo '<div  class="description">';
echo '<h2>'.$evenement->getTitre() .'</h2>';
echo '<p>'.$evenement->getDescription().'</p>';
echo '<p>Le: '.$evenement->getDateEvenement()->format('Y-m-d H:i:s').'</p>';
echo '<p>Le lieux: '.$evenement->getLieu().'</p>';
echo '</div>';

echo '<img src="./assets/images/breakdance-olympics-copy.jpg" alt="">';
echo '</article>';