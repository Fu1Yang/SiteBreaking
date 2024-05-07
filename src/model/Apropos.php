<?php

declare(strict_types=1);
namespace app\SiteBreaking\model;

class Apropos {
    private int $_id;
    private string $_logo;
    private string $_description;
    private string $_nosPartenaire;
  

    public function __construct(int $id, string $logo, int $description, string $nosPartenaire)
    {
        $this->_id = $id;
        $this->_logo = $logo;
        $this->_description = $description;
        $this->_nosPartenaire = $nosPartenaire;
     
     
   
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
    public function getNosPartenaire():string{
        return $this->_nosPartenaire;
    }
 
    
    public static function create(Apropos $apropos):int{
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Apropos (logo,description, nosPartenaire) VALUES (:logo, :description, :nosPartenaire,) ");
        $statement->execute([
            "logo"=>$apropos->getLogo(),
            "description"=>$apropos->getDescription(),
            "nosPartenaire"=>$apropos->getNosPartenaire(),
            
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
                nosPartenaire: $row['nosPartenaire'],
            );
            // Étape 5: Retour de l'objet Administrateur
            return $apropos;
        }
        // Étape 6: Retour de null si aucun administrateur correspondant n'a été trouvé
        return null;
    }

    public static function update(Apropos $apropos):void{
        $statement = Database::getInstance()->getConnexion()->prepare("UPDATE Accueil SET logo=:logo, description=:description, nosPartenaire=:nosPartenaire WHERE id=:id");
        $statement->execute([
            "logo"=>$apropos->getLogo(),
            "description"=>$apropos->getDescription(),
            "nosPartenaire"=>$apropos->getNosPartenaire(),
        ]);
    }

    public static function delete(Apropos $apropos):void{
        $statement = Database::getInstance()->getConnexion()->prepare("DELETE FROM Apropos WHERE id=:id");
        $statement->execute(['id'=>$apropos->getId()]);
    }


}