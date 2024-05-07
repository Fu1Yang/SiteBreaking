<?php
namespace app\SiteBreaking\controller;
use app\SiteBreaking\router\HttpRequest;
use app\SiteBreaking\router\ViewNotFoundException;
    abstract class BaseController
    {
// Propriété protégée _httpRequest pour stocker une instance de la classe HttpRequest        
        protected HttpRequest $_httpRequest;
        protected $_params=[];
        
        public function __construct($httpRequest)
        {
// Initialisation de la propriété _httpRequest avec l'objet $httpRequest passé en paramètre             
            $this->_httpRequest = $httpRequest; 
// Initialisation de la propriété _params en récupérant les paramètres de la requête HTTP            
            $this->_params=$httpRequest->getParams();
        }
  
// Méthode view pour afficher une vue en fonction du nom de fichier passé en paramètre        
        public function view($filename)
        {
// Construction du chemin vers le fichier de vue            
            $viewFile= './../templates/' . $filename . '.php';
// Vérification de l'existence du fichier de vue            
            if(file_exists($viewFile))
            {
// Démarrage de la temporisation de sortie                
                ob_start();
// Extraction des paramètres en variables locales                
                extract($this->_params);
                
// Inclusion du fichier de vue
                include($viewFile);
// Récupération du contenu de la temporisation de sortie et nettoyage                
                $content = ob_get_clean();
// Inclusion du fichier de mise en page et passage du contenu                
                include("./../templates/layout.php");
            }
            else
            {
// Lancer une exception ViewNotFoundException si le fichier de vue n'existe pas                
                throw new ViewNotFoundException($viewFile); 
            }
        }
 // Méthode pour ajouter un paramètre au tableau _params        
        public function addParam($name,$value)
        {
            $this->_params[$name] = $value;
        }

        public function getParams()
        {
            return $this->_params;
        }

        public function redirectTo(string $route)
        {
            header("Location: $route");
            die();
        }
    
    }
