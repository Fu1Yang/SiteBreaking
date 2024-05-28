<?php
declare(strict_types=1);
namespace app\SiteBreaking\model;
use app\SiteBreaking\model\Database;

class Partenaire{
    private Int $_id;
    private String $_partner_url;
    private String $_partner_name;

    public function __construct(String $partner_url, String $partner_name, int $id = 0)
    {
        $this->_id = $id;
        $this->_partner_url = $partner_url;
        $this->_partner_name = $partner_name;
    }

    public function getId():int{
        return $this->_id;
    }

    public function getUrl():String{
        return $this->_partner_url;
    }

    public function getNom():String{
        return $this->_partner_name;
    }

    public function setId($id):String{
        return $this->_id = $id;
    }

    public function setUrl($partner_url):Void{
        $this->_partner_url = $partner_url;
    }

    public function setNom($partner_name):Void{
        $this->_partner_name = $partner_name;
    }

    public static function create(array $partenaire): int {
        // Préparation de la requête avec la syntaxe correcte
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Partners (partner_name, partner_url) VALUES (:partner_name, :partner_url)");
    
        // Exécution de la requête avec les paramètres liés
        $statement->execute([
            "partner_name" => $partenaire["partner_name"],
            "partner_url" => $partenaire["partner_url"],
        ]);
    
        // Retourne l'ID de la dernière ligne insérée
        return (int) Database::getInstance()->getConnexion()->lastInsertId();
    }
    

    public static function read($id):?self{
        $statement = Database::getInstance()->getConnexion()->prepare("SELECT * FROM Partners where id=:id");
        $statement->execute(["id"=>$id]);
        if ($row = $statement->fetch()) {
            $partenaire = new Partenaire(
                id:$row["id"],
                partner_name:$row["partner_nom"],
                partner_url:$row["partner_url"],   
            );
            return $partenaire;
        }
        return null;
    }

    public static function update(Partenaire $partenaire):void{
        $statement = Database::getInstance()->getConnexion()->prepare("UPDATE Partners SET partner_name=:partner_name, partner_url=:partner_url WHERE id=:id");
        $statement->execute([ 
            "partner_name"=>$partenaire->getNom(),
            "partner_url"=>$partenaire->getUrl(),
          ]);
    }

    public static function delete(Partenaire $partenaire):void{
        $statement = Database::getInstance()->getConnexion()->prepare("DELETE FROM Partners WHERE id=:id");
        $statement->execute(["id"=>$partenaire->getId()]);
    }
}