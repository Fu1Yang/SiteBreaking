<?php
# src/router/Route.php
declare(strict_types=1);

namespace app\SiteBreaking\router;
use app\SiteBreaking\model\Authentification;
use app\SiteBreaking\model\Database;


class Route
{
    private string $_path;
    private string $_controller;
    private string $_action;
    private string $_method;
    private array $_params;
    private array $_roles;
    public function __construct(\stdClass $route)
    {
        // le parametre $route est en réalité un objet issu de json_decode et donc un \stdClass
        $this->_path = $route->path;
        $this->_controller = $route->controller;
        $this->_action = $route->action;
        $this->_method = $route->method;
        $this->_params = $route->params;
        $this->_roles = $route->roles;
    }
    public function getPath():string
    {
        return $this->_path;
    }
    public function getController():string
    {
        return $this->_controller;
    }
    public function getAction():string
    {
        return $this->_action;
    }
    public function getMethod():string
    {
        return $this->_method;
    }
    public function getParams():array
    {
        return $this->_params;
    }
    public function getRoles(): array
    {
        // Retourne le tableau des rôles.
        return $this->_roles;
    }

    public function run(HttpRequest $httpRequest)
    {
        // Initialise le contrôleur à null.
        $controller = null;   
        session_start();
        // Vérifie s'il y a des rôles spécifiés.
        if (count($this->_roles) > 0) {

            // Obtient l'utilisateur connecté.
            $utilisateur = Authentification::getInstance()->getUtilisateurConnecte();
            // Vérifie si l'utilisateur est null, s'il l'est, lance une exception d'interdiction.

            if ($utilisateur == null){
                
                throw new NotAllowedException();

            }
            
            // Vérifie si le rôle de l'utilisateur n'est pas autorisé, lance une exception d'interdiction.
            if (!in_array($utilisateur->getRoles(), $this->_roles)) {
                throw new NotAllowedException();
            }
        }
        
        // Forme le nom complet du contrôleur en fonction du nom spécifié.
        $controllerName = "app\SiteBreaking\controller\\" . $this->_controller . "Controller";
        
        // Vérifie si la classe du contrôleur existe.
        if (class_exists($controllerName)) {
            // Instancie le contrôleur avec la requête HTTP.
            $controller = new $controllerName($httpRequest);
            
            // Vérifie si la méthode d'action existe dans le contrôleur.
            if (method_exists($controller, $this->_action)) {
                // Appelle la méthode d'action avec les paramètres de la requête HTTP.
                $controller->{$this->_action}(...$httpRequest->getParams());
            } else {
                // Lance une exception si la méthode d'action n'existe pas.
                throw new ActionNotFoundException();
            }
        } else {
            // Lance une exception si la classe du contrôleur n'existe pas.
            throw new ControllerNotFoundException();
        }
    }


}