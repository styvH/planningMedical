-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 25 mai 2022 à 03:53
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `planning_medical`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `Id_ACTIVITE` int NOT NULL AUTO_INCREMENT,
  `description` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_journee` int DEFAULT NULL,
  `derniere_minute` tinyint(1) NOT NULL DEFAULT '0',
  `Id_TYPE_ACTIVITE` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombreMedecinActuel` int NOT NULL DEFAULT '0',
  `Id_Medecin` int DEFAULT NULL,
  `valide` tinyint(1) DEFAULT '0',
  `date_debut` date NOT NULL,
  `heure_debut` int NOT NULL,
  `heure_fin` int NOT NULL,
  `renouveler` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id_ACTIVITE`),
  KEY `Id_Medecin` (`Id_Medecin`),
  KEY `Id_TYPE_ACTIVITE` (`Id_TYPE_ACTIVITE`),
  KEY `id_jour_debut` (`id_journee`),
  KEY `heure_debut` (`heure_debut`),
  KEY `heure_fin` (`heure_fin`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`Id_ACTIVITE`, `description`, `id_journee`, `derniere_minute`, `Id_TYPE_ACTIVITE`, `nombreMedecinActuel`, `Id_Medecin`, `valide`, `date_debut`, `heure_debut`, `heure_fin`, `renouveler`) VALUES
(8, 'test', 9, 0, 'A', 0, NULL, NULL, '2022-05-10', 4, 8, 0),
(10, 'd', 11, 1, 'G', 0, NULL, NULL, '2022-05-17', 2, 1, 1),
(11, 'gzgz', 12, 0, 'G', 1, NULL, NULL, '2022-05-02', 3, 7, 0),
(12, 'tzg', 13, 0, 'A', 1, NULL, NULL, '2022-05-29', 2, 7, 0),
(13, 'zfzf', 14, 0, 'G', 1, NULL, NULL, '2022-05-24', 3, 5, 0);

-- --------------------------------------------------------

--
-- Structure de la table `effectuer`
--

DROP TABLE IF EXISTS `effectuer`;
CREATE TABLE IF NOT EXISTS `effectuer` (
  `Id_Medecin` int NOT NULL,
  `Id_ACTIVITE` int NOT NULL,
  `astreinte__o_n_` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`Id_Medecin`,`Id_ACTIVITE`),
  KEY `Id_ACTIVITE` (`Id_ACTIVITE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `effectuer`
--

