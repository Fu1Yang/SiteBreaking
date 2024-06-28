-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql-srv
-- Généré le : ven. 28 juin 2024 à 08:47
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `SiteBreaking`
--

-- --------------------------------------------------------

--
-- Structure de la table `Accueil`
--

CREATE TABLE `Accueil` (
  `id` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `evenementRealiser` int NOT NULL,
  `titre` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Accueil`
--

INSERT INTO `Accueil` (`id`, `image`, `evenementRealiser`, `titre`, `nom`, `text`) VALUES
(1, 'images.jpg', 5, 'La présidente de l\'association', 'Soares da Silva Paola', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ornare neque vel lectus sollicitudin, nec scelerisque enim vulputate. In consequat ante id libero fringilla, ac lacinia risus luctus. Fusce vitae bibendum tortor. Nulla facilisi. Phasellus sed tellus non diam iaculis hendrerit. Integer suscipit posuere elit, eu finibus arcu dapibus eu. Vivamus eleifend lacinia diam, nec malesuada sem laoreet at. Sed auctor velit nec velit euismod, sit amet tincidunt orci convallis. Nullam non consequat velit. Vivamus maximus ex a quam euismod, sed efficitur lorem malesuada. Maecenas sit amet felis ut lorem tempor molestie vel id lorem.\r\n\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam ultrices, risus nec consequat rutrum, velit felis tristique ipsum, in laoreet eros tortor ac justo. Nunc id quam varius, feugiat ligula sit amet, tincidunt risus. Mauris dignissim quam at lacinia rutrum. Aliquam a luctus turpis. Morbi dictum venenatis elit, sit amet pretium lectus mollis eget. Sed eu felis sed tortor tincidunt laoreet. Integer varius ligula id risus ultrices, nec fringilla enim ullamcorper. Suspendisse potenti. Curabitur sed nibh risus. Phasellus malesuada felis id aliquet aliquam. Cras commodo pretium justo, non dapibus nisi vulputate id.'),
(2, 'imagee.jpg', 2, 'Directeur artistique de l\'association ', 'Barbosa lopes Matheus', 'Donec eget urna in magna convallis vestibulum. Curabitur non tincidunt lacus, a interdum eros. Maecenas ut mi velit. Aliquam interdum velit id magna mollis consequat. Nullam auctor augue sed arcu tincidunt, non consectetur eros feugiat. Nam a metus vitae arcu suscipit vehicula. Nam ullamcorper augue ut lorem vestibulum, at sollicitudin mi venenatis. Etiam non ligula vel eros hendrerit accumsan. Phasellus hendrerit risus non nisl dapibus, nec interdum lorem accumsan. Vivamus et ex auctor, consequat quam vel, tristique neque. Vivamus rutrum malesuada quam, eget lacinia urna elementum at.\r\n\r\nInteger vel eros eget turpis consectetur vestibulum. Nam in est vitae est cursus commodo. Quisque nec neque eu ligula consequat dictum. Fusce consequat feugiat sapien vitae laoreet. Morbi dictum at mi sit amet dictum. Nunc ac turpis eros. In gravida at erat ac malesuada. Sed volutpat justo vel elit dignissim, eget faucibus metus tempor. Phasellus at risus eget ipsum placerat congue. Curabitur ac vehicula enim. Sed luctus nisl quis elit eleifend, a sodales libero tincidunt. Vivamus ac ante et lorem pharetra pharetra. Sed non purus vel purus maximus pellentesque vitae in dolor.');

-- --------------------------------------------------------

--
-- Structure de la table `Apropos`
--

CREATE TABLE `Apropos` (
  `id` int NOT NULL,
  `logo` text,
  `images` text,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Apropos`
--

INSERT INTO `Apropos` (`id`, `logo`, `images`, `description`) VALUES
(1, 'Capture d\'écran 2024-03-08 141432.png', 'grafity.jpg', 'Bienvenue dans le monde vibrant de l\'Association de Breaking de Vierzon ! Nichée au cœur de la région, notre association embrasse la culture dynamique du breakdance en offrant un espace où les danseurs peuvent s\'exprimer, se développer et se connecter.\r\n\r\nÀ l\'Association de Breaking de Vierzon, nous croyons en la puissance de la danse pour transcender les barrières et unir les individus. Que vous soyez débutant curieux ou danseur expérimenté, notre communauté accueillante vous offre un lieu pour apprendre, pratiquer et perfectionner vos compétences. Nos cours sont animés par des instructeurs passionnés qui partagent non seulement leurs connaissances techniques, mais aussi leur amour pour cet art dynamique.\r\n\r\nAu-delà de l\'enseignement, nous organisons régulièrement des événements, des compétitions locales et des sessions de jam où les danseurs peuvent montrer leur talent et se mesurer les uns aux autres dans un esprit de camaraderie. Ces occasions renforcent non seulement les compétences des participants, mais créent aussi des liens durables au sein de notre communauté.\r\n\r\nQue vous soyez attiré par le défi physique, l\'expression artistique ou simplement à la recherche d\'une nouvelle passion, l\'Association de Breaking de Vierzon vous offre une porte ouverte vers un monde de mouvement, de rythme et de créativité. Rejoignez-nous et découvrez la magie du breakdance à Vierzon !\r\n\r\nExplorez, dansez et inspirez avec nous à l\'Association de Breaking de Vierzon. Bienvenue dans notre famille de danseurs passionnés !');

-- --------------------------------------------------------

--
-- Structure de la table `Contact`
--

CREATE TABLE `Contact` (
  `id` int NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `numeroDeTel` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `jour` varchar(255) NOT NULL,
  `niveauEtStyle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Contact`
--

INSERT INTO `Contact` (`id`, `adresse`, `numeroDeTel`, `email`, `description`, `jour`, `niveauEtStyle`) VALUES
(1, 'Adresse : 31 Rue André Henault, 18100 Vierzon', '0749523881', 'associationbjs@gmail.com', ' 18H30 19H30 De 5 à 7 Ans, 8 à 12 ans Breaking Fit 19H30 - 20H30 Adultes', 'MARDI', 'Breaking & Hip Hop'),
(2, 'Adresse : 14 Rue Eugène Pottier, 18100 Vierzon', '0749523881', 'associationbjs@gmail.com', '15H30 16H30 De 5 à 7 Ans  || 16H30 17H30 8 à 12 ans', 'MERCREDI', 'Breaking & Hip Hop '),
(3, 'Adresse : 14 Rue Eugène Pottier, 18100 Vierzon', '0749523881', 'associationbjs@gmail.com', '19H30 - 20H30 A partir de 10 ans || Breaking 20H30- 21H30 A partir de 10 ans', 'VENDREDI', 'HIP HOP ');

-- --------------------------------------------------------

--
-- Structure de la table `Evenement`
--

CREATE TABLE `Evenement` (
  `id` int NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_evenement` datetime NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Evenement`
--

INSERT INTO `Evenement` (`id`, `titre`, `description`, `date_evenement`, `lieu`, `image`) VALUES
(1, 'EVÉNEMENT CARNAVALET BREAKING - LE MUSÉE ENTRE DANS LA DANSE !', 'En juin 2024, le musée Carnavelet – Histoire de Paris met à l’honneur le breakdance et plus largement le hip-hop pour célébrer une année d’Olympiade Culturelle.  Au programme :\r\n\r\nExtraits du spectacle « Hexagonal » dans le musée : dimanche 9 juin à 14h30 et à 15h30\r\nBalade chorégraphique dans le Marais : dimanche 9 juin à 15h\r\nSpectacle « Hand Hop » : mercredi 12 juin à 14h et à 16h30', '2024-06-09 15:30:00', 'Orangerie du musée Carnavalet, 14 rue Payenne 75003 Paris', 'grafity.jpg'),
(2, 'Breaking | Jeux Olympiques de Paris 2024', 'La première apparition du breaking aux Jeux olympiques aura lieu en 2024 aux Jeux de Paris 2024. C’est à Buenos Aires que ce sport fut présenté au public olympique lors des Jeux olympiques de la jeunesse de 2018 et la discipline est également présente en 2022 aux Jeux mondiaux à Birmingham pour la première fois', '2024-08-09 16:00:00', 'La Concorde', 'breakdance-olympics-copy.jpg'),
(3, ' Red Bull BC One', 'Le Red Bull BC One est la plus grande compétition de breaking du monde. Chaque année, des milliers de danseurs tentent de décrocher une place pour la World Final. Les 16 meilleurs B-boys et B-Girls du monde s’affronteront lors de battle de breaking pour la ceinture de champion du monde du Red Bull BC One. Le B-Boying/B-Girling, ou breakdance comme employé dans les médias, est un style de danse né dans les rues de New-York dans les seventies. C\'est un des quatre piliers de la culture hip-hop avec le DJing, le MCing et le graffiti. Au fil du temps, la scène du breaking s\'est développée avec des communautés actives s\'étendant aux quatre coins du monde. Chaque année, les danseurs et crews repoussent les limites du breaking, en façonnant une forme d\'art qui ne ressemble à aucune autre.', '2024-04-14 00:00:00', 'Le CENTQUATRE, France', '870x489_red_bull_bc_one--jpg.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `Message`
--

CREATE TABLE `Message` (
  `id` int NOT NULL,
  `contenu` text,
  `date_envoi` datetime DEFAULT NULL,
  `expediteur_id` int DEFAULT NULL,
  `destinataire_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Messagerie`
--

CREATE TABLE `Messagerie` (
  `id` int NOT NULL,
  `utilisateur_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Partners`
--

CREATE TABLE `Partners` (
  `id` int NOT NULL,
  `partner_name` varchar(255) NOT NULL,
  `partner_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Partners`
--

INSERT INTO `Partners` (`id`, `partner_name`, `partner_url`) VALUES
(1, 'Cher18.png', 'https://www.departement18.fr/'),
(2, 'prefetDuCher.png', 'https://www.cher.gouv.fr/'),
(3, 'Saforelle.png', 'https://fr.saforelle.com/'),
(4, 'vierzon.png', 'https://www.ville-vierzon.fr/'),
(5, 'vierzonSologneBerry.png', 'https://www.cc-vierzon.fr/');

-- --------------------------------------------------------

--
-- Structure de la table `PhotosCarrousel`
--

CREATE TABLE `PhotosCarrousel` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `PhotosCarrousel`
--

INSERT INTO `PhotosCarrousel` (`id`, `nom`) VALUES
(1, 'breakingJourney.jpg'),
(2, '870x489_red_bull_bc_one--jpg.jpg'),
(3, 'dans.jpg'),
(4, 'e23f197d1fc1118afa9ddfcd21c3d85a.jpeg'),
(5, 'grafity.jpg'),
(6, 'evenementVierzon.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id` int NOT NULL,
  `nom_utilisateur` varchar(255) NOT NULL,
  `prenom_utilisateur` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_inscription` datetime DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(255) NOT NULL,
  `validation_email` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id`, `nom_utilisateur`, `prenom_utilisateur`, `mot_de_passe`, `email`, `role`, `date_inscription`, `token`, `validation_email`) VALUES
(3, 'Admin', 'user', '$2y$10$6XXA1fdBC3CBfkIOsu3Q8uQ5GuOLAuSvzyVX0rASYHKqISv5zHZ0m', 'admin.user@gmail.com', 'administrateur', '2024-06-28 06:51:50', 'EmailValide', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Visiteur`
--

CREATE TABLE `Visiteur` (
  `id` int NOT NULL,
  `session_id` varchar(50) NOT NULL,
  `nom_utilisateur` varchar(50) DEFAULT NULL,
  `mot_de_passe` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `visites` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Visiteur`
--

INSERT INTO `Visiteur` (`id`, `session_id`, `nom_utilisateur`, `mot_de_passe`, `email`, `visites`) VALUES
(1, '667d884059d78', NULL, NULL, NULL, 37);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Accueil`
--
ALTER TABLE `Accueil`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Apropos`
--
ALTER TABLE `Apropos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Contact`
--
ALTER TABLE `Contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Evenement`
--
ALTER TABLE `Evenement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Message`
--
ALTER TABLE `Message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expediteur_id` (`expediteur_id`),
  ADD KEY `destinataire_id` (`destinataire_id`);

--
-- Index pour la table `Messagerie`
--
ALTER TABLE `Messagerie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `Partners`
--
ALTER TABLE `Partners`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `PhotosCarrousel`
--
ALTER TABLE `PhotosCarrousel`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `Visiteur`
--
ALTER TABLE `Visiteur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `session_id` (`session_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Accueil`
--
ALTER TABLE `Accueil`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Apropos`
--
ALTER TABLE `Apropos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Contact`
--
ALTER TABLE `Contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Evenement`
--
ALTER TABLE `Evenement`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Message`
--
ALTER TABLE `Message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Messagerie`
--
ALTER TABLE `Messagerie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Partners`
--
ALTER TABLE `Partners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `PhotosCarrousel`
--
ALTER TABLE `PhotosCarrousel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Visiteur`
--
ALTER TABLE `Visiteur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Message`
--
ALTER TABLE `Message`
  ADD CONSTRAINT `Message_ibfk_1` FOREIGN KEY (`expediteur_id`) REFERENCES `Utilisateur` (`id`),
  ADD CONSTRAINT `Message_ibfk_2` FOREIGN KEY (`destinataire_id`) REFERENCES `Utilisateur` (`id`);

--
-- Contraintes pour la table `Messagerie`
--
ALTER TABLE `Messagerie`
  ADD CONSTRAINT `Messagerie_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `Utilisateur` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
