-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 27 mai 2022 à 23:41
-- Version du serveur : 8.0.27
-- Version de PHP : 7.3.33

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`Id_ACTIVITE`, `description`, `derniere_minute`, `Id_TYPE_ACTIVITE`, `nombreMedecinActuel`, `Id_Medecin`, `valide`, `date_debut`, `heure_debut`, `heure_fin`, `renouveler`) VALUES
(8, 'test', 0, 'Astr', 0, NULL, NULL, '2022-05-10', 4, 8, 0),
(10, 'd', 1, 'GAR', 0, NULL, NULL, '2022-05-17', 2, 1, 1),
(11, 'gzgz', 0, 'GAR', 1, NULL, NULL, '2022-05-02', 3, 7, 0),
(12, 'tzg', 0, 'Astr', 2, NULL, NULL, '2022-05-29', 2, 7, 0),
(13, 'zfzf', 0, 'GAR', 1, NULL, NULL, '2022-05-24', 3, 5, 0),
(14, 'afa', 0, 'Astr', 0, NULL, NULL, '2022-05-19', 4, 17, 0),
(17, 'test', 0, 'Astr', 2, NULL, NULL, '2022-05-27', 13, 16, 0),
(18, '', 0, 'GAR', 1, NULL, NULL, '2022-05-28', 2, 6, 0),
(19, '', 0, 'Astr', 2, NULL, NULL, '2022-05-25', 1, 5, 0),
(20, '', 0, 'Astr', 0, NULL, NULL, '2022-05-10', 7, 11, 0),
(21, 'test', 1, 'GAR', 0, NULL, NULL, '2022-05-25', 1, 3, 1),
(22, 'absence à justifier', 0, '?abs?', 0, NULL, NULL, '2022-05-02', 7, 20, 0),
(23, '', 0, 'GAR', 0, NULL, NULL, '2022-05-18', 3, 10, 0),
(24, '', 0, 'Astr', 1, NULL, NULL, '2022-05-27', 2, 7, 0),
(25, '', 0, 'GAR', 2, NULL, NULL, '2022-05-27', 10, 4, 0),
(26, '', 0, 'GAR', 1, NULL, NULL, '2022-05-28', 4, 14, 0),
(27, '', 0, 'adm', 1, NULL, NULL, '2022-05-28', 13, 13, 0),
(28, '', 0, 'adm', 0, NULL, NULL, '2022-05-28', 13, 13, 0);

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
(2, 17, NULL),
(2, 19, NULL),
(4, 12, NULL),
(4, 17, NULL),
(4, 18, NULL),
(4, 19, NULL),
(4, 24, NULL),
(4, 25, NULL),
(4, 26, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`idMedecin`, `nom`, `prenom`, `coordonnees`, `mail`, `adresse`, `nombreMinimumGarde`, `nombreMaximumGarde`, `login`, `mdp`) VALUES
(1, 'FIRST', 'prems', NULL, NULL, NULL, 0, 0, 'first', 'az'),
(2, 'SECOND', 'deux', 'ze', 'ze', 'ez', 0, 0, 'second', 'az'),
(3, 'RESPFIRST', 'RespPrenom', 'cooo', 'tmtckic@gmail.com', 'adrest', 0, 0, 'resp', '$2y$12$ZqxkD/9718O9NduLml03y.R1SXBSERW9QTS1hbbNBsygJ1DoxIzqy'),
(4, 'test', 'az', 'de', 'ef@gmail.com', 'ef', 2, 5, 'test', '$2y$12$X/CidPVaRCvz8rtWfSVHmOg2xRx51xPneT1gYJLa.epVdw4CQjGPC'),
(5, 'MED', 'Medecin', NULL, 'mail@test.fr', NULL, 0, 0, 'medecin', 'med'),
(6, 'RESP', 'Responsable', NULL, 'resp@tet.gmail', NULL, 0, 0, 'responsable', 'resp');

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
(3),
(6);

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
('ADM', 'Administratif', 0),
('MAT', 'Maternité', 0),
('NN', 'Néonatologie', 1),
('REANN', 'Réanimation Néonatale', 2),
('REAPED', 'Réanimation Pédiatrique', 1),
('SCPED', 'Soins Continus Pédiatriques', 1),
('SINN', 'Soins Intensifs néonatals', 1),
('TEST', 'testNmm', 4),
('UK', 'Unité Kangourou', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_activite`
--

DROP TABLE IF EXISTS `type_activite`;
CREATE TABLE IF NOT EXISTS `type_activite` (
  `Id_TYPE_ACTIVITE` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `abreviation` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'X',
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
('?abs?', '?', '?absence?', 'absence en attente validation', NULL),
('acc T', 'AT', 'accident de travail', NULL, NULL),
('adm', 'X', 'Administratif', NULL, NULL),
('arr M', 'AM', 'Arrêt Maladie', NULL, NULL),
('Astr', 'A', 'Astreinte', NULL, NULL),
('Astr Card', 'A', NULL, NULL, NULL),
('C ann', 'CA', 'Congés Annuel', NULL, NULL),
('C bon', 'B', 'Congés Bonifié', NULL, NULL),
('C mat', 'T', 'Congés Maternité', NULL, NULL),
('CES', 'IG', 'CESISMA', NULL, NULL),
('CET', 'CET', 'congés sur CET', NULL, NULL),
('DISP', 'D', 'disponibilité', NULL, NULL),
('ENS', 'ES', 'Enseignement', NULL, NULL),
('EVA', 'E', 'EVASAN', NULL, NULL),
('FORM', 'F', 'Formation', 'Formation pour soi', NULL),
('GAR', 'G', 'Garde', 'Les médecins s\'occupent des secteurs', NULL),
('MIS', 'MI', 'Mission', NULL, NULL),
('RECUP', 'RQ', 'Récupération', NULL, NULL),
('REP A', 'RQ', 'Repos Astreinte', NULL, NULL),
('REP G', 'RQ', 'Repos Garde', NULL, NULL),
('RN', 'X', 'Clinique RN', NULL, NULL),
('RP', 'X', 'Clinique RP', NULL, NULL),
('RTT', 'RT', 'RTT', NULL, NULL),
('SC', 'X', 'Clinique SC', NULL, NULL),
('UK', 'X', 'Clinique UK', NULL, NULL),
('UMPS', 'X', 'Clinique UMPS', NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activite`
--
ALTER TABLE `activite`
  ADD CONSTRAINT `activite_ibfk_1` FOREIGN KEY (`Id_Medecin`) REFERENCES `responsable_planning` (`idMedecin`),
  ADD CONSTRAINT `activite_ibfk_2` FOREIGN KEY (`Id_TYPE_ACTIVITE`) REFERENCES `type_activite` (`Id_TYPE_ACTIVITE`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
