-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 11 déc. 2020 à 17:40
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `grainotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `aromatiques`
--

DROP TABLE IF EXISTS `aromatiques`;
CREATE TABLE IF NOT EXISTS `aromatiques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `espece` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock` smallint(5) DEFAULT NULL,
  `latin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `famille` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cycle` tinyint(1) DEFAULT NULL,
  `couleur` tinyint(4) DEFAULT NULL,
  `debut_floraison` tinyint(1) DEFAULT NULL,
  `fin_floraison` tinyint(1) DEFAULT NULL,
  `hauteur` tinyint(4) DEFAULT NULL,
  `debut_semis` tinyint(1) DEFAULT NULL,
  `fin_semis` tinyint(1) DEFAULT NULL,
  `type_semis` text COLLATE utf8_unicode_ci,
  `technique` text COLLATE utf8_unicode_ci,
  `exposition` tinyint(1) DEFAULT NULL,
  `pollinisateur` tinyint(1) DEFAULT NULL,
  `infos` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `aromatiques`
--

INSERT INTO `aromatiques` (`id`, `espece`, `stock`, `latin`, `famille`, `cycle`, `couleur`, `debut_floraison`, `fin_floraison`, `hauteur`, `debut_semis`, `fin_semis`, `type_semis`, `technique`, `exposition`, `pollinisateur`, `infos`) VALUES
(1, 'Aneth odorant', 3, 'Anethum graveolens', 'Apiacées', 1, 1, 6, 10, 100, 4, 5, 'En place (ne supporte pas le repiquage)', '', 1, 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `fleurs_horticoles`
--

DROP TABLE IF EXISTS `fleurs_horticoles`;
CREATE TABLE IF NOT EXISTS `fleurs_horticoles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `espece` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock` smallint(5) DEFAULT NULL,
  `latin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `famille` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cycle` tinyint(1) DEFAULT NULL,
  `couleur` tinyint(4) DEFAULT NULL,
  `debut_floraison` tinyint(1) DEFAULT NULL,
  `fin_floraison` tinyint(1) DEFAULT NULL,
  `hauteur` tinyint(4) DEFAULT NULL,
  `debut_semis` tinyint(1) DEFAULT NULL,
  `fin_semis` tinyint(1) DEFAULT NULL,
  `type_semis` text COLLATE utf8_unicode_ci,
  `technique` text COLLATE utf8_unicode_ci,
  `exposition` tinyint(1) DEFAULT NULL,
  `pollinisateur` tinyint(1) DEFAULT NULL,
  `infos` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fleurs_sauvages_locales`
--

DROP TABLE IF EXISTS `fleurs_sauvages_locales`;
CREATE TABLE IF NOT EXISTS `fleurs_sauvages_locales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `espece` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock` smallint(5) DEFAULT NULL,
  `latin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `famille` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cycle` tinyint(1) DEFAULT NULL,
  `couleur` tinyint(4) DEFAULT NULL,
  `debut_floraison` tinyint(1) DEFAULT NULL,
  `fin_floraison` tinyint(1) DEFAULT NULL,
  `hauteur` tinyint(4) DEFAULT NULL,
  `debut_semis` tinyint(1) DEFAULT NULL,
  `fin_semis` tinyint(1) DEFAULT NULL,
  `culture` tinyint(1) DEFAULT NULL,
  `technique` text COLLATE utf8_unicode_ci,
  `exposition` tinyint(1) DEFAULT NULL,
  `pollinisateur` tinyint(1) DEFAULT NULL,
  `infos` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `fleurs_sauvages_locales`
--

INSERT INTO `fleurs_sauvages_locales` (`id`, `espece`, `stock`, `latin`, `famille`, `cycle`, `couleur`, `debut_floraison`, `fin_floraison`, `hauteur`, `debut_semis`, `fin_semis`, `culture`, `technique`, `exposition`, `pollinisateur`, `infos`) VALUES
(1, 'Achillée Millefeuille', 7, 'Achillea millefolium', 'Astéracées', 3, 1, 6, 9, 50, 5, 7, 1, 'Privilégier repiquages repousses', 3, 1, ''),
(2, 'Aigremoine eupatoire', 7, 'Agremonia eupatoria', 'Rosacées', 3, 2, 6, 9, 50, 8, 9, 0, 'Zoochorie', 1, 1, ''),
(3, 'Agripaume cardiaque', NULL, 'Leonurus cardiaca', 'Lamiacées', 3, 7, 6, 8, NULL, NULL, NULL, NULL, NULL, 2, 1, NULL),
(4, 'Alliaire officinale', NULL, 'Allira officinalis', 'Brassicacées', 2, NULL, 4, 6, NULL, 6, 9, NULL, NULL, 2, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `legumes`
--

DROP TABLE IF EXISTS `legumes`;
CREATE TABLE IF NOT EXISTS `legumes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `espece` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock` smallint(5) DEFAULT NULL,
  `variete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `famille` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cycle` tinyint(1) DEFAULT NULL,
  `couleur` tinyint(4) DEFAULT NULL,
  `debut_floraison` tinyint(1) DEFAULT NULL,
  `fin_floraison` tinyint(1) DEFAULT NULL,
  `hauteur` tinyint(4) DEFAULT NULL,
  `debut_semis` tinyint(1) DEFAULT NULL,
  `fin_semis` tinyint(1) DEFAULT NULL,
  `type_semis` text COLLATE utf8_unicode_ci,
  `ecartement_entre_lignes` float DEFAULT NULL,
  `ecartement_sur_lignes` float DEFAULT NULL,
  `technique` text COLLATE utf8_unicode_ci,
  `exposition` tinyint(1) DEFAULT NULL,
  `pollinisateur` tinyint(1) DEFAULT NULL,
  `infos` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `legumes`
--

INSERT INTO `legumes` (`id`, `espece`, `stock`, `variete`, `latin`, `famille`, `cycle`, `couleur`, `debut_floraison`, `fin_floraison`, `hauteur`, `debut_semis`, `fin_semis`, `type_semis`, `ecartement_entre_lignes`, `ecartement_sur_lignes`, `technique`, `exposition`, `pollinisateur`, `infos`) VALUES
(1, 'Aubergine', 5, '', 'Solanum melongena', 'Astéridées', 1, 7, 7, 10, 80, 2, 5, '2/3 graines par pot', 50, 0, 'Recouvrir d\'une terre légère. Arroser régulièrement', 4, 0, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
