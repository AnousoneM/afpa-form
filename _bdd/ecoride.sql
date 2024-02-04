-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 04 fév. 2024 à 21:37
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecoride`
--
CREATE DATABASE IF NOT EXISTS `ecoride` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ecoride`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `mail_admin` varchar(50) NOT NULL,
  `mdp_admin` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `mail_admin` (`mail_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE IF NOT EXISTS `entreprise` (
  `id_entreprise` int(11) NOT NULL AUTO_INCREMENT,
  `nom_entreprise` varchar(50) NOT NULL,
  `mail_entreprise` varchar(50) NOT NULL,
  `mdp_entreprise` varchar(255) NOT NULL,
  `siret_entreprise` varchar(14) NOT NULL,
  `adresse_entreprise` varchar(50) NOT NULL,
  `postal_entreprise` varchar(50) NOT NULL,
  `ville_entreprise` varchar(50) NOT NULL,
  `photo_entreprise` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_entreprise`),
  UNIQUE KEY `siret_entreprise` (`siret_entreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE IF NOT EXISTS `events` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `date_debut_event` date NOT NULL,
  `date_fin_event` date NOT NULL,
  `nom_challenge` varchar(50) NOT NULL,
  `description_challenge` varchar(50) DEFAULT NULL,
  `photo_event` varchar(50) DEFAULT NULL,
  `id_entreprise` int(11) NOT NULL,
  PRIMARY KEY (`id_event`),
  KEY `id_entreprise` (`id_entreprise`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `event_transport`
--

CREATE TABLE IF NOT EXISTS `event_transport` (
  `id_event` int(11) NOT NULL,
  `id_transport` int(11) NOT NULL,
  PRIMARY KEY (`id_event`,`id_transport`),
  KEY `id_transport` (`id_transport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

CREATE TABLE IF NOT EXISTS `trajet` (
  `id_trajet` int(11) NOT NULL AUTO_INCREMENT,
  `date_trajet` date NOT NULL,
  `distance_trajet` float NOT NULL,
  `temps_trajet` int(11) NOT NULL,
  `photo_trajet` varchar(50) DEFAULT NULL,
  `id_transport` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_trajet`),
  KEY `id_transport` (`id_transport`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `trajet`
--

INSERT INTO `trajet` (`id_trajet`, `date_trajet`, `distance_trajet`, `temps_trajet`, `photo_trajet`, `id_transport`, `id_utilisateur`) VALUES
(1, '2024-01-22', 10, 30, NULL, 2, 10),
(2, '2024-01-31', 1200, 120, NULL, 2, 15),
(16, '2024-02-04', 150, 120, NULL, 1, 15);

-- --------------------------------------------------------

--
-- Structure de la table `transport`
--

CREATE TABLE IF NOT EXISTS `transport` (
  `id_transport` int(11) NOT NULL AUTO_INCREMENT,
  `type_transport` varchar(50) NOT NULL,
  PRIMARY KEY (`id_transport`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_participant` varchar(50) NOT NULL,
  `prenom_participant` varchar(50) NOT NULL,
  `pseudo_participant` varchar(50) NOT NULL,
  `naissance_participant` date NOT NULL,
  `mail_participant` varchar(50) NOT NULL,
  `mdp_participant` varchar(255) NOT NULL,
  `photo_participant` varchar(50) DEFAULT NULL,
  `description_participant` varchar(300) DEFAULT NULL,
  `valide_participant` tinyint(4) NOT NULL,
  `id_entreprise` int(11) NOT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `pseudo_participant` (`pseudo_participant`),
  UNIQUE KEY `mail_participant` (`mail_participant`),
  KEY `id_entreprise` (`id_entreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_participant`, `prenom_participant`, `pseudo_participant`, `naissance_participant`, `mail_participant`, `mdp_participant`, `photo_participant`, `description_participant`, `valide_participant`, `id_entreprise`) VALUES
(10, 'DOE', 'John', 'dodo76', '2024-01-17', 'john.doe@gmail.com', '$2y$10$IP51Phc6BOcttc54hDi0fO/KoDtka8/QeYJJvFhVTdemsJUp4iS9G', 'default.jpg', NULL, 0, 1),
(12, 'TOTTO', 'TTAT', 'tto89', '2024-01-10', 'mitsuki@gmail.com', '$2y$10$IWlbyY.SARiopc2WoEEUcOmDVnNxwcZi55Hn5hhFUGS8N3wsDpltm', 'default.jpg', NULL, 0, 2),
(13, 'TOTOT', 'aaeza', 'zaeazezae', '2024-01-03', 'aze@aze.Fr', '$2y$10$5wfZ0ILSGmgAJNqgFrJQpucSP6pt.WN8k8hShLEMAf.hf4GR6zPc.', 'default.jpg', NULL, 0, 1),
(14, 'TOTO', 'TATA', 'caca78', '2012-12-12', 'caca@caca.fr', '$2y$10$DRAbMq4rEN8XyAol3JPy8e1JCzS7IkG3UlVh6GUoju5Ql25HRv.3e', 'default.jpg', NULL, 1, 1),
(15, 'DOLO', 'Janna', 'Joey', '2024-01-15', 'jane.doe@mail.fr', '$2y$10$7IXtkUNR6rKxu7hXGW.pX.ywvQiryBxwsRYYWHhm2ymbe7D8vGm.S', '65bfc91c5980a.jpg', 'J\'aime League Of Legends', 1, 1),
(16, 'TOTO', 'TATA', 'tota', '2024-01-22', 'tota@mail.fr', '$2y$10$5cpPDgXW19yFjO1Mb03pOOulq.87.88YnqXZUEDGfQIXqzHQ0D/vi', 'default.jpg', NULL, 1, 1),
(17, 'toto', 'tata', 'toto86', '2024-01-03', 'tato@mail.fr', '$2y$10$QSIH0AoKybLP568CiJM54eGzRJ22b8OVnbHIlW3SFpL/5uvc41o5W', 'default.jpg', NULL, 1, 1);

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
