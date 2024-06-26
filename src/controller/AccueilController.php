<?php
declare(strict_types=1);

namespace app\SiteBreaking\controller;
use app\SiteBreaking\model\Photo;
use app\SiteBreaking\model\Accueil;
use app\SiteBreaking\model\Database;
use app\SiteBreaking\model\Visiteur;


class AccueilController extends BaseController {
    public function index():void {
        Visiteur::cookie();
        $this->view("accueil/index");
    }

    public function accueilAdmin() {
        $this->view("accueil/accueilAdmin");
    }

    public function accueilPhotoCarousel() {
     

        if (isset($_FILES['PhotosCarrousel']) && preg_match("#jpeg|jpg|png|avif|pdf#", $_FILES['PhotosCarrousel']['type'])) {
         
            $path = "./assets/images/";
          
            $photoName = $_FILES['PhotosCarrousel']['name'];
        
            // une instance de la classe Photo avec les données nécessaires
            $photo = new Photo($photoName);
          
            $photo->setNom($photoName);
          
            // Appeler la méthode create avec l'instance de Photo en paramètre
            Photo::create($photo);
          
            // Déplacer le fichier téléchargé vers le répertoire de destination
            move_uploaded_file($_FILES['PhotosCarrousel']["tmp_name"], $path . $photoName);
          
            header("location:compteAdmin");
        } 
        else {
            $message = "La photo doit être de type jpeg, jpg, png, avif ou pdf";
          echo $message;
        }
    
    
    }

    public function  accueilCarte(){
        $message = "La photo doit être de type jpeg, jpg, png, avif ou pdf";
        try {
          
            if(isset($_POST["envoyer"])){
                $evenementRealiser = $_POST["evenementRealiser"];
                $titre = $_POST["titre"];
                $nom = $_POST["nom"];
                $image = $_FILES['image']['name'];
                $text = $_POST["text"];
              
                  // Créer un tableau avec les données
                $accueil = [
                    "evenementRealiser"=> $evenementRealiser,
                    "titre"=> $titre,
                    "nom"=> $nom,
                    "image"=> $image,
                    "text"=> $text
                ];

        
                
            if(isset($_FILES['image']) && preg_match("#jpeg|jpg|png|avif|pdf#", $_FILES['image']['type'])) {
                $path = "./assets/logo/";
                $photoName = $_FILES['image']['name'];
                // Déplacer le fichier téléchargé vers le répertoire de destination
                move_uploaded_file($_FILES['image']["tmp_name"], $path . $photoName);
            
                
            } 
            Accueil::create($accueil);     
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
            $accueil = Accueil::read($userId);
            if ($accueil) {
                $accueil->delete($accueil);
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
    $this->view("compteAdmin/modifier/modifierAccueil");
}

public function updateAccueil($id) {
    if (isset($_POST["evenementRealiser"]) && isset($_POST["titre"]) && isset($_POST["nom"]) && isset($_FILES['image']['name']) && isset($_POST["text"])) {
        $evenementRealiser = $_POST["evenementRealiser"];
        $titre = $_POST["titre"];
        $nom = $_POST["nom"];
        $image = $_FILES['image']['name'];
        $text = $_POST["text"];
        $id_client = $_POST["id"];
        
                
        if(isset($_FILES['image']) && preg_match("#jpeg|jpg|png|avif|pdf#", $_FILES['image']['type'])) {
            $path = "./assets/logo/";
            $photoName = $_FILES['image']['name'];
            // Déplacer le fichier téléchargé vers le répertoire de destination
            move_uploaded_file($_FILES['image']["tmp_name"], $path . $photoName); } 

        $db = Database::getInstance()->getConnexion();
        $requete = $db->prepare("UPDATE Accueil SET evenementRealiser=:evenementRealiser, titre=:titre, nom=:nom, image=:image, text=:text WHERE id=:id");
    
        $requete->bindValue(":evenementRealiser", $evenementRealiser);
        $requete->bindValue(':titre', $titre);
        $requete->bindValue(':nom', $nom);
        $requete->bindValue(':image', $image);
        $requete->bindValue(':text', $text);
        $requete->bindValue(':id', $id_client);
    
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

public function deletePhoto($id) {
    // Vérifier si un ID est passé en POST
    if (!empty($_POST["id"])) {
        // Récupérer l'ID de la photo à supprimer
        $photoId = intval($_POST["id"]); // Convertir en entier

        // Récupérer les informations sur la photo à supprimer
        $photo = Photo::read($photoId);

        // Vérifier si la photo existe
        if ($photo) {
            // Supprimer le fichier de la photo du répertoire
            $photoFilePath = './assets/images/' . $photo->getNom();
            if (file_exists($photoFilePath)) {
                if (unlink($photoFilePath)) {
                    // Supprimer la photo de la base de données
                    if ($photo->delete($photo)) {
                        // Rediriger vers la page du compte admin après la suppression réussie
                        $this->redirectTo("/compteAdmin");
                    } else {
                        return "Erreur lors de la suppression de la photo de la base de données.";
                    }
                } else {
                    return 'Erreur lors de la suppression du fichier ' . $photoFilePath . '.';
                }
            } else {
                return 'Le fichier ' . $photoFilePath . ' n\'existe pas.';
            }
        } else {
            return "L'élément qui correspond à la photo n'a pas été trouvé.";
        }
    }
}

}