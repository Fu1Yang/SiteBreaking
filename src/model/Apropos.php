<?php

declare(strict_types=1);
namespace app\SiteBreaking\model;

class Apropos {
    private int $_id;
    private string $_logo;
    private string $_description;
    private string $_images;
  

    public function __construct(int $id, string $logo, int $description, string $images)
    {
        $this->_id = $id;
        $this->_logo = $logo;
        $this->_description = $description;
        $this->_images = $images;
     
     
   
    }

    public function getId():int{
        return $this->_id;
    }
    public function getLogo():string{
        return $this->_logo;
    }
    public function getDescription():string{
        return $this->_description;
    }
    public function getImages():string{
        return $this->_images;
    }
    public function setLogo($logo){
        $this->_logo = $logo;
    }
    
    public static function create(array $apropos):int{
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Apropos (logo,description, images) VALUES (:logo, :description, :images) ");
        $statement->execute([
            "logo"=>$apropos['logo'],
            "images"=>$apropos["images"],
            "description"=>$apropos['description'],
            
        ]);
        return (int) Database::getInstance()->getConnexion()->lastInsertId();
    }

    public static function read(int $id):?self{
        $statement = Database::getInstance()->getConnexion()->prepare("SELECT * FROM Apropos WHERE id=:id");
        $statement->execute(['id'=>$id]);

          // Étape 3: Vérification si une ligne de résultat a été retournée
          if ($row = $statement->fetch()) {
            // Étape 4: Création d'un nouvel objet Administrateur avec les données récupérées de la base de données
            $apropos = new Apropos(
                id: $row['id'],
                logo:$row(["logo"]),
                description: $row['description'],
                images: $row['images'],
            );
            // Étape 5: Retour de l'objet Administrateur
            return $apropos;
        }
        // Étape 6: Retour de null si aucun administrateur correspondant n'a été trouvé
        return null;
    }

    public static function update(Apropos $apropos):void{
        $statement = Database::getInstance()->getConnexion()->prepare("UPDATE Accueil SET logo=:logo, description=:description, nosPartenaire=:nosPartenaire, images=:images WHERE id=:id");
        $statement->execute([
            "logo"=>$apropos->getLogo(),
            "description"=>$apropos->getDescription(),
            "images"=>$apropos->getImages(),
        ]);
    }

    public static function delete(Apropos $apropos):void{
        $statement = Database::getInstance()->getConnexion()->prepare("DELETE FROM Apropos WHERE id=:id");
        $statement->execute(['id'=>$apropos->getId()]);
    }



    
    //  les Partenaires
    public static function createPartenaire($nom_partenaire, $url_partenaire) {
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Partners (partner_name, partner_url) VALUES (?, ?)");
        return $statement->execute([$nom_partenaire, $url_partenaire]);
    }


    public static function readPartenaireParId($id) {
        $statement = Database::getInstance()->getConnexion()->prepare("SELECT * FROM Partners WHERE id = ?");
        $statement->execute([$id]);
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public static function updatePartenaire($id, $nom_partenaire, $url_partenaire) {
        $statement = Database::getInstance()->getConnexion()->prepare("UPDATE Partners SET partner_name = ?, partner_url = ? WHERE id = ?");
        return $statement->execute([$nom_partenaire, $url_partenaire, $id]);
    }

    public static function deletePartenaire($id) {
        $statement = Database::getInstance()->getConnexion()->prepare("DELETE FROM Partners WHERE id = ?");
        return $statement->execute([$id]);
    }

}