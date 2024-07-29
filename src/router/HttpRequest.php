<?php
declare(strict_types=1);

namespace app\SiteBreaking\router;

class HttpRequest
{
    private string $_uri;
    private string $_method;
    private ?array $_params; // les parametres ne sont pas defini à la création de la requête. C'est le routeur qui les ajoutera lors du traitement de la route via bindParams.
    private ?Route $_route; // route trouvée par le routeur et associée à la requete.
    
    public function __construct()
    {
        $this->_uri =$_SERVER['REQUEST_URI'];
        $this->_method = $_SERVER['REQUEST_METHOD'];
        $this->_params = null;
        $this->_route = null;
    }
    
    public function getUri():string
    {
        return $this->_uri; 
    }
    
    public function getMethod():string
    {
        return $this->_method;  
    }
    
    public function getParams():array
    {
        return $this->_params;  
    }
    public function setRoute(Route $route)
    {
        $this->_route = $route; 
    
    }
    public function getRoute():Route
    {
        return $this->_route;   
    } 
    private function bindParamFromPost():array
    {
        // Initialise un tableau pour stocker les paramètres.
        $params = array();

        // Parcourt tous les paramètres de la route.
        foreach($this->_route->getParams() as $param)
                {
                    // Commence à traiter le type de paramètre.
                    switch ($param->type) {
                        case 'integer':
                           // Convertit la valeur du paramètre en entier.
                            $params[$param->name] =(int) $_POST[$param->name];  
                            break;
                        case 'email':
                                // Valide et assigne la valeur du paramètre email.
                                if (!$email = filter_input(INPUT_POST,$param->name, FILTER_VALIDATE_EMAIL))
                                    throw new \InvalidArgumentException(" not a valid email", 1);
                                
                                $params[$param->name] =$email;  
                                break;
                        case 'password':
                                // Vérifie la longueur du mot de passe et le convertit en entités HTML.
                                 if (strlen($_POST[$param->name])< $param->lenght)
                                 throw new \InvalidArgumentException(" too short password", 1);
                                 $params[$param->name] =htmlentities($_POST[$param->name]); 
                                 break;
                        default:
                            // Convertit la valeur du paramètre en entités HTML.
                            $params[$param->name] =htmlentities($_POST[$param->name]); 
                            break;
                    }  
                }
         // Retourne le tableau des paramètres.        
        return $params;
    }

    private function bindParamFromGet():array
    {
        $route=explode('/',$this->_route->getPath());// la route ne contient pas les parametres
        $uri = explode('/',$this->_uri);
        $nbParams=count($uri)-count($route);
        $valeursParams = array_slice($uri,count($route),$nbParams);// l'url contient les parametres
        $params = array();
        for ($i =0;$i<$nbParams;$i++)
        {
            switch ($this->getRoute()->getParams()[$i]->type) {
                case 'integer':
                    // un nombre entier est... un nombre entier, il ne peut pas contenir de code malicieux
                    $params[$this->getRoute()->getParams()[$i]->name] =(int) $valeursParams[$i];  
                    break;
                case 'email':
                        // il faut vérifier que c'est bien un email avec la fonction filter
                        if (!$email = filter_input(INPUT_GET, $this->getRoute()->getParams()[$i]->name, FILTER_VALIDATE_EMAIL))
                            throw new \InvalidArgumentException("not a valid email", 1);
                        $params[$this->getRoute()->getParams()[$i]->name] =(int) $valeursParams[$i];  
                        break;
                default:
                   // du texte peut être aussi du code malicieux comme du code js, php ou sql par exemple
                    // htmlentities neutralise ce code en mettant des détrompeurs autour des balises
                    $params[$this->getRoute()->getParams()[$i]->name] = htmlentities($valeursParams[$i]);
                    break;
            }   
        }
        return $params;
    }
    public function bindParam():void
    {
        switch($this->_method)
        {
            case "GET":
                $this->_params=$this->bindParamFromGet();
                break;
            case "POST":
                $this->_params=$this->bindParamFromPost();
                break;
            // case "PUT":
            //     $this->_params=$this->bindParamFromPut();
            // break;
            // case "DELETE":
            //     $this->_params=$this->bindParamFromDelete();
                // break;  
        }
    }
    public function run()
    {
        if ($this->_route == null)
            throw new RouteNotSetException($this);
        $this->_route->run($this);
    }

   
}
