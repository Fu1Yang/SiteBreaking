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
}