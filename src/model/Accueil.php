<?php

declare(strict_types=1);
namespace app\SiteBreaking\model;

class Accueil {
    private int $_id;
    private string $_image;
    private int $_evenementRealiser;
    private string $_titre;
    private string $_nom;
    private string $_text;
 

    public function __construct(int $id, string $image, int $evenementRealiser, string $titre, string $nom, string $text)
    {
        $this->_id = $id;
        $this->_image = $image;
        $this->_evenementRealiser = $evenementRealiser;
        $this->_titre = $titre;
        $this->_nom = $nom;
        $this->_text = $text;
     
   
    }

    public function getId():int{
        return $this->_id;
    }
    public function getImage():string{
        return $this->_image;
    }
    public function getEvenementRealisateur():int{
        return $this->_evenementRealiser;
    }
    public function getTitre():string{
        return $this->_titre;
    }
    public function getNom():string{
        return $this->_nom;
    }
    public function getText():string{
        return $this->_text;
    }
    
    public static function create(Accueil $accueil):int{
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Accueil (image,evenementRealiser, titre,nom,text) VALUES (:image, :evenementRealiser, :titre, :nom, :text) ");
        $statement->execute([
            "image"=>$accueil->getImage(),
            "evenementRealiser"=>$accueil->getEvenementRealisateur(),
            "titre"=>$accueil->getTitre(),
            "nom"=>$accueil->getNom(),
            "text"=>$accueil->getText(),
        ]);
        return (int) Database::getInstance()->getConnexion()->lastInsertId();
    }

    public static function read(int $id):?self{
        $statement = Database::getInstance()->getConnexion()->prepare("SELECT * FROM Accueil WHERE id=:id");
        $statement->execute(['id'=>$id]);

          // Étape 3: Vérification si une ligne de résultat a été retournée
          if ($row = $statement->fetch()) {
            // Étape 4: Création d'un nouvel objet Administrateur avec les données récupérées de la base de données
            $accueil = new Accueil(
                id: $row['id'],
                image:$row(["image"]),
                evenementRealiser: $row['evenementRealiser'],
                titre: $row['titre'],
                nom: $row['nom'],
                text: $row['text'],
            );
            // Étape 5: Retour de l'objet Administrateur
            return $accueil;
        }
        // Étape 6: Retour de null si aucun administrateur correspondant n'a été trouvé
        return null;
    }

    public static function update(Accueil $accueil):void{
        $statement = Database::getInstance()->getConnexion()->prepare("UPDATE Accueil SET image=:image, evenementRealiser=:evenementRealiser, titre=:titre, nom=:nom WHERE id=:id");
        $statement->execute([
            "image"=>$accueil->getImage(),
            "evenementRealiser"=>$accueil->getEvenementRealisateur(),
            "titre"=>$accueil->getTitre(),
            "nom"=>$accueil->getNom(),
            "text"=>$accueil->getText(),
        ]);
    }

    public static function delete(Accueil $accueil):void{
        $statement = Database::getInstance()->getConnexion()->prepare("DELETE FROM Accueil WHERE id=:id");
        $statement->execute(['id'=>$accueil->getId()]);
    }


}