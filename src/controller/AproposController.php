<?php
declare(strict_types=1);

namespace app\SiteBreaking\controller;

use app\SiteBreaking\model\Apropos;

class AproposController extends BaseController {
    public function index():void {
        $this->view("apropos/index");
    }

    public function aproposAdmin():void {
        $this->view("apropos/aproposAdmin");
    }

    public function  aproposLogo(){
        $message = "La photo doit être de type jpeg, jpg, png, avif ou pdf";
        try {
          
            if(isset($_POST["envoyer"])){
                $logo = $_POST["logo"];
                $description = $_POST["description"];
                $nosPartenaire = $_POST["nosPartenaire"];
                $images = $_FILES['images']['name'];
              
              
                  // Créer un tableau avec les données
                $apropos = [
                    "logo"=> $logo,
                    "description"=> $description,
                    "nosPartenaire"=> $nosPartenaire,
                    "images"=> $images,
                    
                ];

        
                
            if(isset($_FILES['image']) && preg_match("#jpeg|jpg|png|avif|pdf#", $_FILES['image']['type'])) {
                $path = "./assets/logo/";
                $photoName = $_FILES['images']['name'];
                // Déplacer le fichier téléchargé vers le répertoire de destination
                move_uploaded_file($_FILES['images']["tmp_name"], $path . $photoName);
            
                
            } 
            Apropos::create($apropos);     
            header("location:compteAdmin");
            }
        } catch (\Throwable ) {
            echo $message;
        }
    
    }
}
