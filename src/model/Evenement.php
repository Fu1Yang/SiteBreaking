<?php

declare(strict_types=1);
namespace app\SiteBreaking\model;
use DateTime;

class Evenement {
    private int $_id;
    private string $_titre;
    private string $_description;
    private DateTime $_date_evenement;
    private string $_lieu;

    public function __construct(int $id, string $titre, string $description, DateTime $date_evenement, string $lieu){
        $this->_id = $id;
        $this->_titre = $titre;
        $this->_description = $description;
        $this->_date_evenement = $date_evenement;
        $this->_lieu = $lieu;
    }

    public function getId():int {
        return $this->_id;
    }

    public function getTitre():string {
        return $this->_titre;
    }    

    public function getDescription():string {
        return $this->_description;
    }

    public function getDateEvenement():DateTime {
        return $this->_date_evenement;
    }

    public function getLieu():string {
        return $this->_lieu;
    }
}