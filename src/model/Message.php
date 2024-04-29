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

    public static function create(Message $message):int{
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Message (contenu,date_envoi,expediteur_id,destinataire_id) Value (:contenu,:date_envoie,:expediteur_id,:destinataire_id)");
        $statement->execute([
            "contenu"=>$message->getContenu(),
            "date_envoi"=>$message->getDateEnvoi(),
            "expediteur_id"=>$message->getExpediteur(),
            "destinataire_id"=>$message->getDestinataire()]);
        return (int) Database::getInstance()->getConnexion()->lastInsertId();
    }

    public static function read(int $id): ?self{
        $statement = Database::getInstance()->getConnexion()->prepare("SELECT *FROM Message WHERE id=:id");
        $statement->execute(["id=:id"]);
        if ($row = $statement->fetch()) {
            $message = new Message(
                id:$row["id"],
                contenu:$row["contenu"],
                date_envoi:$row["date_envoi"],
                expediteur_id:$row["expediteur_id"],
                destinataire_id:$row["destinataire_id"],
            );
            return $message;
        };
        return null;
    }

    public static function update(Message $message):void{
        $statement = Database::getInstance()->getConnexion()->prepare("UPDATE Message SET contenu=:contenu,date_envoi=:date_envoi,expediteur_id=:expediteur_id,destinataire_id=:destinataire_id WHERE id=:id");
        $statement->execute([
            "contenu"=>$message->getContenu(),
            "date_envoi"=>$message->getDateEnvoi(),
            "expediteur_id"=>$message->getExpediteur(),
            "destinataire_id"=>$message->getDestinataire()]);
    }

public static function delete(Message $message):void{
    $statement = Database::getInstance()->getConnexion()->prepare("DELETE FROM Message WHERE id=:id");
    $statement->execute(["id"=>$message->getId()]);
}


}   
