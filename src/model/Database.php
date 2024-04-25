<?php
namespace app\SiteBreaking\model;
class Database {
    private static ?Database $_instance=null;
    private ?\PDO $_connexion = null;
    //constructeur privé pour empêcher l'instanciation directe
    private function __construct(){
        $this->_connexion = new \PDO("mysql:host=mysql-srv;dbname=SiteBreaking","root", "password");

    }

    public static function getInstance() //Méthode statique pour accéder à l'instance unique
    {
        if (self::$_instance == null) 
        {
            self::$_instance = new Database();
        }
        return self::$_instance;
    }
    

    public function getConnexion():\PDO //Méthode pour récuperer l'objet PDO
    {
        return $this->_connexion;
    }



}
