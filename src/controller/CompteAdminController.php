<?php
declare(strict_types=1);

namespace app\SiteBreaking\controller;
use app\SiteBreaking\model\Database;
use app\SiteBreaking\model\Utilisateur;
use app\SiteBreaking\model\Message;

class CompteAdminController extends BaseController {
    public function index():void {
            $this->view("compteAdmin/index");    
    }
    
    public function delete($id) {
        // Vérifier si un ID est passé en POST
        if (!empty($_POST["id"])) {
            // Récupérer l'ID de l'utilisateur à supprimer
            $userId = intval($_POST["id"]); // Convertir en entier
    
            // Récupérer tous les messages associés à cet utilisateur
            $messages = Message::findByUserId($userId);
    
            // Supprimer chaque message associé à l'utilisateur
            foreach ($messages as $message) {
                // Appeler la méthode delete() de la classe Message avec un objet Message en tant qu'argument
                Message::delete($message);
            }
    
            // Supprimer l'utilisateur lui-même
            $utilisateur = Utilisateur::read($userId);
            if ($utilisateur) {
                $utilisateur->delete($utilisateur);
            } else {
                echo "Utilisateur non trouvé.";
            }
    
            // Rediriger vers la page du compte admin après la suppression
            $this->redirectTo("/compteAdmin");
        }
    }
    
   public function update($id){
         $this->view("compteAdmin/modifier/modifierUtilisateur");
   } 

   public function modifier($id){
    if (isset($_POST["role"]) && isset($_POST["validationEmail"])) {
        $role = $_POST["role"];
        $validationEmail = $_POST["validationEmail"];


        $db = Database::getInstance()->getConnexion();
        $requete = $db->prepare("UPDATE Utilisateur SET role=:role, validation_email=:validation_email WHERE id=:id");
    
        $requete->bindValue(":role", $role);
        $requete->bindValue(':validation_email', $validationEmail);
        $requete->bindValue(":id", $id);
    
        $result = $requete->execute();
        if (!$result) {
            echo "Un problème est survenu, les modifications n'ont pas été faites!";
        } else {
            $this->redirectTo("/compteAdmin");
        }
    } else {
        echo "Modifier vos coordonnées";
    }
}

  
    
    
    
    

}