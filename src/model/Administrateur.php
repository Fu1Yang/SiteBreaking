<?php

declare(strict_types=1);
namespace app\SiteBreaking\model;

class Administrateur{
    private int $_id;
    private string $_nom_utilisateur;
    private string $_mot_de_passe;
    private string $_role;
    private string $_permissions;

    public function __construct(int $id, string $nom_utilisateur, string $mot_de_passe, string $role, string $permissions)
    {
        $this->_id = $id;
        $this->_nom_utilisateur = $nom_utilisateur;
        $this->_mot_de_passe = $mot_de_passe;
        $this->_role = $role;
        $this->_permissions = $permissions;

    }

    public function getId():int{
        return $this->_id;
    }

    public function getNomUtilisateur():string{
        return $this->_nom_utilisateur;
    }

    public function getMotDepasse():string{
        return $this->_mot_de_passe;
    }

    public function getRole():string{
        return $this->_role;
    }

    public function getPermisions():string{
        return $this->_permissions;
    }
}