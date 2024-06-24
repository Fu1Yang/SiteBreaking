<?php

declare(strict_types=1);
namespace app\SiteBreaking\model;

class Contact {
    private int $_id;
    private string $_adresse;
    private string $_numeroDeTel;
    private string $_email;
    private string $_description;
    private string $_jour;
    private string $_niveauEtStyle;
  

    public function __construct(int $id, string $adresse, string $numeroDeTel, string $email, string $description, string $jour, string $niveauEtStyle)
    {
        $this->_id = $id;
        $this->_adresse = $adresse;
        $this->_numeroDeTel = $numeroDeTel;
        $this->_email = $email;
        $this->_description = $description;
        $this->_jour = $jour;
        $this->_niveauEtStyle = $niveauEtStyle;
     
     
   
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

    public function getDescription():string{
        return $this->_description;
    }
    public function getJour():string{
        return $this->_jour;
    }

    public function getNiveauEtStyle():string{
        return $this->_niveauEtStyle;
    }
 
    
    public static function create(array $contact):int{
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Contact (adresse,numeroDeTel, email,description, jour, niveauEtStyle) VALUES (:adresse, :numeroDeTel, :email,:description, :jour,:niveauEtStyle) ");
        $statement->execute([
            "adresse"=>$contact["adresse"],
            "numeroDeTel"=>$contact['numeroDeTel'],
            "email"=>$contact["email"],
            "description"=>$contact["description"],
            "jour"=>$contact["jour"],
            "niveauEtStyle"=>$contact["niveauEtStyle"],
            
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
                adresse:$row["adresse"],
                numeroDeTel: $row['numeroDeTel'],
                email: $row['email'],
                description: $row['description'],
                jour: $row["jour"],
                niveauEtStyle: $row["niveauEtStyle"]
            );
            // Étape 5: Retour de l'objet Administrateur
            return $contact;
        }
        // Étape 6: Retour de null si aucun administrateur correspondant n'a été trouvé
        return null;
    }

    public static function update(Contact $contact):void{
        $statement = Database::getInstance()->getConnexion()->prepare("UPDATE Contact SET adresse=:adresse, numeroDeTel=:numeroDeTel, email=:email, description=:description, jour=:jour, niveauEtStyle=:niveauEtStyle WHERE id=:id");
        $statement->execute([
            "adresse"=>$contact->getAdresse(),
            "numeroDeTel"=>$contact->getNumeroDetel(),
            "email"=>$contact->getEmail(),
            "description"=>$contact->getDescription(),
            "jour"=>$contact->getJour(),
            "niveauEtStyle"=>$contact->getNiveauEtStyle(),
        ]);
    }

    public static function delete(Contact $contact):void{
        $statement = Database::getInstance()->getConnexion()->prepare("DELETE FROM Contact WHERE id=:id");
        $statement->execute(['id'=>$contact->getId()]);
    }


}