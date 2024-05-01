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
    mot_de_passe VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    role VARCHAR(50), -- Ajout de l'attribut "role"
    date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table pour stocker les administrateurs
CREATE TABLE Administrateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT UNIQUE, -- Utilisation d'une contrainte UNIQUE pour garantir qu'un utilisateur ne peut être qu'un seul administrateur
    nom VARCHAR(50), -- Ajout du nom de l'administrateur
    FOREIGN KEY (utilisateur_id) REFERENCES Utilisateur(id) ON DELETE CASCADE, -- Supprimer automatiquement l'administrateur associé si l'utilisateur est supprimé
    permissions TEXT
);

-- Table pour stocker les modérateurs
CREATE TABLE Moderateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT UNIQUE, -- Utilisation d'une contrainte UNIQUE pour garantir qu'un utilisateur ne peut être qu'un seul modérateur
    nom VARCHAR(50), -- Ajout du nom du modérateur
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
INSERT INTO Utilisateur (nom_utilisateur, mot_de_passe, email, role) VALUES
    ('nicolas', 'nicolas1234', 'nicolas@gmail.com', 'admin'),
    ('valerie', 'valerie1234', 'valerie@gmail.com', 'utilisateur'),
    ('fabien', 'fabien1234', 'fabien@gmail.com', 'moderateur'),
    ('julie', 'julie1234', 'julie@gmail.com', 'utilisateur'),
    ('ludivine', 'ludivine1234', 'ludivine@gmail.com', 'utilisateur');

-- Remplissage de la table Administrateur
INSERT INTO Administrateur (utilisateur_id, nom, permissions) VALUES
    (1, 'Nicolas', 'all_permissions'),
    (2, 'Valerie', 'limited_permissions');

-- Remplissage de la table Moderateur
INSERT INTO Moderateur (utilisateur_id, nom, permissions) VALUES
    (3, 'Fabien', 'limited_permissions'),
    (4, 'Julie', 'limited_permissions');

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
