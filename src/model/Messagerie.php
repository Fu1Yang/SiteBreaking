<?php

declare(strict_types=1);
namespace app\SiteBreaking\model;

class Messagerie{

    private int $_id;
    private int $_utilisateur_id;

    public function __constuct(int $id, int $utilisateur_id){
        $this->_id = $id;
        $this->_utilisateur_id = $utilisateur_id;
    }

    public function getId(){
        return $this->_id;
    }

    public function getUtilisateur(){
        return $this->_utilisateur_id;
    }
}