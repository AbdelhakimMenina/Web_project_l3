-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 22 avr. 2022 à 22:08
-- Version du serveur :  5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `app`
--

-- --------------------------------------------------------

--
-- Structure de la table `autheur`
--

DROP TABLE IF EXISTS `autheur`;
CREATE TABLE IF NOT EXISTS `autheur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(25) COLLATE utf8_bin NOT NULL,
  `Prenom` varchar(25) COLLATE utf8_bin NOT NULL,
  `Email` varchar(30) COLLATE utf8_bin NOT NULL,
  `Institution` varchar(12) COLLATE utf8_bin NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `autheur`
--

INSERT INTO `autheur` (`id`, `Nom`, `Prenom`, `Email`, `Institution`, `id_user`) VALUES
(8, 'fff', 'ff', 'ff@gmail.com', 'ff', 1),
(7, 'Karimi', 'Yassin', 'Yassin@gmail.com', 'Prof', 12),
(6, 'Karimi', 'Yassin', 'Yassin@gmail.com', 'Prof', 12),
(9, 'fff', 'ff', 'ff@gmail.com', 'ff', 1);

-- --------------------------------------------------------

--
-- Structure de la table `composants_regles`
--

DROP TABLE IF EXISTS `composants_regles`;
CREATE TABLE IF NOT EXISTS `composants_regles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text COLLATE utf8_bin NOT NULL,
  `liste` text COLLATE utf8_bin NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `essaie`
--

DROP TABLE IF EXISTS `essaie`;
CREATE TABLE IF NOT EXISTS `essaie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(225) COLLATE utf8_bin NOT NULL,
  `adress` varchar(225) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

DROP TABLE IF EXISTS `langue`;
CREATE TABLE IF NOT EXISTS `langue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_bin NOT NULL,
  `type_langue` text COLLATE utf8_bin,
  `aire_géographique` text COLLATE utf8_bin,
  `Abréviation` text COLLATE utf8_bin,
  `statut` text COLLATE utf8_bin,
  `Ecriture` text COLLATE utf8_bin,
  `situation_socio` text COLLATE utf8_bin,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `langue`
--

INSERT INTO `langue` (`id`, `name`, `type_langue`, `aire_géographique`, `Abréviation`, `statut`, `Ecriture`, `situation_socio`, `id_user`) VALUES
(7, 'Francais', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(8, 'Bengali', NULL, NULL, NULL, NULL, NULL, NULL, 13),
(19, 'Vietnamien', NULL, NULL, NULL, NULL, NULL, NULL, 25),
(18, 'Bengali', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(21, 'Vietnamien', NULL, NULL, NULL, NULL, NULL, NULL, 25);

-- --------------------------------------------------------

--
-- Structure de la table `mot_liaison`
--

DROP TABLE IF EXISTS `mot_liaison`;
CREATE TABLE IF NOT EXISTS `mot_liaison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Mot` int(11) NOT NULL,
  `catégorie` int(11) NOT NULL,
  `commentaire` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Note` text COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `Created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `FK_user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`Id`, `Note`, `user_id`, `Created`) VALUES
(1, 'Verification des informations entrer par l editeur Mohamed Jalan Ji ', 1, '2022-04-12 23:58:29'),
(2, 'Hello', 11, '2022-04-13 22:01:06'),
(11, '  \r\n                      Hellooo     ', 13, '2022-04-13 22:01:23'),
(12, ' Mohamed il dois ajouter', 12, '2022-04-14 00:20:10');

-- --------------------------------------------------------

--
-- Structure de la table `règles`
--

DROP TABLE IF EXISTS `règles`;
CREATE TABLE IF NOT EXISTS `règles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num` int(11) NOT NULL,
  `titre` text COLLATE utf8_bin NOT NULL,
  `nb comp` int(11) NOT NULL,
  `liste_composante` text COLLATE utf8_bin NOT NULL,
  `syntaxe_composition` text COLLATE utf8_bin NOT NULL,
  `Sémantique` text COLLATE utf8_bin NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `typologique`
--

DROP TABLE IF EXISTS `typologique`;
CREATE TABLE IF NOT EXISTS `typologique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Information_typologique` int(11) NOT NULL,
  `Déclinaison` int(11) NOT NULL,
  `Genre` int(11) NOT NULL,
  `Nombre_grammatical` int(11) NOT NULL,
  `Langue_à_classificateurs` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) COLLATE utf8_bin NOT NULL,
  `first_name` varchar(25) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `role` enum('Admin','Visiteur','Editeur','') COLLATE utf8_bin NOT NULL DEFAULT 'Visiteur',
  `phone` varchar(25) COLLATE utf8_bin NOT NULL,
  `genre` enum('Femme','Homme') COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID`, `name`, `first_name`, `email`, `password`, `role`, `phone`, `genre`) VALUES
(25, 'MOUSSAOUI', 'Chorouk', 'choroukmouss@gmail.com', '$2y$10$ZbmKJSahybEf/GlJq2bGGemBa8mhbz4obujY1FCsdMrS2YHpBJWwC', 'Admin', '08162718192', 'Femme'),
(14, 'Mallayna', 'Imane', 'Mellaynaimane@gmail.com', 'imane2003', 'Visiteur', '0641384285', 'Femme'),
(12, 'Al jalanji', 'Mohamed', 'Mohamed@gmailm.com', 'Mohamed1998', 'Visiteur', '0987654', 'Homme'),
(13, 'Many', 'Malavigua', 'Many@gmail.com', 'Malavigua1999', 'Editeur', '0641384285', 'Femme'),
(17, 'Sebgui', 'Halima', 'Halima@gmail.com', 'Halima_2002', 'Visiteur', '08162718192', 'Femme'),
(22, 'sabghui', 'Halima', 'Halima@gmail.com', 'halima2009', 'Visiteur', '08162718192', 'Femme'),
(26, 'MOUSSAOUI', 'Chorouk', 'chorouk.moussaoui@ump.ac.ma', '$2y$10$hpxW0f45qK6bovocq5XUuO2wwxPWvXSnh64W41GzXnpEvv/7vU2Va', 'Visiteur', '08162718192', 'Femme');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
