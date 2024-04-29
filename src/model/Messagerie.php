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

    public static function create(Messagerie $messagerie):int{
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Messagerie (utilisateur_id) VALUES (:utilisateur_id)");
        $statement->execute(["utilisateur_id"=>$messagerie->getUtilisateur()]);
        return (int) Database::getInstance()->getConnexion()->lastInsertId();
    }

    public static function read(int $id): ?self{
        $statement = Database::getInstance()->getConnexion()->prepare("SELECT * FROM Messagerie WHERE id=:id");
        $statement->execute(["id"=>$id]);
        if ($row = $statement->fetch()) {
            $messagerie = new Messagerie(
                id:$row["id"],
                utilisateur_id:$row["utilisateur_id"]
            );
            return $messagerie;
        }
        return null;
    }

    public static function update(Messagerie $messagerie):void{
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Messagerie SET utilisateur_id=:utilisateur_id WHERE id=:id ");
        $statement->execute(["utilisateur_id"=>$messagerie->getUtilisateur()]);
    }

    public static function delete(Messagerie $messagerie):void{
        $statement = Database::getInstance()->getConnexion()->prepare("DELETE FROM Messagerie WHERE id=:id");
        $statement->execute(["id"=>$messagerie->getId()]);
    }

}