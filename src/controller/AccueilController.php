<?php
declare(strict_types=1);

namespace app\SiteBreaking\controller;
use app\SiteBreaking\model\Photo;
use app\SiteBreaking\model\Accueil;
use app\SiteBreaking\model\Database;

class AccueilController extends BaseController {
    public function index():void {
        $this->view("accueil/index");
    }

    public function accueilAdmin() {
        $this->view("accueil/accueilAdmin");
    }

    public function accueilPhotoCarousel() {
     

        if (isset($_FILES['photos']) && preg_match("#jpeg|jpg|png|pdf#", $_FILES['photos']['type'])) {
         
            $path = "./assets/images/";
          
            $photoName = $_FILES['photos']['name'];
        
            // Créer une instance de la classe Photo avec les données nécessaires
            $photo = new Photo($photoName);
          
            $photo->setNom($photoName);
          
            // Appeler la méthode create avec l'instance de Photo en paramètre
            Photo::create($photo);
          
            // Déplacer le fichier téléchargé vers le répertoire de destination
            move_uploaded_file($_FILES['photos']["tmp_name"], $path . $photoName);
          
            header("location:compteAdmin");
        } 
        else {
            $message = "La photo doit être de type jpeg, jpg, png ou pdf";
          echo $message;
        }
    
    
    }

    public function  accueilCarte(){
        $message = "La photo doit être de type jpeg, jpg, png ou pdf";
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

        
                
            if(isset($_FILES['image']) && preg_match("#jpeg|jpg|png|pdf#", $_FILES['image']['type'])) {
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
  

}
