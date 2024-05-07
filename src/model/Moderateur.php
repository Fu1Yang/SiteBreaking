<?php

declare(strict_types=1);
namespace app\SiteBreaking\model;

class Moderateur {

    private int $_id;
    private Utilisateur $_utilisateur_id;
    private Utilisateur $_nom_utilisateur;
    private Utilisateur $_prenom_utilisateur;
    private string $_permissions;

    public function __construct(Utilisateur $utilisateur_id, Utilisateur $nom_utilisateur, Utilisateur $prenom_utilisateur, string $permissions = null, int $id = 0){
        $this->_id = $id;
        $this->_utilisateur_id = $utilisateur_id;
        $this->_nom_utilisateur = $nom_utilisateur;
        $this->_prenom_utilisateur = $prenom_utilisateur;
        $this->_permissions = $permissions;
    }

    public function getId():int{
        return $this->_id;
    }

    public function getNomUtilisateur():Utilisateur{
        return $this->_nom_utilisateur;
    }

    public function getUtilisateurId(): ?int {
        if ($this->_utilisateur_id instanceof Utilisateur) {
            return $this->_utilisateur_id->getId();
        }
        return null;
    }
    

    public function getPrenomUtilisateur():Utilisateur{
        return $this->_prenom_utilisateur;
    }

    public function getPermissions():string{
        return $this->_permissions;
    }

    public static function create(Moderateur $moderateur):int {
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Moderateur (nom_utilisateur, mot_de_passe, prenom_utilisateur, permissions) VALUE (:nom_utilisateur,:mot_de_passe,:prenom_utilisateur,:permissions)");
        $statement->execute([
            "nom_utilisateur"=>$moderateur->getNomUtilisateur(),
            'utilisateur_id' => $moderateur->getUtilisateurId(),
            "prenom_utilisateur"=>$moderateur->getPrenomUtilisateur(),
            "permissions"=>$moderateur->getPermissions()]);
        return (int) Database::getInstance()->getConnexion()->lastInsertId();
    }

    public static function read(int $id): ?self {
        $statement = Database::getInstance()->getConnexion()->prepare("SELECT * FROM Moderateur WHERE id=:id ");
        $statement->execute(["id"=>$id]);
        if ($row = $statement->fetch()) {
            $moderateur = new Moderateur(
                id:$row["id"],
                utilisateur_id:$row["utilisateur_id"],
                nom_utilisateur:$row["nom_utilisateur"],   
                prenom_utilisateur:$row["prenom_utilisateur"],
                permissions:$row["permissions"]
            );
            return $moderateur;
        }
        return null;
    }

    public static function update(Moderateur $moderateur):void{
        $statement = Database::getInstance()->getConnexion()->prepare("UPDATE Moderateur SET nom_utilisateur=:nom_utilisateur,mot_de_passe=:mot_de_passe,role=:role;permissions=:permissions WHERE id=:id");
        $statement->execute([ 
            "nom_utilisateur"=>$moderateur->getNomUtilisateur(),
            "utilisateur_id"=>$moderateur->getUtilisateurId(),
            "prenom_utilisateur"=>$moderateur->getPrenomUtilisateur(),
            "permissions"=>$moderateur->getPermissions()]);
    }

    public static function delete(Moderateur $moderateur):void{
        $statement = Database::getInstance()->getConnexion()->prepare("DELETE FROM Moderateur WHERE id=:id");
        $statement->execute(["id"=>$moderateur->getId()]);
    }
}