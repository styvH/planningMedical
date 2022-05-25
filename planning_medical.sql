-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 25 mai 2022 à 15:18
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
  KEY `Id_TYPE_ACTIVITE` (`Id_TYPE_ACTIVITE`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`Id_ACTIVITE`, `description`, `derniere_minute`, `Id_TYPE_ACTIVITE`, `nombreMedecinActuel`, `Id_Medecin`, `valide`, `date_debut`, `heure_debut`, `heure_fin`, `renouveler`) VALUES
(8, 'test', 0, 'A', 0, NULL, NULL, '2022-05-10', 4, 8, 0),
(10, 'd', 1, 'G', 0, NULL, NULL, '2022-05-17', 2, 1, 1),
(11, 'gzgz', 0, 'G', 1, NULL, NULL, '2022-05-02', 3, 7, 0),
(12, 'tzg', 0, 'A', 1, NULL, NULL, '2022-05-29', 2, 7, 0),
(13, 'zfzf', 0, 'G', 1, NULL, NULL, '2022-05-24', 3, 5, 0),
(14, 'afa', 0, 'A', 0, NULL, NULL, '2022-05-19', 4, 17, 0),
(17, 'test', 0, 'A', 1, NULL, NULL, '2022-05-27', 13, 16, 0),
(18, '', 0, 'G', 0, NULL, NULL, '2022-05-28', 2, 6, 0),
(19, '', 0, 'A', 0, NULL, NULL, '2022-05-25', 1, 5, 0),
(20, '', 0, 'A', 0, NULL, NULL, '2022-05-10', 7, 11, 0);

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
(2, 13, NULL),
(4, 17, NULL);

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
  `post` text COLLATE utf8_unicode_ci NOT NULL,
  `IdMedecin` int DEFAULT NULL,
  `retour` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `Id_Medecin` (`IdMedecin`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `support`
--

INSERT INTO `support` (`id`, `post`, `IdMedecin`, `retour`) VALUES
(1, 'test', 4, NULL),
(2, 'test', 4, NULL),
(8, 'tee', 4, NULL),
(9, 'tee', 4, NULL),
(10, 'Ceci est un test de ticket', 4, NULL),
(11, 'Ceci est un test de ticket', 4, NULL),
(12, 'Ceci est un test de ticket', 4, NULL),
(13, 'Ceci est un test de ticket', 4, NULL),
(14, 'For What', 4, NULL),
(15, 'For What', 4, NULL),
(16, '', 4, NULL),
(17, '', 4, NULL),
(18, '', 4, NULL),
(19, '', 4, NULL),
(20, '', 4, NULL),
(21, '', 4, NULL),
(22, '', 4, NULL),
(23, 'ff', 4, NULL),
(24, 'ffff', 4, NULL),
(25, 'ff', 4, NULL),
(26, 'ff', 4, NULL),
(27, 'ff', 4, NULL),
(28, 'ff', 4, NULL),
(29, '', 4, NULL),
(30, '', 4, NULL),
(31, '', 4, NULL),
(32, '', 4, NULL),
(33, '', 4, NULL),
(34, '', 4, NULL),
(35, '', 4, NULL),
(36, '', 4, NULL),
(37, 'dzfaf', 4, NULL),
(38, 'dzfaf', 4, NULL),
(39, 'dzfaf', 4, NULL),
(40, '', 4, NULL),
(41, '', 4, NULL),
(42, '', 4, NULL),
(43, '', 4, NULL),
(44, '', 4, NULL),
(45, '', 4, NULL),
(46, '', 4, NULL),
(47, '', 4, NULL),
(48, '', 4, NULL),
(49, '', 4, NULL),
(50, '', 4, NULL),
(51, '', 4, NULL),
(52, '', 4, NULL),
(53, '', 4, NULL),
(54, '', 4, NULL),
(55, '', 4, NULL),
(56, '', 4, NULL),
(57, '', 4, NULL),
(58, '', 4, NULL),
(59, '', 4, NULL),
(60, '', 4, NULL),
(61, '', 4, NULL),
(62, '', 4, NULL),
(63, '', 4, NULL),
(64, '', 4, NULL),
(65, '', 4, NULL),
(66, '', 4, NULL),
(67, '', 4, NULL),
(68, 'edd', 4, NULL),
(69, '', 4, NULL),
(70, 'ff', 4, NULL),
(71, 'ff', 4, NULL),
(72, 'ff', 4, NULL),
(73, 'dd', 4, NULL),
(74, 'dd', 4, NULL),
(75, 'ddd', 4, NULL),
(76, 'test', 4, NULL),
(77, 'test', 4, NULL),
(78, 'test', 4, NULL),
(79, 'test', 4, NULL),
(80, 'test', 4, NULL),
(81, 'teef', 4, NULL),
(82, 'teef', 4, NULL),
(83, 'teef', 4, NULL),
(84, 'ff', 4, NULL),
(85, 'ff', 4, NULL),
(86, 'ff', 4, NULL),
(87, 'ff', 4, NULL),
(88, 'test', 4, NULL),
(89, 'ff', 4, NULL),
(90, 'Dernier Ticket\r\n', 4, NULL),
(91, 'Dernier Ticket\r\n', 4, NULL),
(92, 'Voici', 4, NULL),
(93, 'ff', 4, NULL),
(94, 'tet', 4, NULL),
(95, 'dd', 4, NULL),
(96, 'ddd', 4, NULL),
(97, 'ff', 4, NULL),
(98, 'dd', 4, NULL),
(99, 'dd', 4, NULL),
(100, 'ff', 4, NULL),
(101, 'ff', 4, NULL),
(102, 'Nwone', 4, NULL),
(103, 'dd', 4, NULL),
(104, 'az', 4, NULL),
(105, 'ff', 4, NULL),
(106, '2224144AFZF', 4, NULL);

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
  ADD CONSTRAINT `activite_ibfk_3` FOREIGN KEY (`Id_TYPE_ACTIVITE`) REFERENCES `type_activite` (`Id_TYPE_ACTIVITE`);

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
