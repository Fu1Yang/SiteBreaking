<?php

declare(strict_types=1);
namespace app\SiteBreaking\model;

class Contact {
    private int $_id;
    private string $_adresse;
    private string $_numeroDeTel;
    private string $_email;
    private string $_horaire;
  

    public function __construct(int $id, string $adresse, int $numeroDeTel, string $email, string $horaire)
    {
        $this->_id = $id;
        $this->_adresse = $adresse;
        $this->_numeroDeTel = $numeroDeTel;
        $this->_email = $email;
        $this->_horaire = $horaire;
     
     
   
    }

    public function getId():int{
        return $this->_id;
    }
    public function getAdresse():string{
        return $this->_adresse;
    }
    public function getNumeroDetel():string{
        return $this->_numeroDeTel;
    }
    public function getEmail():string{
        return $this->_email;
    }

    public function getHoraire():string{
        return $this->_horaire;
    }
 
    
    public static function create(Contact $contact):int{
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Contact (adresse,numeroDeTel, email,horaire) VALUES (:adresse, :numeroDeTel, :email,horaire) ");
        $statement->execute([
            "adresse"=>$contact->getAdresse(),
            "numeroDeTel"=>$contact->getNumeroDetel(),
            "email"=>$contact->getEmail(),
            "horaire"=>$contact->getHoraire(),
            
        ]);
        return (int) Database::getInstance()->getConnexion()->lastInsertId();
    }

    public static function read(int $id):?self{
        $statement = Database::getInstance()->getConnexion()->prepare("SELECT * FROM Contact WHERE id=:id");
        $statement->execute(['id'=>$id]);

          // Étape 3: Vérification si une ligne de résultat a été retournée
          if ($row = $statement->fetch()) {
            // Étape 4: Création d'un nouvel objet Administrateur avec les données récupérées de la base de données
            $contact = new Contact(
                id: $row['id'],
                adresse:$row(["adresse"]),
                numeroDeTel: $row['numeroDeTel'],
                email: $row['email'],
                horaire: $row['horaire'],
            );
            // Étape 5: Retour de l'objet Administrateur
            return $contact;
        }
        // Étape 6: Retour de null si aucun administrateur correspondant n'a été trouvé
        return null;
    }

    public static function update(Contact $contact):void{
        $statement = Database::getInstance()->getConnexion()->prepare("UPDATE Contact SET logo=:logo, description=:description, nosPartenaire=:nosPartenaire WHERE id=:id");
        $statement->execute([
            "adresse"=>$contact->getAdresse(),
            "numeroDeTel"=>$contact->getNumeroDetel(),
            "email"=>$contact->getEmail(),
            "horaire"=>$contact->getHoraire(),
        ]);
    }

    public static function delete(Contact $contact):void{
        $statement = Database::getInstance()->getConnexion()->prepare("DELETE FROM Contact WHERE id=:id");
        $statement->execute(['id'=>$contact->getId()]);
    }


}