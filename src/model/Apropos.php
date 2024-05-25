<?php

declare(strict_types=1);
namespace app\SiteBreaking\model;


class Apropos {
    private $_conn;

    // Constructeur pour initialiser la _connexion à la base de données via la classe Database
    public function __construct() {
        $this->_conn = Database::getInstance()->getconnexion();
    }

    // Méthodes CRUD pour les Images
    public function createImage($url_image, $description) {
        $stmt = $this->_conn->prepare("INSERT INTO Images (image_url, description) VALUES (?, ?)");
        return $stmt->execute([$url_image, $description]);
    }


    public function readImageParId($id) {
        $stmt = $this->_conn->prepare("SELECT * FROM Images WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function updateImage($id, $url_image, $description) {
        $stmt = $this->_conn->prepare("UPDATE Images SET image_url = ?, description = ? WHERE id = ?");
        return $stmt->execute([$url_image, $description, $id]);
    }

    public function deleteImage($id) {
        $stmt = $this->_conn->prepare("DELETE FROM Images WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Méthodes CRUD pour les Logos
    public function reateLogo($url_logo, $description) {
        $stmt = $this->_conn->prepare("INSERT INTO Logos (logo_url, description) VALUES (?, ?)");
        return $stmt->execute([$url_logo, $description]);
    }


    public function readLogoParId($id) {
        $stmt = $this->_conn->prepare("SELECT * FROM Logos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function updateLogo($id, $url_logo, $description) {
        $stmt = $this->_conn->prepare("UPDATE Logos SET logo_url = ?, description = ? WHERE id = ?");
        return $stmt->execute([$url_logo, $description, $id]);
    }

    public function deleteLogo($id) {
        $stmt = $this->_conn->prepare("DELETE FROM Logos WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // les Descriptions
    public function createDescription($contenu) {
        $stmt = $this->_conn->prepare("INSERT INTO Descriptions (content) VALUES (?)");
        return $stmt->execute([$contenu]);
    }


    public function readDescriptionParId($id) {
        $stmt = $this->_conn->prepare("SELECT * FROM Descriptions WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function updateDescription($id, $contenu) {
        $stmt = $this->_conn->prepare("UPDATE Descriptions SET content = ? WHERE id = ?");
        return $stmt->execute([$contenu, $id]);
    }

    public function deleteDescription($id) {
        $stmt = $this->_conn->prepare("DELETE FROM Descriptions WHERE id = ?");
        return $stmt->execute([$id]);
    }

    //  les Partenaires
    public function createPartenaire($nom_partenaire, $url_partenaire) {
        $stmt = $this->_conn->prepare("INSERT INTO Partners (partner_name, partner_url) VALUES (?, ?)");
        return $stmt->execute([$nom_partenaire, $url_partenaire]);
    }


    public function readPartenaireParId($id) {
        $stmt = $this->_conn->prepare("SELECT * FROM Partners WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function updatePartenaire($id, $nom_partenaire, $url_partenaire) {
        $stmt = $this->_conn->prepare("UPDATE Partners SET partner_name = ?, partner_url = ? WHERE id = ?");
        return $stmt->execute([$nom_partenaire, $url_partenaire, $id]);
    }

    public function deletePartenaire($id) {
        $stmt = $this->_conn->prepare("DELETE FROM Partners WHERE id = ?");
        return $stmt->execute([$id]);
    }
}

