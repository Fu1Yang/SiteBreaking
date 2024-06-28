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
    nom_utilisateur VARCHAR(255) NOT NULL,
    prenom_utilisateur VARCHAR(255) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    role VARCHAR(255) NOT NULL,
    date_inscription DATETIME NOT NULL,
    token VARCHAR(255) NOT NULL,
    validationEmail INT NOT NULL DEFAULT 0
);

-- Table pour stocker les administrateurs
CREATE TABLE Administrateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT UNIQUE, -- Utilisation d'une contrainte UNIQUE pour garantir qu'un utilisateur ne peut être qu'un seul administrateur
    nom VARCHAR(50), -- Ajout du nom de l'administrateur
    prenom VARCHAR(50), -- Ajout du prenom de l'administrateur
    FOREIGN KEY (utilisateur_id) REFERENCES Utilisateur(_id) ON DELETE CASCADE, -- Supprimer automatiquement l'administrateur associé si l'utilisateur est supprimé
    permissions TEXT
);

-- Table pour stocker les modérateurs
CREATE TABLE Moderateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT UNIQUE, -- Utilisation d'une contrainte UNIQUE pour garantir qu'un utilisateur ne peut être qu'un seul modérateur
    nom VARCHAR(50), -- Ajout du nom du modérateur
    prenom VARCHAR(50), -- Ajout du prenom du modérateur
    FOREIGN KEY (utilisateur_id) REFERENCES Utilisateur(_id) ON DELETE CASCADE, -- Supprimer automatiquement le modérateur associé si l'utilisateur est supprimé
    permissions TEXT
);

-- Table pour stocker les événements
CREATE TABLE Evenement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    date_evenement DATETIME NOT NULL,
    lieu VARCHAR(255) NOT NULL,
    image VARCHAR(255) DEFAULT NULL
);

-- Table pour stocker les informations de la page d'accueil
CREATE TABLE Accueil (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(255) NOT NULL,
    evenementRealiser INT NOT NULL,
    titre VARCHAR(255) NOT NULL,
    nom VARCHAR(255) NOT NULL,
    text TEXT NOT NULL
);

-- Table pour stocker les informations de la table PhotosCarrousel
CREATE TABLE PhotosCarrousel (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL
);

-- Table pour stocker les informations de la page "À Propos"
CREATE TABLE Apropos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    logo TEXT,
    images TEXT,
    description TEXT
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
    adresse VARCHAR(255) NOT NULL,
    numeroDeTel VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    jour VARCHAR(255) NOT NULL,
    niveauEtStyle VARCHAR(255) NOT NULL
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
