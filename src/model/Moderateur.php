<?php

declare(strict_types=1);
namespace app\SiteBreaking\model;

class Moderateur {

    private int $_id;
    private Utilisateur $_nom_utilisateur;
    private Utilisateur $_utilisateur_id;
    private string $_role;
    private string $_permissions;

    public function __construct(int $id, string $nom_utilisateur, string $role, string $permissions){
        $this->_id = $id;
        $this->_nom_utilisateur = $nom_utilisateur;
      ;
        $this->_role = $role;
        $this->_permissions = $permissions;
    }

    public function getId():int{
        return $this->_id;
    }

    public function getNomUtilisateur():Utilisateur{
        return $this->_nom_utilisateur;
    }

    public function utilisateur_id(): ?int {
        if ($this->_utilisateur_id instanceof Utilisateur) {
            return $this->_utilisateur_id->getId();
        }
        return null;
    }
    

    public function getRole():string{
        return $this->_role;
    }

    public function getPermissions():string{
        return $this->_permissions;
    }

    public static function create(Moderateur $moderateur, Utilisateur $utilisateur):int {
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Moderateur (nom_utilisateur, mot_de_passe, role, permissions) VALUE (:nom_utilisateur,:mot_de_passe,:role,:permissions)");
        $statement->execute([
            "nom_utilisateur"=>$moderateur->getNomUtilisateur(),
            'utilisateur_id' => $utilisateur->getId(),
            "role"=>$moderateur->getRole(),
            "permissions"=>$moderateur->getPermissions()]);
        return (int) Database::getInstance()->getConnexion()->lastInsertId();
    }

    public static function read(int $id): ?self {
        $statement = Database::getInstance()->getConnexion()->prepare("SELECT * FROM Moderateur WHERE id=:id ");
        $statement->execute(["id"=>$id]);
        if ($row = $statement->fetch()) {
            $moderateur = new Moderateur(
                id:$row["id"],
                nom_utilisateur:$row["nom_utilisateur"],   
                role:$row["role"],
                permissions:$row["permissions"]
            );
            $moderateur->utilisateur_id();
            return $moderateur;
        }
        return null;
    }

    public static function update(Moderateur $moderateur, Utilisateur $utilisateur):void{
        $statement = Database::getInstance()->getConnexion()->prepare("UPDATE Moderateur SET nom_utilisateur=:nom_utilisateur,mot_de_passe=:mot_de_passe,role=:role;permissions=:permissions WHERE id=:id");
        $statement->execute([ 
            "nom_utilisateur"=>$utilisateur->getNomUtilisateur(),
            "utilisateur_id"=>$utilisateur->getId(),
            "role"=>$moderateur->getRole(),
            "permissions"=>$moderateur->getPermissions()]);
    }

    public static function delete(Moderateur $moderateur):void{
        $statement = Database::getInstance()->getConnexion()->prepare("DELETE FROM Moderateur WHERE id=:id");
        $statement->execute(["id"=>$moderateur->getId()]);
    }
}