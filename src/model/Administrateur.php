<?php

declare(strict_types=1);
namespace app\SiteBreaking\model;

class Administrateur{
    private int $_id;
    private Utilisateur $_utilisateur_id;
    private ?Utilisateur $_nom_utilisateur;
    private ?Utilisateur $_prenom_utilisateur;
    private ?string $_permissions;

    public function __construct(Utilisateur $utilisateur_id, Utilisateur $nom_utilisateur, Utilisateur $prenom_utilisateur, string $permissions = null, int $id = 0)
    {
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

    public function getUtilisateurId(): ?utilisateur {
        if ($this->_utilisateur_id instanceof Utilisateur) {
            return $this->_utilisateur_id->getId();
        }
        return null;
    }
    

    public function getPrenomUtilisaeur():Utilisateur{
        return $this->_prenom_utilisateur;
    }

    public function getPermisions():string{
        return $this->_permissions;
    }

    public static function create(Administrateur $administrateur, Utilisateur $utilisateur): int {
        // Étape 1: Préparation de la requête SQL pour insérer un nouvel administrateur dans la base de données
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Administrateur(nom_utilisateur, prenom_utilisateur, utilisateur_id, permissions) VALUES (:nom_utilisateur, :prenom_utilisateur, :utilisateur_id, :permissions)");
    
        // Étape 2: Exécution de la requête SQL avec les valeurs de l'objet Administrateur
        $statement->execute([
            'nom_utilisateur' => $administrateur->getNomUtilisateur(),
            'utilisateur_id' => $administrateur->getUtilisateurId(),
            'prenom_utilisateur' => $administrateur->getPrenomUtilisaeur(),
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
                utilisateur_id:$row(["utilisateur_id"]),
                nom_utilisateur: $row['nom_utilisateur'],
                prenom_utilisateur: $row['prenom_utilisateur'],
                permissions: $row['permissions']
            );
            // Étape 5: Retour de l'objet Administrateur
            return $administrateur;
        }
        // Étape 6: Retour de null si aucun administrateur correspondant n'a été trouvé
        return null;
    }
    
    public static function update(Administrateur $administrateur, Utilisateur $utilisateur):void{
        $statement = Database::getInstance()->getConnexion()->prepare("UPDATE Administrateur SET nom_utilisateur=:nom_utilisateur, utilisateur_id=:utilisateur_id, role=:role, permissions=:permissions WHERE id=:id");
        $statement->execute([
            'nom_utilisateur'=>$administrateur->getNomUtilisateur(),
            "utilisateur_id"=>$administrateur->getUtilisateurId(),
            'prenom_utilisateur'=>$administrateur->getPrenomUtilisaeur(),
            'permissions'=>$administrateur->getPermisions()
        ]);
    }

    public static function delete(Administrateur $administrateur):void{
        $statement = Database::getInstance()->getConnexion()->prepare("DELETE FROM Administrateur WHERE id=:id");
        $statement->execute(['id'=>$administrateur->getId()]);
    }




}