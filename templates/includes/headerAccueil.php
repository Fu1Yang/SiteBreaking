<?php
use app\SiteBreaking\model\Database;
use app\SiteBreaking\model\Visiteur;
// Assurez-vous que vous avez une route définie pour accepter POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
  Database::getInstance()->getConnexion();
  Visiteur::cookie();
} else {
  // Réponse d'erreur si la méthode n'est pas autorisée
  http_response_code(405);
 
}
?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="Site de danse rural breaking hiphop a Vierzon 18100" />
  <meta name="author" content="Matheus" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./assets/css/accueil.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jacquard+24&display=swap" rel="stylesheet">
  <script src="./assets/js/accueil.js"></script>
  <script src="./assets/js/cookies.js"></script>
  <title>Breaking Journey</title>
  <link style="width: 30px;" rel="icon" href="../assets/logo/icon.ico" type="image/ico">
</head>

<body>

  <header>
  <div class="logo1">
    <img  src="./assets/logo/logo.png" alt="logo-du-site">
    <a href="https://www.facebook.com/bboybgirljourney/"><img src="./assets/logo/logo_fb.png" alt="logo de l'association "></a>
  </div>
  <h1>Breaking Journey</h1>
  <button class="compteSmartephone"><a href="./connexion">Administrateur</a></button>
</header>

<div id="cookieBanner">
        <p>Nous utilisons des cookies pour améliorer votre expérience sur notre site. 
           <a href="cookie-policy.html" style="color: #00f;">En savoir plus</a>.
        </p>
        <button class="cookie-button" onclick="acceptCookies()">Accepter</button>
        <button class="cookie-button" onclick="rejectCookies()">Refuser</button>
    </div>