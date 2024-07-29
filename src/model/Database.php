<?php
namespace app\SiteBreaking\model;
class Database {
    private static ?Database $_instance=null;
    private ?\PDO $_connexion = null;

    //constructeur privé pour empêcher l'instanciation directe
    private function __construct(){
        $this->_connexion = new \PDO("mysql:host=".Config::getInstance()->getDbHost().';dbname='.Config::getInstance()->getDbName(),Config::getInstance()->getDbUserName(),Config::getInstance()->getDbUserPassword
        ());

    }
//Méthode statique pour accéder à l'instance unique
    public static function getInstance() 
    {
        if (self::$_instance == null) 
        {
            self::$_instance = new Database();
        }
        return self::$_instance;
    }
//Méthode pour récuperer l'objet PDO
    public function getConnexion():\PDO 
    {
        return $this->_connexion;
    }
}
