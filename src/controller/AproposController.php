<?php
declare(strict_types=1);

namespace app\SiteBreaking\controller;

use app\SiteBreaking\model\Apropos;
use app\SiteBreaking\model\Database;
use app\SiteBreaking\model\Partenaire;

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

    public function partenairesApropos(){
        $message = "La photo doit être de type jpeg, jpg, png, avif ou pdf.";
        try {
            if (isset($_POST["envoyer"])) {
                if (!isset($_FILES['imagePartenaire']) || $_FILES['imagePartenaire']['error'] !== UPLOAD_ERR_OK) {
                    throw new \Exception("Erreur lors du téléchargement du fichier.");
                }
    
                $typesAutorises = ['image/jpeg', 'image/jpg', 'image/png', 'image/avif', 'application/pdf'];
                $typeFichier = $_FILES['imagePartenaire']['type'];
    
                if (!in_array($typeFichier, $typesAutorises)) {
                    throw new \Exception($message);
                }
    
                $nomPartenaire = $_FILES["imagePartenaire"]['name'];
                $lienPartenaire = $_POST["leLien"];
    
                // Créer un tableau avec les données
                $partenaire = [
                    "partner_name" => $nomPartenaire,
                    "partner_url" => $lienPartenaire,
                ];
    
                $chemin = "./assets/NosPartenaires/";
                $nomPhoto = basename($_FILES['imagePartenaire']['name']);
                $destination = $chemin . $nomPhoto;
    
                // Déplacer le fichier téléchargé vers le répertoire de destination
                if (!move_uploaded_file($_FILES['imagePartenaire']["tmp_name"], $destination)) {
                    throw new \Exception("Erreur lors du déplacement du fichier téléchargé.");
                }
    
                // Appel de la méthode create pour insérer le partenaire dans la base de données
                Partenaire::create($partenaire);
                header("Location: compteAdmin");
                exit();
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function update(){
        $this->view("compteAdmin/modifier/modifierApropos");
    }

    public function modifier($id){
        if (isset($_FILES["logo"]['name']) && isset($_FILES["image"]['name']) && isset($_POST["description"])) {
            $logo = $_FILES["logo"]['name'];
            $images = $_FILES["image"]['name'];
            $description = $_POST["description"];
            $id_apropos = $_POST["id"];
    
                      
        if(isset($_FILES['image']) && preg_match("#jpeg|jpg|png|avif|pdf#", $_FILES['image']['type'])) {
            $path = "./assets/imageApropos/";
            $photoName = $_FILES['image']['name'];
            // Déplacer le fichier téléchargé vers le répertoire de destination
            move_uploaded_file($_FILES['image']["tmp_name"], $path . $photoName); } 

        if(isset($_FILES['logo']) && preg_match("#jpeg|jpg|png|avif|pdf#", $_FILES['logo']['type'])) {
            $path = "./assets/logoApropos/";
            $photoName = $_FILES['logo']['name'];
            move_uploaded_file($_FILES['logo']["tmp_name"], $path . $photoName); }     

            $db = Database::getInstance()->getConnexion();
            $requete = $db->prepare("UPDATE Apropos SET logo=:logo, images=:images, description=:description WHERE id=:id");
        
            $requete->bindValue(":logo", $logo);
            $requete->bindValue(':images', $images);
            $requete->bindValue(':description', $description);
            $requete->bindValue(':id', $id_apropos);
        
        
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

    public function delete($id){
        
        $message = "L'élément selectionner na pas peu étre supprimer";
        try {
            if (!empty($_POST["id"])) {
                
                $idUser = intval($_POST["id"]);
                
                $apropos = Apropos::read($idUser);
                if ($apropos) {
                    $apropos->delete($apropos);
                }else {
                   return "l'élément qui corresponde a Apropos non trouvé.";
                }
                $this->redirectTo("/compteAdmin");
            }
            else {
                return "Votre Id est vide";
            }
           
        } 
        catch (\Throwable $th) {
            return $message;
        }
    }

    
}
