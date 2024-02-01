-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 01 fév. 2024 à 12:20
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `metro_boulot_dodo`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `mail_admin` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `mdp_admin` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id_entreprise` int NOT NULL,
  `nom_entreprise` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `mail_entreprise` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `mdp_entreprise` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `siret_entreprise` varchar(14) COLLATE utf8mb4_general_ci NOT NULL,
  `adresse_entreprise` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `postal_entreprise` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ville_entreprise` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `photo_entreprise` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id_entreprise`, `nom_entreprise`, `mail_entreprise`, `mdp_entreprise`, `siret_entreprise`, `adresse_entreprise`, `postal_entreprise`, `ville_entreprise`, `photo_entreprise`) VALUES
(1, 'Bad Company', 'badcompany@mail.fr', 'aze1231aze321321az3e21', '12345678978945', 'sqdd', '76610', 'LE HAVRE', NULL),
(2, 'Afpa', 'afpa@mail.fr', 'fsdfdsfdsf98798798sdfsddsfsdf', '78945612374185', 'sqdd', '76610', 'LE HAVRE', NULL),
(3, 'Gouvernement', 'gouv@mail.fr', 'qsdqsdqsdllkjlkjlkj', '12345678945631', 'sqdfff', '76600', 'LE HAVRE', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id_event` int NOT NULL,
  `date_debut_event` date NOT NULL,
  `date_fin_event` date NOT NULL,
  `nom_challenge` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `description_challenge` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo_event` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_entreprise` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `event_transport`
--

CREATE TABLE `event_transport` (
  `id_event` int NOT NULL,
  `id_transport` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

CREATE TABLE `trajet` (
  `id_trajet` int NOT NULL,
  `date_trajet` date NOT NULL,
  `distance_trajet` float NOT NULL,
  `temps_trajet` int NOT NULL,
  `photo_trajet` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_transport` int NOT NULL,
  `id_utilisateur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `trajet`
--

INSERT INTO `trajet` (`id_trajet`, `date_trajet`, `distance_trajet`, `temps_trajet`, `photo_trajet`, `id_transport`, `id_utilisateur`) VALUES
(1, '2024-01-22', 10, 30, NULL, 2, 10),
(2, '2024-01-31', 1200, 120, NULL, 2, 15),
(3, '2024-01-31', 3000, 120, NULL, 4, 15),
(4, '2024-01-31', 3000, 120, NULL, 1, 15);

-- --------------------------------------------------------

--
-- Structure de la table `transport`
--

CREATE TABLE `transport` (
  `id_transport` int NOT NULL,
  `type_transport` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `transport`
--

INSERT INTO `transport` (`id_transport`, `type_transport`) VALUES
(1, 'Vélo'),
(2, 'Skate'),
(3, 'Marche'),
(4, 'Roller'),
(5, 'Trottinette');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int NOT NULL,
  `nom_participant` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom_participant` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pseudo_participant` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `naissance_participant` date NOT NULL,
  `mail_participant` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `mdp_participant` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `photo_participant` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description_participant` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `valide_participant` tinyint NOT NULL,
  `id_entreprise` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_participant`, `prenom_participant`, `pseudo_participant`, `naissance_participant`, `mail_participant`, `mdp_participant`, `photo_participant`, `description_participant`, `valide_participant`, `id_entreprise`) VALUES
(10, 'DOE', 'John', 'dodo76', '2024-01-17', 'john.doe@gmail.com', '$2y$10$IP51Phc6BOcttc54hDi0fO/KoDtka8/QeYJJvFhVTdemsJUp4iS9G', NULL, NULL, 0, 1),
(12, 'TOTTO', 'TTAT', 'tto89', '2024-01-10', 'mitsuki@gmail.com', '$2y$10$IWlbyY.SARiopc2WoEEUcOmDVnNxwcZi55Hn5hhFUGS8N3wsDpltm', NULL, NULL, 0, 2),
(13, 'TOTOT', 'aaeza', 'zaeazezae', '2024-01-03', 'aze@aze.Fr', '$2y$10$5wfZ0ILSGmgAJNqgFrJQpucSP6pt.WN8k8hShLEMAf.hf4GR6zPc.', NULL, NULL, 0, 1),
(14, 'TOTO', 'TATA', 'caca78', '2012-12-12', 'caca@caca.fr', '$2y$10$DRAbMq4rEN8XyAol3JPy8e1JCzS7IkG3UlVh6GUoju5Ql25HRv.3e', NULL, NULL, 1, 1),
(15, 'DOE', 'Jane', 'Jane76', '2024-01-15', 'jane.doe@mail.fr', '$2y$10$7IXtkUNR6rKxu7hXGW.pX.ywvQiryBxwsRYYWHhm2ymbe7D8vGm.S', NULL, NULL, 1, 2),
(16, 'TOTO', 'TATA', 'tota', '2024-01-22', 'tota@mail.fr', '$2y$10$5cpPDgXW19yFjO1Mb03pOOulq.87.88YnqXZUEDGfQIXqzHQ0D/vi', NULL, NULL, 1, 1),
(17, 'toto', 'tata', 'toto86', '2024-01-03', 'tato@mail.fr', '$2y$10$QSIH0AoKybLP568CiJM54eGzRJ22b8OVnbHIlW3SFpL/5uvc41o5W', NULL, NULL, 1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `mail_admin` (`mail_admin`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id_entreprise`),
  ADD UNIQUE KEY `siret_entreprise` (`siret_entreprise`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_entreprise` (`id_entreprise`);

--
-- Index pour la table `event_transport`
--
ALTER TABLE `event_transport`
  ADD PRIMARY KEY (`id_event`,`id_transport`),
  ADD KEY `id_transport` (`id_transport`);

--
-- Index pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD PRIMARY KEY (`id_trajet`),
  ADD KEY `id_transport` (`id_transport`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id_transport`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `pseudo_participant` (`pseudo_participant`),
  ADD UNIQUE KEY `mail_participant` (`mail_participant`),
  ADD KEY `id_entreprise` (`id_entreprise`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id_entreprise` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `id_trajet` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `transport`
--
ALTER TABLE `transport`
  MODIFY `id_transport` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`);

--
-- Contraintes pour la table `event_transport`
--
ALTER TABLE `event_transport`
  ADD CONSTRAINT `event_transport_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `events` (`id_event`),
  ADD CONSTRAINT `event_transport_ibfk_2` FOREIGN KEY (`id_transport`) REFERENCES `transport` (`id_transport`);

--
-- Contraintes pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD CONSTRAINT `trajet_ibfk_1` FOREIGN KEY (`id_transport`) REFERENCES `transport` (`id_transport`),
  ADD CONSTRAINT `trajet_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
