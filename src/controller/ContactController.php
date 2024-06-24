<?php
declare(strict_types=1);

namespace app\SiteBreaking\controller;
use app\SiteBreaking\model\Contact;
use app\SiteBreaking\model\Database;

class ContactController extends BaseController {
    public function index():void {
        $this->view("contact/index");
    }

    public function update(){
        $this->view("compteAdmin/modifier/modifierContact");
    }

    public function modifier($id){
        if (isset($_POST["adresse"]) && isset($_POST["numeroDeTel"]) && isset($_POST["email"]) && isset($_POST["description"]) && isset($_POST["jour"]) && isset($_POST["niveauEtStyle"])) {
            $adresse = $_POST["adresse"];
            $numeroDeTel = $_POST["numeroDeTel"];
            $email = $_POST["email"];
            $description = $_POST["description"];
            $jour = $_POST["jour"];
            $niveauEtStyle = $_POST["niveauEtStyle"];
    
    
            $db = Database::getInstance()->getConnexion();
            $requete = $db->prepare("UPDATE Contact SET adresse=:adresse, numeroDeTel=:numeroDeTel, email=:email, description=:description, jour=:jour, niveauEtStyle=:niveauEtStyle WHERE id=:id");
        
            $requete->bindValue(":adresse", $adresse);
            $requete->bindValue(':numeroDeTel', $numeroDeTel);
            $requete->bindValue(':email', $email);
            $requete->bindValue(':description', $description);
            $requete->bindValue(':jour', $jour);
            $requete->bindValue(':niveauEtStyle', $niveauEtStyle);
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

    public function  nouveauContact(){
        $message = "Mise à jour impossible";
        try {
            if (isset($_POST["envoyer"])) {
                $adresse = $_POST["adresse"];
                $numeroDeTel = $_POST["numeroDeTel"];
                $email = $_POST["email"];
                $description = $_POST["description"];
                $jour = $_POST["jour"];
                $niveauEtStyle = $_POST["niveauEtStyle"];
               

               $contact = [
                "adresse"=>$adresse,
                "numeroDeTel"=>$numeroDeTel,
                "email"=>$email,
                "description"=>$description,
                "jour"=>$jour,
                "niveauEtStyle"=>$niveauEtStyle,
               ];


               Contact::create($contact);     
               header("location:compteAdmin");
            }


        } catch (\Throwable ) {
            echo $message;
        }
    }
    
    public function contactAdmin() {
        $this->view("contact/contactAdmin");
    }

    
    public function delete($id) {
        // Vérifier si un ID est passé en POST
        if (!empty($_POST["id"])) {
            // Récupérer l'ID de l'utilisateur à supprimer
            $userId = intval($_POST["id"]); // Convertir en entier
    
            // Supprimer le contact qui est égale a id
            $contact = Contact::read($userId);
            if ($contact) {
                $contact->delete($contact);
            } else {
                echo "l'élément qui corresponde a l'accueil non trouvé.";
            }
    
            // Rediriger vers la page du compte admin après la suppression
            $this->redirectTo("/compteAdmin");
        }  
        else{
            return "Votre Id est vide";
        }
    }
}
