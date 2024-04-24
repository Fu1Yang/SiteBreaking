<?php

declare(strict_types=1);
namespace app\SiteBreaking\model;
use DateTime;

class Utilisateur {

    private int $_id;
    private string $_nom_utilisateur;
    private string $_mot_de_passe;
    private string $_email;
    private ?DateTime $_date_inscription;

    public function __construct(int $id, string $nom_utilisateur, string $mot_de_passe, string $email, ?DateTime $date_inscription = null)
    {
        $this->_id = $id;
        $this->_nom_utilisateur = $nom_utilisateur;
        $this->_mot_de_passe = $mot_de_passe;
        $this->_email = $email;
        $this->_date_inscription = $date_inscription ?? new DateTime();
    }

    public function getId():int{
        return $this->_id;
    }

    public function getNomUtilisateur():string{
        return  $this->_nom_utilisateur;
    }

    public function getMotDePasse():string{
        return $this->_mot_de_passe;
    }

    public function getEmail():string{
        return $this->_email;
    }

    public function getDateInscription():DateTime{
        return $this->_date_inscription;
    }

    public static function list(): \ArrayObject {
        $liste = new \ArrayObject();
        $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM Utilisateur;');
        $statement->execute();
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) { //le résultat sous forme de tableau associatif 
            $liste->append(new Utilisateur(
                (int)$row['id'],
                $row['nom_utilisateur'], 
                $row['mot_de_passe'], 
                $row['email'], 
                new DateTime($row['date_inscription'])
            ));
        }
        return $liste;
    }
}