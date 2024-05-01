<?php

declare(strict_types=1);
namespace app\SiteBreaking\model;
use DateTime;

class Utilisateur {

    private int $_id;
    private string $_nom_utilisateur;
    private string $_mot_de_passe;
    private string $_email;
    private string $_role;
    private ?DateTime $_date_inscription;

    public function __construct(int $id, string $nom_utilisateur, string $mot_de_passe, string $email, string $role, ?DateTime $date_inscription = null)
    {
        $this->_id = $id;
        $this->_nom_utilisateur = $nom_utilisateur;
        $this->_mot_de_passe = $mot_de_passe;
        $this->_email = $email;
        $this->_role = $role;
        $this->_date_inscription = $date_inscription ?? new DateTime();
    }

    public function getId():int{
        return $this->_id;
    }

    public function getNomUtilisateur():string{
        return  $this->_nom_utilisateur;
    }

    public function getMotDePasse():string{
        
        return $this->_mot_de_passe;
    }

    public function getEmail():string{
        return $this->_email;
    }

    public function getRole():string{
        return $this->_role;
    }


    public function getDateInscription():DateTime{
        return $this->_date_inscription;
    }

    public function setMotDePasse($mot_de_passe): void {
        $mot_de_passe_hashed = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        $this->_mot_de_passe = $mot_de_passe_hashed;
    }
    

    public static function list(): \ArrayObject {
        $liste = new \ArrayObject();
        $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM Utilisateur;');
        $statement->execute();
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) { //le résultat sous forme de tableau associatif 
            $liste->append(new Utilisateur(
                (int)$row['id'],
                $row['nom_utilisateur'], 
                $row['mot_de_passe'], 
                $row['email'], 
                $row["role"],
                new DateTime($row['date_inscription'])
            ));
        }
        return $liste;
    }

  

    public static function create(Utilisateur $utilisateur, $mot_de_passe):int {
        //pour définir le mot de passe
        $utilisateur->setMotDePasse($mot_de_passe);

        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Utilisateur (nom_utilisateur, mot_de_passe, email, date_inscription) VALUES(:nom_utilisateur,:mot_de_passe,:email,:date_inscription);");
        
        //pour obtenir le mot de passe
        $mot_de_passe = $utilisateur->getMotDePasse();
        
        $statement->execute([
            "nom_utilisateur"=>$utilisateur->getNomUtilisateur(), 
            "mot_de_passe"=>$mot_de_passe, 
            "email"=>$utilisateur->getEmail(), 
            "date_inscription"=>$utilisateur->getDateInscription()]);
    
        return (int) Database::getInstance()->getConnexion()->lastInsertId();
    }

    public static function read(int $id): ?self{
        $statement = Database::getInstance()->getConnexion()->prepare("SELECT * FROM Utilisateur WHERE id =:id ");
        $statement->execute(['id'=>$id]);

        if ($row = $statement->fetch()) {
            $utilisateur = new Utilisateur(
                id:$row["id"],
                nom_utilisateur:$row["nom_utilisateur"],
                mot_de_passe:$row["mot_de_passe"],
                email:$row["email"],
                role:$row["role"],
                date_inscription:$row["date_inscription"]);
            
            return $utilisateur;    
        }
        return null;
    }

    public static function update(Utilisateur $utilisateur):void {
        $statement = Database::getInstance()->getConnexion()->prepare("UPDATE Utilisateur SET nom_utilisateur=:nom_utilisateur, mot_de_passe=:mot_de_passe, email=:email, date_inscription=:date_inscription WHERE id=:id");
        $statement->execute(["nom_utilisateur"=>$utilisateur->getNomUtilisateur(), "mot_de_passe"=>$utilisateur->getMotDePasse(), "email"=>$utilisateur->getEmail(), "date_inscription"=>$utilisateur->getDateInscription(), "id"=>$utilisateur->getId()]);
    }

    public static function delete(Utilisateur $utilisateur):void {
        $statement = Database::getInstance()->getConnexion()->prepare("DELETE FROM Utilisateur WHERE id=:id");
        $statement->execute(["id"=>$utilisateur->getId()]);
    }


    public function Seconnecter(string $email, string $mot_de_passe){
        $connexion = Database::getInstance()->getConnexion()->prepare("SELECT * FROM Utilisateur WHERE email = :email ");
        $connexion->execute(["email"=>$email]);

        if ($row = $connexion->fetch()) {
            if (password_verify($mot_de_passe,$row["mot_de_passe"])) {
                return new Utilisateur(id:$row["id"],
                nom_utilisateur:$row["nom_utilisateur"],
                mot_de_passe:$row["mot_de_passe"],
                email:$row["email"],
                role:$row["role"],
                date_inscription:$row["date_inscription"]);
        }else
            return null;
    }
    return null;
}




}