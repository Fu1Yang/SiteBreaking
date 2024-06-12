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

        $_SESSION["id"]=$utilisateur->getId();
        $_SESSION["role"]=$utilisateur->getRoles();
    }

    public function logout()
    {
        unset($_SESSION['id']);
        unset($_SESSION['role']);
        session_destroy();
    }
    public function getUtilisateurConnecte():?Utilisateur
    {
        if (isset($_SESSION['id'])&&is_numeric($_SESSION['id']))
        {
            return Utilisateur::read($_SESSION['id']);
        }
        return null;
    }
}