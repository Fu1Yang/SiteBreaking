<?php
declare(strict_types=1);
namespace app\SiteBreaking\controller;
use app\SiteBreaking\model\Utilisateur;

class ConnexionController extends BaseController {
    public function index():void {
        $this->view("connexion/index");
    }

    public function connecter($email, $mot_de_passe) {
        
        try {
            $utilisateur = Utilisateur::verifConnexion($email, $mot_de_passe);
            
            if ($utilisateur != null) {
                // Attribuer le rôle de l'utilisateur à la session
               
                $_SESSION["id"] = $utilisateur->getId();
                // Vérifier si l'email de l'utilisateur est validé
                if ($utilisateur->getValidationEmail() == 1) {
                    // Rediriger vers la page compteAdmin si l'email est validé
                    $this->redirectTo("./compteAdmin");
                } else {
                    // Sinon, afficher un message d'accès refusé
                    echo "Accès refusé email pas encore valider";
                }
            } else {
                // Rediriger vers la page de connexion si l'utilisateur n'existe pas ou les informations sont incorrectes
                $this->redirectTo("./connexion");
            }
        } catch (\Throwable $th) {
            // En cas d'erreur, rediriger vers la page de connexion et afficher un message
            $this->redirectTo("./connexion");
            $message = "Valider votre email";
            echo $message;
        }
    }
    

    public function deconnexion(){
        $message = "Vous êtes déconnecté";
        session_unset();
        session_destroy();

        $this->view('connexion/index');

    }
}