INSERT INTO `effectuer` (`Id_Medecin`, `Id_ACTIVITE`, `astreinte__o_n_`) VALUES
(2, 12, NULL),
(2, 13, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `heure`
--

DROP TABLE IF EXISTS `heure`;
CREATE TABLE IF NOT EXISTS `heure` (
  `idHeure` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idHeure`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `heure`
--

INSERT INTO `heure` (`idHeure`) VALUES
(0),
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23);

-- --------------------------------------------------------

--
-- Structure de la table `journee`
--

DROP TABLE IF EXISTS `journee`;
CREATE TABLE IF NOT EXISTS `journee` (
  `idJournee` int NOT NULL AUTO_INCREMENT,
  `jourSemaine` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `jourDate` int NOT NULL,
  `mois` int NOT NULL,
  `annee` int NOT NULL,
  PRIMARY KEY (`idJournee`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `journee`
--

INSERT INTO `journee` (`idJournee`, `jourSemaine`, `jourDate`, `mois`, `annee`) VALUES
(1, 'Vendredi', 8, 4, 2022),
(2, 'Mercredi', 4, 5, 2022),
(3, 'Lundi', 2, 5, 2022),
(4, 'Mardi', 3, 5, 2022),
(5, 'Mercredi', 4, 5, 2022),
(6, 'Jeudi', 5, 5, 2022),
(7, 'Vendredi', 6, 5, 2022),
(8, 'Samedi', 7, 5, 2022),
(9, 'Dimanche', 8, 5, 2022),
(10, 'Mercredi', 11, 5, 2022),
(11, 'Mardi', 17, 5, 2022),
(12, 'Lundi', 2, 5, 2022),
(13, 'Dimanche', 29, 5, 2022),
(14, 'Mardi', 24, 5, 2022);

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

DROP TABLE IF EXISTS `medecin`;
CREATE TABLE IF NOT EXISTS `medecin` (
  `idMedecin` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `coordonnees` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombreMinimumGarde` int DEFAULT '0',
  `nombreMaximumGarde` int DEFAULT '0',
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mdp` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idMedecin`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`idMedecin`, `nom`, `prenom`, `coordonnees`, `mail`, `adresse`, `nombreMinimumGarde`, `nombreMaximumGarde`, `login`, `mdp`) VALUES
(1, 'FIRST', 'prems', NULL, NULL, NULL, 0, 0, 'first', 'az'),
(2, 'SECOND', 'deux', 'ze', 'ze', 'ez', 0, 0, 'second', 'az'),
(3, 'RESPFIRST', 'RespPrenom', 'cooo', 'm@mal.com', 'adrest', 0, 0, 'resp', 'az'),
(4, 'test', 'az', 'de', 'ef@gmail.com', 'ef', 2, 5, 'test', '$2y$12$X/CidPVaRCvz8rtWfSVHmOg2xRx51xPneT1gYJLa.epVdw4CQjGPC');

-- --------------------------------------------------------

--
-- Structure de la table `responsable_planning`
--

DROP TABLE IF EXISTS `responsable_planning`;
CREATE TABLE IF NOT EXISTS `responsable_planning` (
  `idMedecin` int NOT NULL,
  PRIMARY KEY (`idMedecin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `responsable_planning`
--

INSERT INTO `responsable_planning` (`idMedecin`) VALUES
(2),
(3);

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

DROP TABLE IF EXISTS `secteur`;
CREATE TABLE IF NOT EXISTS `secteur` (
  `Id_SECTEUR` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nomSecteur` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombreMedecinRequis` int DEFAULT '0',
  PRIMARY KEY (`Id_SECTEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `secteur`
--

INSERT INTO `secteur` (`Id_SECTEUR`, `nomSecteur`, `nombreMedecinRequis`) VALUES
('', '', 0),
('secAc', 'etfe', 3),
('TST', 'secteur test', 3);

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `Id_Medecin` int NOT NULL,
  `mois` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `annee` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nombreGarde` int DEFAULT '0',
  `nombreAstreinte` int DEFAULT '0',
  `nomHeuresTravaille` int NOT NULL,
  PRIMARY KEY (`Id_Medecin`,`mois`,`annee`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `support`
--

DROP TABLE IF EXISTS `support`;
CREATE TABLE IF NOT EXISTS `support` (
  `id` int NOT NULL AUTO_INCREMENT,
  `post` text NOT NULL,
  `IdMedecin` int DEFAULT NULL,
  `retour` text,
  PRIMARY KEY (`id`),
  KEY `Id_Medecin` (`IdMedecin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_activite`
--

DROP TABLE IF EXISTS `type_activite`;
CREATE TABLE IF NOT EXISTS `type_activite` (
  `Id_TYPE_ACTIVITE` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `abreviation` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `libelle_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `secteur` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id_TYPE_ACTIVITE`),
  KEY `secteur` (`secteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `type_activite`
--

INSERT INTO `type_activite` (`Id_TYPE_ACTIVITE`, `abreviation`, `libelle_type`, `description_type`, `secteur`) VALUES
('A', 'ast', 'Astreinte', NULL, NULL),
('G', 'gar', 'Garde', 'Les médecins s\'occupent des secteurs', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activite`
--
ALTER TABLE `activite`
  ADD CONSTRAINT `activite_ibfk_1` FOREIGN KEY (`Id_Medecin`) REFERENCES `responsable_planning` (`idMedecin`),
  ADD CONSTRAINT `activite_ibfk_3` FOREIGN KEY (`Id_TYPE_ACTIVITE`) REFERENCES `type_activite` (`Id_TYPE_ACTIVITE`),
  ADD CONSTRAINT `activite_ibfk_4` FOREIGN KEY (`id_journee`) REFERENCES `journee` (`idJournee`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `activite_ibfk_6` FOREIGN KEY (`heure_debut`) REFERENCES `heure` (`idHeure`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `activite_ibfk_7` FOREIGN KEY (`heure_fin`) REFERENCES `heure` (`idHeure`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `effectuer`
--
ALTER TABLE `effectuer`
  ADD CONSTRAINT `effectuer_ibfk_1` FOREIGN KEY (`Id_ACTIVITE`) REFERENCES `activite` (`Id_ACTIVITE`),
  ADD CONSTRAINT `effectuer_ibfk_2` FOREIGN KEY (`Id_Medecin`) REFERENCES `medecin` (`idMedecin`);

--
-- Contraintes pour la table `responsable_planning`
--
ALTER TABLE `responsable_planning`
  ADD CONSTRAINT `responsable_planning_ibfk_1` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`idMedecin`);

--
-- Contraintes pour la table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`Id_Medecin`) REFERENCES `medecin` (`idMedecin`);

--
-- Contraintes pour la table `support`
--
ALTER TABLE `support`
  ADD CONSTRAINT `support_ibfk_1` FOREIGN KEY (`IdMedecin`) REFERENCES `medecin` (`idMedecin`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `type_activite`
--
ALTER TABLE `type_activite`
  ADD CONSTRAINT `type_activite_ibfk_1` FOREIGN KEY (`secteur`) REFERENCES `secteur` (`Id_SECTEUR`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
