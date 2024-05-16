<?php
declare(strict_types=1);

namespace app\SiteBreaking\controller;

use app\SiteBreaking\model\Authentification;
use app\SiteBreaking\model\Utilisateur;

class ConnexionController extends BaseController {
    public function index():void {
        $this->view("connexion/index");
    }

    public function connecter($email,$mot_de_passe){
        $utilisateur = Utilisateur::verifConnexion($email,$mot_de_passe);
        if ($utilisateur != null) {
            Authentification::getInstance()->login($utilisateur);
            $this->redirectTo("/compteAdmin");
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
        sleep(2);
        $this->view('connexion/index');

    }
}