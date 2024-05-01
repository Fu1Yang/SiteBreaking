<?php
namespace app\SiteBreaking\model;



class Authentification { 

    private static ?Authentification $_instance = null;
    private ?Utilisateur $_utilisateur = null;
    private function __construct(){

    }
   public static function getInstance() {
        if (self::$_instance == null) {
            self::$_instance = new Authentification();
          
        }
        return self::$_instance;
    }

    public function login(Utilisateur $utilisateur) {

        $_SESSION["UTILISATEUR_ID"]=$utilisateur->getId();
        $_SESSION["UTILISATEUR_RANK"]=$utilisateur->getRole();
    }

}