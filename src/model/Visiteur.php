<?php

declare(strict_types=1);
namespace app\SiteBreaking\model;

class Visiteur {
    private int $_id;
    private string $_session_id;
    private ?string $_nom_utilisateur;
    private ?string $_mot_de_passe;
    private ?string $_email;
    private int $_visites;

    public function __construct(int $id, string $session_id, ?string $nom_utilisateur, ?string $mot_de_passe, ?string $email, int $visites) {
        $this->_id = $id;
        $this->_session_id = $session_id;
        $this->_nom_utilisateur = $nom_utilisateur;
        $this->_mot_de_passe = $mot_de_passe;
        $this->_email = $email;
        $this->_visites = $visites;
    }

    public function getId(): int {
        return $this->_id;
    }

    public function getSessionId(): string {
        return $this->_session_id;
    }

    public function getNomUtilisateur(): ?string {
        return $this->_nom_utilisateur;
    }

    public function getMotDePasse(): ?string {
        return $this->_mot_de_passe;
    }

    public function getEmail(): ?string {
        return $this->_email;
    }

    public function getVisites(): int {
        return $this->_visites;
    }

    public static function cookie() {
        $db = Database::getInstance()->getConnexion();
    
        if (!isset($_COOKIE['id'])) {
            // Générer un nouvel identifiant unique pour le visiteur
            $session_id = uniqid();
            // Créer un cookie pour stocker l'identifiant unique du visiteur
            setcookie('id', $session_id, time() + 3600 * 24 * 365); // valable pendant un an
            // Enregistrement d'un nouveau visiteur dans la base de données
            $stmt = $db->prepare("INSERT INTO Visiteur (session_id, visites) VALUES (?, 1)");
            $stmt->execute([$session_id]);
        } else {
            // Récupération de l'identifiant du visiteur à partir du cookie
            $session_id = $_COOKIE['id'];
            // Vérifier si le visiteur existe déjà dans la base de données
            $stmt = $db->prepare("SELECT id FROM Visiteur WHERE session_id = ?");
            $stmt->execute([$session_id]);
            if ($stmt->rowCount() > 0) {
                // Mise à jour du compteur de visites dans la base de données
                $stmt = $db->prepare("UPDATE Visiteur SET visites = visites + 1 WHERE session_id = ?");
                $stmt->execute([$session_id]);
            } else {
                // Si le visiteur n'existe pas, insérer une nouvelle entrée
                $stmt = $db->prepare("INSERT INTO Visiteur (session_id, visites) VALUES (?, 1)");
                $stmt->execute([$session_id]);
            }
        }
    
        // Affichage du nombre total de visites
        $stmt = $db->query("SELECT SUM(visites) FROM Visiteur");
        $total_visites = $stmt->fetchColumn();
        echo "Total des visites : " . $total_visites;
    }
    
}
