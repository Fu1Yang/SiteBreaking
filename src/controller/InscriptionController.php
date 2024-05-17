<?php
declare(strict_types=1);

namespace app\SiteBreaking\controller;

use app\SiteBreaking\model\Utilisateur;
use DateTime;

class InscriptionController extends BaseController {
    public function index():void {
        $this->view("inscription/index"); 
    }
 
    public function inscription(string $nom_utilisateur, string $prenom_utilisateur, string $password, string $email, string $confirmePassword): void {
        // Vérification de la correspondance des mots de passe
        if ($password !== $confirmePassword) {
            echo "La confirmation du mot de passe a échoué ";
            $this->view("inscription/index"); 
        }
        // Création d'un objet DateTime pour la date d'inscription
        $date_inscription = new DateTime();
        // Obtenez la date d'inscription sous forme de chaîne
        $date_inscription_str = $date_inscription->format('d-m-Y H:i:s');

        // Convertissez la chaîne en objet DateTime
        $date_inscription_obj = new DateTime($date_inscription_str);
       
        // Créez l'utilisateur en passant l'objet DateTime
        $utilisateur = new Utilisateur($nom_utilisateur, $prenom_utilisateur, password_hash($password, PASSWORD_DEFAULT), $email, "administrateur", $date_inscription_obj);
        // Enregistrement de l'utilisateur dans la base de données
     
        Utilisateur::create($utilisateur);
        
        // Redirection vers la page de connexion
        $this->redirectTo("/connexion");
    }
    
    
}