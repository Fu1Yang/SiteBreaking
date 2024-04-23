<?php

declare(strict_types=1);
namespace app\SiteBreaking\model;
use DateTime;
class Message {

    private int $_id;
    private string $_contenu;
    private DateTime $_date_envoi;
    private int $_expediteur_id;
    private int $_destinataire_id;

    public function __construct(int $id, string $contenu, DateTime $date_envoi,int $expediteur_id, int $destinataire_id){

        $this->_id = $id;
        $this->_contenu = $contenu;
        $this->_date_envoi = $date_envoi;
        $this->_expediteur_id = $expediteur_id;
        $this->_destinataire_id = $destinataire_id;
    }

    public function getId():int{
        return $this->_id;
    }

    public function getContenu():string{
        return $this->_contenu;
    }

    public function getDateEnvoi():DateTime{
        return $this->_date_envoi;
    }

    public function getExpediteur():int{
        return $this->_expediteur_id;
    }

    public function getDestinataire():int{
        return $this->_destinataire_id;
    }
}