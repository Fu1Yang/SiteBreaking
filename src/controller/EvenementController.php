<?php
declare(strict_types=1);

namespace app\SiteBreaking\controller;
use app\SiteBreaking\model\Evenement;
use app\SiteBreaking\model\Database;

class EvenementController extends BaseController {
   
    public function index():void {
        $this->view("evenement/index");
    }


    public function evenementAdmin() {
        $this->view("evenement/evenementAdmin");
    }

    public function nouvelleEvenement(){
        $message = "La photo doit être de type jpeg, jpg, png, avif ou pdf";
        try {
            if (isset($_POST["envoyer"])) {
               $titre = $_POST["titre"];
               $description = $_POST["description"];
                $dateEvenement = $_POST["dateEvenement"];
               $lieux = $_POST["lieux"];
               $imageEve = $_FILES['imageEve']['name'];
               

               $evenement = [
                "titre"=>$titre,
                "description"=>$description,
                "date_evenement"=>$dateEvenement,
                "lieu"=>$lieux,
                "image"=>$imageEve,
               ];

               if (isset($_FILES["imageEve"]) && preg_match("#jpeg|jpg|png|avif|pdf#", $_FILES['imageEve']['type'])) {
                $path = './assets/imageEvenement/';
                $photoName = $_FILES['imageEve']['name'];
                // Déplacer le fichier téléchargé vers le répertoire de destination
                move_uploaded_file($_FILES['imageEve']["tmp_name"], $path . $photoName);
               }else {
                echo $message;
               }

               Evenement::create($evenement);     
               header("location:compteAdmin");
            }


        } catch (\Throwable ) {
            echo $message;
        }
    }


    public function delete($id) {
        // Vérifier si un ID est passé en POST
        if (!empty($_POST["id"])) {
            // Récupérer l'ID de l'utilisateur à supprimer
            $userId = intval($_POST["id"]); // Convertir en entier
    
            // Supprimer l'accueil qui est égale a id
            $evenement = Evenement::read($userId);
            if ($evenement) {
                $evenement->delete($evenement);
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

    public function update($id) {
        $this->view("compteAdmin/modifier/modifierEvenement");
    }

    public function updateEvenement($id) {
        if (isset($_POST["titre"]) && isset($_POST["description"]) && isset($_POST["date"]) && isset($_POST["lieu"]) && isset($_FILES['image']['name']) ) {
            $titre = $_POST["titre"];
            $description = $_POST["description"];
            $date = $_POST["date"];
            $lieu = $_POST["lieu"];
            $image = $_FILES['image']['name'];
            $id_evenement = $_POST["id"];
           
            
                    
            if(isset($_FILES['image']) && preg_match("#jpeg|jpg|png|avif|pdf#", $_FILES['image']['type'])) {
                $path = "./assets/imageEvenement/";
                $photoName = $_FILES['image']['name'];
                // Déplacer le fichier téléchargé vers le répertoire de destination
                move_uploaded_file($_FILES['image']["tmp_name"], $path . $photoName); } 
    
            $db = Database::getInstance()->getConnexion();
            $requete = $db->prepare("UPDATE Evenement SET titre=:titre, description=:description, date_evenement=:date_evenement, lieu=:lieu, image=:image WHERE id=:id");
        
            $requete->bindValue(":titre", $titre);
            $requete->bindValue(':description', $description);
            $requete->bindValue(':date_evenement', $date);
            $requete->bindValue(':lieu', $lieu);
            $requete->bindValue(':image', $image);
            $requete->bindValue(':id', $id_evenement);
        
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
