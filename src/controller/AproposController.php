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

    public function  logoApropos(){
        $message = "La photo doit être de type jpeg, jpg, png, avif ou pdf";
        try {
          
            if(isset($_POST["envoyer"])){
                $logo = $_FILES["logo"]['name'];
                $images = $_FILES["images"]['name'];
                $description = $_POST["description"];
                 
                  // Créer un tableau avec les données
                $apropos = [
                    "logo"=> $logo,              
                    "images"=> $images,              
                    "description"=> $description,              
                ];  

            if(isset($_FILES['logo']) && preg_match("#jpeg|jpg|png|avif|pdf#", $_FILES['logo']['type'])) {
                $path = "./assets/logoApropos/";
                $photoName = $_FILES['logo']['name'];
                // Déplacer le fichier téléchargé vers le répertoire de destination
                move_uploaded_file($_FILES['logo']["tmp_name"], $path . $photoName);  
                    
               
            } 
    

            if(isset($_FILES['images']) && preg_match("#jpeg|jpg|png|avif|pdf#", $_FILES['images']['type'])) {
                $path = "./assets/imageApropos/";
                $photoNameImage = $_FILES['images']['name'];
                // Déplacer le fichier téléchargé vers le répertoire de destination
                move_uploaded_file($_FILES['images']["tmp_name"], $path . $photoNameImage);         
            } 
            Apropos::create($apropos);     
            header("location:compteAdmin");
            }
        } catch (\Throwable ) {
            echo $message;
        }
    
    }



    
}
