<?php

declare(strict_types=1);
namespace app\SiteBreaking\model;

class Visiteur {
    private int $_id;
    private string $_session_id;
    private string $_nom_utilisateur;
    private string $_mot_de_passe;
    private string $_email;

    public function __construct(int $id, string $session_id, string $nom_utilisateur, string $mot_de_passe, string $email)
    {
        $this->_id = $id;
        $this->_session_id = $session_id;
        $this->_nom_utilisateur = $nom_utilisateur;
        $this->_mot_de_passe = $mot_de_passe;
        $this->_email = $email;
    }


    public function getId():int{
        return $this->_id;
    }
    public function getSessionId():string{
        return $this->_session_id;
    }
    public function getNomUtilisateur():string{
        return $this->_nom_utilisateur;
    }
    public function getMotDePasse():string{
        return $this->_mot_de_passe;
    }
    public function getEmail():string{
        return $this->_email;
    }

    public static function  create(Visiteur $visiteur):int{
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Visiteur(session_id,nom_utilisateur,mot_de_passe,email) VALUES (:session_id,:nom_utilisateur,:mot_de_passe,:email)");
        $statement->execute([
            "session_id"=>$visiteur->getSessionId(),
            "nom_utilisateur"=>$visiteur->getNomUtilisateur(),
            "mot_de_passe"=>$visiteur->getMotDePasse(),
            "email"=>$visiteur->getEmail(),]);
            return (int) Database::getInstance()->getConnexion()->lastInsertId();
    }

    public static function read(int $id): ?self{
        $statement = Database::getInstance()->getConnexion()->prepare("SELECT * FROM Visiteur WHERE id=:id");
        $statement->execute(['id'=>$id]);
        if ($row = $statement->fetch()) {
            $visiteur = new Visiteur(
                id:$row["id"],
                session_id:$row["session_id"],
                nom_utilisateur:$row["nom_utilisateur"],
                mot_de_passe:$row["mot_de_passe"],
                email:$row["email"]
            );
            return $visiteur;     
        };
        return null;
    }

    public static function update(Visiteur $visiteur):void{
        $statement = Database::getInstance()->getConnexion()->prepare("UPDATE Visiteur SET session_id=:session_id,nom_utilisateur=:nom_utilisateur,mot_de_passe=:mot_de_passe,email=:email WHERE id=:id");
        $statement->execute([
            "session_id"=>$visiteur->getSessionId(),
            "nom_utilisateur"=>$visiteur->getNomUtilisateur(),
            "mot_de_passe"=>$visiteur->getMotDePasse(),
            "email"=>$visiteur->getEmail(),
        ]);
    }

    public static function delete(Visiteur $visiteur):void{
        $statement = Database::getInstance()->getConnexion()->prepare("DELETE FROM Visiteur WHERE id=:id");
        $statement->execute(["id"=>$visiteur->getId()]);
    }

}