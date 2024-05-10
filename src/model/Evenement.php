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
    private  $_photo = null;

    public function __construct(int $id, string $titre, string $description, ?DateTime $date_evenement, string $lieu, string $photo = null){
        $this->_id = $id;
        $this->_titre = $titre;
        $this->_description = $description;
        $this->_date_evenement = $date_evenement;
        $this->_lieu = $lieu;
        $this->_photo = $photo;
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

    public function getDateEvenement():\DateTime {
        return $this->_date_evenement;
    }

    public function getLieu():string {
        return $this->_lieu;
    }

    public function getPhoto():?string {
        return $this->_photo;
    }

    public static function create(Evenement $evenement):int{
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Evenement (titre, description, date_evenement, lieu, photo) VALUE (:titre, :description, :date_evenement, :lieu, :photo)");
        $statement->execute([
            "titre"=>$evenement->getTitre(),
            "description"=>$evenement->getDescription(),
            "date_evenement"=>$evenement->getDateEvenement(),
            "lieu"=>$evenement->getLieu(),
            "photo"=>$evenement->getPhoto(),
        ]);
        return (int) Database::getInstance()->getConnexion()->lastInsertId();
    }

    public static function read(int $id): ?self {
        $statement = Database::getInstance()->getConnexion()->prepare("SELECT * FROM Evenement WHERE id=:id");
        $statement->execute(["id"=>$id]);
        $date_evenement = new DateTime('2024-05-02 14:20:00');
        if ($row = $statement->fetch()) {
            $evenement = new Evenement(
                id:$row['id'],
                titre:$row["titre"],
                description:$row["description"],
                date_evenement: $date_evenement,
                lieu:$row["lieu"],
                photo:$row["photo"],
            ); 
            return $evenement;      
        };
        return null;
    }

    public static function update(Evenement $evenement):void{
        $statemente = Database::getInstance()->getConnexion()->prepare("UPDATE Evenement SET titre=:titre, description=:description, date_evenement=:date_evenement, lieu=:lieu, photo=:photo WHERE id=:id");
        $statemente->execute([
            "titre"=>$evenement->getTitre(),
            "description"=>$evenement->getDescription(),
            "date_evenement"=>$evenement->getDateEvenement(),
            "lieu"=>$evenement->getLieu(),
            "photo"=>$evenement->getPhoto(),
    ]);
    }

    public static function delete(Evenement $evenement):void{
        $statement = Database::getInstance()->getConnexion()->prepare("DELETE FROM Evenement WHERE id=:id");
        $statement->execute(["id"=>$evenement->getId()]);
    }
}