<?php
declare(strict_types=1);
require_once dirname(__DIR__) .'/vendor/autoload.php';
use app\SiteBreaking\router\HttpRequest;
use app\SiteBreaking\router\Router;
// use app\SiteBreaking\controller\ApiController;
// /** /public/index.php */


// $route=explode('/',$_SERVER['REQUEST_URI']);
// if (isset($route[1])&& $route[1] == 'api') {
//     if (isset($route[2])&&$route[2]== 'quizz') {
//         ApiController::quizz();
//     }
   
// }

try
{
   $httpRequest = new HttpRequest(); //recuperation de la requête HTTP grace à $_SERVER;
   $route = Router::getInstance()->findRoute($httpRequest);//découverte de la route depuis le Router construit avec le fichier config/routes.json
   $httpRequest->setRoute($route);//configuration de la requête avec cette route découverte
   $httpRequest->bindParam();// récuperation des parametres fournis dans le $_GET ou dans le $_POST
   $httpRequest->run();// exécution de la route trouvée
}
catch(Exception $e)
{
   echo "Une erreur s'est produite";
   echo $e->getMessage();
}