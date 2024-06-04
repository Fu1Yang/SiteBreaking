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

            // Préparation de la requête pour sélectionner les utilisateurs avec un rôle spécifique
            $stmt = Database::getInstance()->getConnexion()->prepare("SELECT * FROM Utilisateur WHERE role = :role");
            $role = 'administrateur';
            $stmt->bindParam(':role', $role);
            $stmt->execute();

            // Vérification si un utilisateur avec le rôle administrateur existe
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
          
            if ($user) {
               
                // Si un utilisateur avec le rôle administrateur est trouvé, redirection vers la page d'administration
                $this->redirectTo("./compteAdmin");
            } else {
                // Sinon, tu peux rediriger vers une autre page ou afficher un message d'erreur
                // $this->redirectTo("/unauthorized"); // Par exemple
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