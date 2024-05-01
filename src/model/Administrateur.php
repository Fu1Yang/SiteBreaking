<?php

declare(strict_types=1);
namespace app\SiteBreaking\model;

class Administrateur{
    private int $_id;
    private Utilisateur $_nom_utilisateur;
    private Utilisateur $_utilisateur_id;
    private string $_role;
    private string $_permissions;

    public function __construct(int $id, string $nom_utilisateur, string $role, string $permissions)
    {
        $this->_id = $id;
        $this->_nom_utilisateur = $nom_utilisateur;
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

    public function getPermisions():string{
        return $this->_permissions;
    }

    public static function create(Administrateur $administrateur, Utilisateur $utilisateur): int {
        // Étape 1: Préparation de la requête SQL pour insérer un nouvel administrateur dans la base de données
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Administrateur(nom_utilisateur, role, utilisateur_id, permissions) VALUES (:nom_utilisateur, :role, :utilisateur_id, :permissions)");
    
        // Étape 2: Exécution de la requête SQL avec les valeurs de l'objet Administrateur
        $statement->execute([
            'nom_utilisateur' => $administrateur->getNomUtilisateur(),
            'utilisateur_id' => $utilisateur->getId(),
            'role' => $administrateur->getRole(),
            'permissions' => $administrateur->getPermisions()
        ]);
    
        // Étape 3: Retour de l'identifiant du dernier enregistrement inséré dans la base de données
        return (int)Database::getInstance()->getConnexion()->lastInsertId();
    }
    


    public static function read(int $id): ?self  {
        // Étape 1: Préparation de la requête SQL pour sélectionner l'administrateur avec l'identifiant spécifié
        $statement = Database::getInstance()->getConnexion()->prepare("SELECT * FROM Administrateur WHERE id = :id;");
        // Étape 2: Exécution de la requête SQL avec l'identifiant comme paramètre
        $statement->execute(['id'=>$id]);
    
        // Étape 3: Vérification si une ligne de résultat a été retournée
        if ($row = $statement->fetch()) {
            // Étape 4: Création d'un nouvel objet Administrateur avec les données récupérées de la base de données
            $administrateur = new Administrateur(
                id: $row['id'],
                nom_utilisateur: $row['nom_utilisateur'],
                role: $row['role'],
                permissions: $row['permissions']
            );
            $administrateur->utilisateur_id();
            // Étape 5: Retour de l'objet Administrateur
            return $administrateur;
        }
        // Étape 6: Retour de null si aucun administrateur correspondant n'a été trouvé
        return null;
    }
    
    public static function update(Administrateur $administrateur, Utilisateur $utilisateur):void{
        $statement = Database::getInstance()->getConnexion()->prepare("UPDATE Administrateur SET nom_utilisateur=:nom_utilisateur, utilisateur_id=:utilisateur_id, role=:role, permissions=:permissions WHERE id=:id");
        $statement->execute([
            'nom_utilisateur'=>$utilisateur->getNomUtilisateur(),
            "utilisateur_id"=>$utilisateur->getId(),
            'role'=>$administrateur->getRole(),
            'permissions'=>$administrateur->getPermisions()
        ]);
    }

    public static function delete(Administrateur $administrateur):void{
        $statement = Database::getInstance()->getConnexion()->prepare("DELETE FROM Administrateur WHERE id=:id");
        $statement->execute(['id'=>$administrateur->getId()]);
    }


}