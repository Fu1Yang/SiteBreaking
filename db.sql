DROP DATABASE IF EXISTS SiteBreaking;
CREATE DATABASE SiteBreaking;
USE SiteBreaking;

-- Table pour stocker les informations des visiteurs
CREATE TABLE Visiteur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    session_id VARCHAR(50) UNIQUE NOT NULL,
    nom_utilisateur VARCHAR(50), -- Peut être NULL si l'utilisateur n'est pas encore inscrit
    mot_de_passe VARCHAR(50),    -- Peut être NULL si l'utilisateur n'est pas encore inscrit
    email VARCHAR(100)           -- Peut être NULL si l'utilisateur n'est pas encore inscrit
);

-- Table pour stocker les utilisateurs inscrits
CREATE TABLE Utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_utilisateur VARCHAR(50) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- définit la valeur par défaut de cette colonne comme étant la date et l'heure actuelles lors de l'insertion d'un nouvel enregistrement
);

CREATE TABLE Administrateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_utilisateur VARCHAR(50) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(50) NOT NULL,
    role VARCHAR(50),
    permissions TEXT
);
CREATE TABLE Moderateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_utilisateur VARCHAR(50) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(50) NOT NULL,
    role VARCHAR(50), -- Ajout de l'attribut "role"
    permissions TEXT -- Liste des autorisations spéciales accordées aux modérateurs
);

CREATE TABLE Evenement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100) NOT NULL,
    description TEXT,
    date_evenement DATETIME,
    lieu VARCHAR(100)
);
CREATE TABLE Message (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contenu TEXT,
    date_envoi DATETIME,
    expediteur_id INT,
    destinataire_id INT,
    FOREIGN KEY (expediteur_id) REFERENCES Utilisateur(id),
    FOREIGN KEY (destinataire_id) REFERENCES Utilisateur(id)
);
CREATE TABLE Messagerie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT,
    FOREIGN KEY (utilisateur_id) REFERENCES Utilisateur(id)
);



-- Remplissage de la table Utilisateur
INSERT INTO Utilisateur (nom_utilisateur, mot_de_passe, email) VALUES
    ('nicolas', 'nicolas1234', 'nicolas@gmail.com'),
    ('valerie', 'valerie1234', 'valerie@gmail.com'),
    ('fabien', 'fabien1234', 'fabien@gmail.com'),
    ('julie', 'julie1234', 'julie@gmail.com'),
    ('ludivine', 'ludivine1234', 'ludivine@gmail.com');

-- la table Administrateur
INSERT INTO Administrateur (nom_utilisateur, mot_de_passe, role, permissions) VALUES
    ('admin1', 'adminpass1', 'superadmin', 'all_permissions'),
    ('admin2', 'adminpass2', 'admin', 'limited_permissions');

-- la table Moderateur
INSERT INTO Moderateur (nom_utilisateur, mot_de_passe, role, permissions) VALUES
    ('moderateur1', 'modopass1', 'moderateur', 'limited_permissions'),
    ('moderateur2', 'modopass2', 'moderateur', 'limited_permissions');

-- la table Evenement
INSERT INTO Evenement (titre, description, date_evenement, lieu) VALUES
    ('Soirée de lancement', 'Venez célébrer le lancement de notre nouveau site !', '2024-05-01 20:00:00', 'Paris'),
    ('Conférence en ligne', 'Découvrez les dernières tendances du web.', '2024-06-15 18:00:00', 'En ligne');

-- la table Message
INSERT INTO Message (contenu, date_envoi, expediteur_id, destinataire_id) VALUES
    ('Bonjour ! Comment allez-vous ?', '2024-04-23 10:00:00', 1, 2),
    ('Je vais bien, merci ! Et vous ?', '2024-04-23 10:05:00', 2, 1),
    ('Très bien aussi, merci !', '2024-04-23 10:10:00', 1, 2);

-- la table Messagerie
INSERT INTO Messagerie (utilisateur_id) VALUES
    (1),
    (2),
    (3);
