<?php
declare(strict_types=1);

namespace app\SiteBreaking\controller;
use app\SiteBreaking\model\Photo;
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
    
    
    
}


