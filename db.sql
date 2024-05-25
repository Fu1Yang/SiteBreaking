-- Supprimer la base de données si elle existe déjà
DROP DATABASE IF EXISTS SiteBreaking;

-- Créer la base de données
CREATE DATABASE SiteBreaking;

-- Utiliser la base de données nouvellement créée
USE SiteBreaking;

-- Table pour stocker les informations des visiteurs
CREATE TABLE Visiteur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    session_id VARCHAR(50) UNIQUE NOT NULL,
    nom_utilisateur VARCHAR(50),
    mot_de_passe VARCHAR(50),
    email VARCHAR(100)
);

-- Table pour stocker les utilisateurs inscrits
CREATE TABLE Utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_utilisateur VARCHAR(50) UNIQUE NOT NULL,
    prenom_utilisateur VARCHAR(50) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    role VARCHAR(50), -- Ajout de l'attribut "role"
    date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table pour stocker les administrateurs
CREATE TABLE Administrateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT UNIQUE, -- Utilisation d'une contrainte UNIQUE pour garantir qu'un utilisateur ne peut être qu'un seul administrateur
    nom VARCHAR(50), -- Ajout du nom de l'administrateur
    prenom VARCHAR(50), -- Ajout du prenom de l'administrateur
    FOREIGN KEY (utilisateur_id) REFERENCES Utilisateur(id) ON DELETE CASCADE, -- Supprimer automatiquement l'administrateur associé si l'utilisateur est supprimé
    permissions TEXT
);

-- Table pour stocker les modérateurs
CREATE TABLE Moderateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT UNIQUE, -- Utilisation d'une contrainte UNIQUE pour garantir qu'un utilisateur ne peut être qu'un seul modérateur
    nom VARCHAR(50), -- Ajout du nom du modérateur
    prenom VARCHAR(50), -- Ajout du prenom du modérateur
    FOREIGN KEY (utilisateur_id) REFERENCES Utilisateur(id) ON DELETE CASCADE, -- Supprimer automatiquement le modérateur associé si l'utilisateur est supprimé
    permissions TEXT
);

-- Table pour stocker les événements
CREATE TABLE Evenement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100) NOT NULL,
    description TEXT,
    date_evenement DATETIME,
    lieu VARCHAR(100)
);
-- Table pour stocker les informations de la page d'accueil
CREATE TABLE Accueil (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image TEXT,
    evenementRealiser INT,
    titre VARCHAR(100),
    nom VARCHAR(100)
);

-- Table pour stocker les informations de la page "À Propos"
-- Table Images
CREATE TABLE Images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image_url VARCHAR(255) NOT NULL,
    description TEXT
);

-- Table Logos
CREATE TABLE Logos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    logo_url VARCHAR(255) NOT NULL,
    description TEXT
);

-- Table Descriptions
CREATE TABLE Descriptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL
);

-- Table Partners
CREATE TABLE Partners (
    id INT AUTO_INCREMENT PRIMARY KEY,
    partner_name VARCHAR(255) NOT NULL,
    partner_url VARCHAR(255) NOT NULL
);

-- Table pour stocker les informations de la page de contact
CREATE TABLE Contact (
    id INT AUTO_INCREMENT PRIMARY KEY,
    adresse VARCHAR(255),
    numeroDeTel VARCHAR(20),
    email VARCHAR(100),
    horaire VARCHAR(100)
);


-- Table pour stocker les messages
CREATE TABLE Message (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contenu TEXT,
    date_envoi DATETIME,
    expediteur_id INT,
    destinataire_id INT,
    FOREIGN KEY (expediteur_id) REFERENCES Utilisateur(id),
    FOREIGN KEY (destinataire_id) REFERENCES Utilisateur(id)
);

-- Table pour stocker les boîtes de messagerie des utilisateurs
CREATE TABLE Messagerie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT,
    FOREIGN KEY (utilisateur_id) REFERENCES Utilisateur(id) ON DELETE CASCADE -- Supprimer automatiquement la boîte de messagerie si l'utilisateur est supprimé
);

-- Remplissage de la table Utilisateur
INSERT INTO Utilisateur (nom_utilisateur, prenom_utilisateur, mot_de_passe, email, role) VALUES
    ('nicolas', "turcan", 'nicolas1234', 'nicolas@gmail.com', 'admin'),
    ('valerie', "jolie",'valerie1234', 'valerie@gmail.com', 'utilisateur'),
    ('fabien', "lemal",'fabien1234', 'fabien@gmail.com', 'moderateur'),
    ('julie', "bouler",'julie1234', 'julie@gmail.com', 'utilisateur'),
    ('ludivine', "boul",'ludivine1234', 'ludivine@gmail.com', 'utilisateur');

-- Remplissage de la table Administrateur
INSERT INTO Administrateur (utilisateur_id, nom,prenom, permissions) VALUES
    (1, 'Nicolas',"turcan", 'all_permissions'),
    (2, 'Valerie',"jolie", 'limited_permissions');

-- Remplissage de la table Moderateur
INSERT INTO Moderateur (utilisateur_id, nom,prenom, permissions) VALUES
    (3, 'Fabien',"lemal", 'limited_permissions'),
    (4, 'Julie',"bouler", 'limited_permissions');

-- Remplissage de la table Evenement
INSERT INTO Evenement (titre, description, date_evenement, lieu) VALUES
    ('Soirée de lancement', 'Venez célébrer le lancement de notre nouveau site !', '2024-05-01 20:00:00', 'Paris'),
    ('Conférence en ligne', 'Découvrez les dernières tendances du web.', '2024-06-15 18:00:00', 'En ligne');

-- Remplissage de la table Message
INSERT INTO Message (contenu, date_envoi, expediteur_id, destinataire_id) VALUES
    ('Bonjour ! Comment allez-vous ?', '2024-04-23 10:00:00', 1, 2),
    ('Je vais bien, merci ! Et vous ?', '2024-04-23 10:05:00', 2, 1),
    ('Très bien aussi, merci !', '2024-04-23 10:10:00', 1, 2);

-- Remplissage de la table Messagerie
INSERT INTO Messagerie (utilisateur_id) VALUES
    (1),
    (2),
    (3);

INSERT INTO Contact (adresse, numeroDeTel, email, horaire) VALUES
    ('54 Bis Jules Louis Breton 18100 Vierzon, 18100 Vierzon', '0749523881', 'associationbjs@gmail.com', NULL),
    ('Salle Forge: 14 rue Eugène Pottier, 18100 Vierzon', '0749523881', 'associationbjs@gmail.com', '15h30 à 16h30: Pour les enfants de 5 ans à 7 ans, 16h30 à 17h30: Pour les enfants de 8 ans à 12 ans'),
    ('Salle Collier: 31 rue André Hénault, 18100 Vierzon', '0749523881', 'associationbjs@gmail.com', '19h30 à 20h30');
