<?php

declare(strict_types=1);
namespace app\SiteBreaking\model;

class Photo {
    private int $_id;
    private string $_nom;

    public function __construct(string $nom,int $id = 0){
        $this->_id = $id;
        $this->_nom = $nom;
    }

    public function getId(){
        return $this->_id;
    }

    public function getNom(){
        return $this->_nom;
    }

    public function setId($id){
        return $this->_id = $id;
    }
    
    public function setNom($nom){
        return $this->_nom = $nom;
    }


    public static function create(Photo $photo): int {
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Photos ( nom) VALUES ( :nom)");
        $statement->execute(array("nom"=>$photo->getNom()));
        return (int) Database::getInstance()->getConnexion()->lastInsertId();
    }

    public static function read(int $id):?self{
        $statement = Database::getInstance()->getConnexion()->prepare("SELECT * FROM Photos WHERE id=:id");
        $statement->execute(array('id'=>$id));
        if ($row = $statement->fetch()) {
            $photo = new Photo( 
                id:$row["id"],
                nom:$row["nom"]
            );
        return $photo;
        }
        return null;
    }

    public static function update(Photo $photo): void {
        $statement = Database::getInstance()->getConnexion()->prepare("UPDATE Photos SET nom=:nom WHERE id=:id");
        $statement->execute(array("id" => $photo->getId(), "nom" => $photo->getNom()));
    }

    public static function delete(Photo $photo):void{
        $statement = Database::getInstance()->getConnexion()->prepare("DELETE FROM Photos WHERE id=:id");
        $statement->execute(array('id'=>$photo->getId()));

    }
}


