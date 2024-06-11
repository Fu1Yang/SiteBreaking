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
        try {
            $utilisateur = Utilisateur::verifConnexion($email,$mot_de_passe);
            if ($utilisateur != null) {
               if ($utilisateur->getRoles() == 'administrateur'&& $utilisateur->getValidationEmail() == 1) {
                $this->redirectTo("./compteAdmin");
                } else {
                  
                    echo "Accès refusé";
                }
            }
            else{
                $this->redirectTo("./connexion");
            }
        } catch (\Throwable $th) {
            
            $this->redirectTo("./connexion");
            $message = "Valider votre email";
            echo $message;
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