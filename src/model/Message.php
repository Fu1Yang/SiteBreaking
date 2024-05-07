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



public static function findByUserId(int $userId): array {
    // Initialise un tableau pour stocker les messages trouvés
    $messages = [];

    // Prépare une requête SQL pour sélectionner les messages où l'expéditeur ou le destinataire est égal à $userId
    $statement = Database::getInstance()->getConnexion()->prepare("SELECT * FROM Message WHERE expediteur_id = :userId OR destinataire_id = :userId");

    // Exécute la requête SQL en passant $userId en tant que valeur pour le paramètre :userId
    $statement->execute(["userId" => $userId]);

    // Parcourt les résultats de la requête et crée des objets Message pour chaque ligne de résultat
    while ($row = $statement->fetch()) {
        // Crée un nouvel objet Message en utilisant les données de la ligne de résultat
        $message = new Message(
            id: $row["id"], // Identifiant du message
            contenu: $row["contenu"], // Contenu du message
            date_envoi: new DateTime($row["date_envoi"]), // Date d'envoi du message (convertie en objet DateTime)
            expediteur_id: $row["expediteur_id"], // Identifiant de l'expéditeur
            destinataire_id: $row["destinataire_id"] // Identifiant du destinataire
        );

        // Ajoute l'objet Message créé au tableau $messages
        $messages[] = $message;
    }

    // Retourne le tableau de messages
    return $messages;
}



}   
