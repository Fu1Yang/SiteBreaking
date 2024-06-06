<?php
declare(strict_types=1);

namespace app\SiteBreaking\controller;

use app\SiteBreaking\model\Authentification;
use app\SiteBreaking\model\Utilisateur;
use app\SiteBreaking\model\Database;
use PDO;

class ConnexionController extends BaseController {
    public function index():void {
        $this->view("connexion/index");
    }

    public function connecter($email,$mot_de_passe){
        $utilisateur = Utilisateur::verifConnexion($email,$mot_de_passe);
        if ($utilisateur != null) {
            Authentification::getInstance()->login($utilisateur);
            // Supposons que tu as déjà inclus le fichier de configuration et la classe Database

           // Vérifier le rôle de l'utilisateur connecté
           if ($utilisateur->getRole() === 'administrateur') {
            // Rediriger vers la page d'administration si l'utilisateur est un administrateur
            $this->redirectTo("./compteAdmin");
            } else {
              
                echo "Accès refusé";
            }
        }
        else{
            $this->redirectTo("./connexion");
        }
    }

    public function deconnexion(){
        $message = "Vous étes deconnecter de votre compte ";
        session_start();
        session_unset();
        session_destroy();
        echo "<script>alert('$message');</script>";
        $this->view('connexion/index');

    }
}