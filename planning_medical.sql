-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 24 mai 2022 à 20:44
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
  `heure_debut` int NOT NULL,
  `heure_fin` int NOT NULL,
  `id_journee` int NOT NULL,
  `nombreMedecinActuel` int NOT NULL DEFAULT '0',
  `renouveler` tinyint(1) NOT NULL DEFAULT '0',
  `derniere_minute` tinyint(1) NOT NULL DEFAULT '0',
  `valide` tinyint(1) DEFAULT '0',
  `Id_Medecin` int DEFAULT NULL,
  `Id_TYPE_ACTIVITE` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id_ACTIVITE`),
  KEY `Id_Medecin` (`Id_Medecin`),
  KEY `Id_TYPE_ACTIVITE` (`Id_TYPE_ACTIVITE`),
  KEY `id_jour_debut` (`id_journee`),
  KEY `heure_debut` (`heure_debut`),
  KEY `heure_fin` (`heure_fin`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`Id_ACTIVITE`, `description`, `heure_debut`, `heure_fin`, `id_journee`, `nombreMedecinActuel`, `renouveler`, `derniere_minute`, `valide`, `Id_Medecin`, `Id_TYPE_ACTIVITE`) VALUES
(1, 'test', 4, 8, 2, 0, 0, 0, NULL, NULL, 'A'),
(2, 'test', 4, 8, 3, 0, 0, 0, NULL, NULL, 'A'),
(3, 'test', 4, 8, 4, 0, 0, 0, NULL, NULL, 'A'),
(4, 'test', 4, 8, 5, 0, 0, 0, NULL, NULL, 'A'),
(5, 'test', 4, 8, 6, 0, 0, 0, NULL, NULL, 'A'),
(6, 'test', 4, 8, 7, 0, 0, 0, NULL, NULL, 'A'),
(7, 'test', 4, 8, 8, 0, 0, 0, NULL, NULL, 'A'),
(8, 'test', 4, 8, 9, 0, 0, 0, NULL, NULL, 'A');

-- --------------------------------------------------------

--
-- Structure de la table `effectuer`
--

DROP TABLE IF EXISTS `effectuer`;
CREATE TABLE IF NOT EXISTS `effectuer` (
  `Id_Medecin` int NOT NULL,
  `Id_ACTIVITE` int NOT NULL,
  `idJournee` int NOT NULL,
  `idHeure` int NOT NULL,
  `astreinte__o_n_` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`Id_Medecin`,`Id_ACTIVITE`),
  KEY `Id_ACTIVITE` (`Id_ACTIVITE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

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
(9, 'Dimanche', 8, 5, 2022);

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
  `mdp` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
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
(4, 'test', 'az', 'de', 'ef', 'ef', 0, 0, 'test', 'az');

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
-- Contraintes pour la table `type_activite`
--
ALTER TABLE `type_activite`
  ADD CONSTRAINT `type_activite_ibfk_1` FOREIGN KEY (`secteur`) REFERENCES `secteur` (`Id_SECTEUR`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
