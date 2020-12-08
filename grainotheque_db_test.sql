-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 08 déc. 2020 à 22:33
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `grainotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `aromatiques`
--

DROP TABLE IF EXISTS `aromatiques`;
CREATE TABLE IF NOT EXISTS `aromatiques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `espece` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `latin` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `famille` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cycle` tinyint(1) NOT NULL,
  `couleur` tinyint(4) NOT NULL,
  `debut_floraison` tinyint(1) NOT NULL,
  `fin_floraison` tinyint(1) NOT NULL,
  `hauteur` tinyint(4) NOT NULL,
  `debut_semis` tinyint(1) NOT NULL,
  `fin_semis` tinyint(1) NOT NULL,
  `type_semis` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `technique` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `exposition` tinyint(1) NOT NULL,
  `pollinisateur` tinyint(1) NOT NULL,
  `infos` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `aromatiques`
--

INSERT INTO `aromatiques` (`id`, `espece`, `latin`, `famille`, `cycle`, `couleur`, `debut_floraison`, `fin_floraison`, `hauteur`, `debut_semis`, `fin_semis`, `type_semis`, `technique`, `exposition`, `pollinisateur`, `infos`) VALUES
(1, 'Aneth odorant', 'Anethum graveolens', 'Apiacées', 1, 1, 6, 10, 100, 4, 5, 'En place (ne supporte pas le repiquage)', '', 1, 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `fleurs_horticoles`
--

DROP TABLE IF EXISTS `fleurs_horticoles`;
CREATE TABLE IF NOT EXISTS `fleurs_horticoles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `espece` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `latin` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `famille` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cycle` tinyint(1) NOT NULL,
  `couleur` tinyint(4) NOT NULL,
  `debut_floraison` tinyint(1) NOT NULL,
  `fin_floraison` tinyint(1) NOT NULL,
  `hauteur` tinyint(4) NOT NULL,
  `debut_semis` tinyint(1) NOT NULL,
  `fin_semis` tinyint(1) NOT NULL,
  `type_semis` text COLLATE utf8_unicode_ci NOT NULL,
  `technique` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `exposition` tinyint(1) NOT NULL,
  `pollinisateur` tinyint(1) NOT NULL,
  `infos` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fleurs_sauvages_locales`
--

DROP TABLE IF EXISTS `fleurs_sauvages_locales`;
CREATE TABLE IF NOT EXISTS `fleurs_sauvages_locales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `espece` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `latin` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `famille` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cycle` tinyint(1) NOT NULL,
  `couleur` tinyint(4) NOT NULL,
  `debut_floraison` tinyint(1) NOT NULL,
  `fin_floraison` tinyint(1) NOT NULL,
  `hauteur` tinyint(4) NOT NULL,
  `debut_semis` tinyint(1) NOT NULL,
  `fin_semis` tinyint(1) NOT NULL,
  `culture` tinyint(1) NOT NULL,
  `technique` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `exposition` tinyint(1) NOT NULL,
  `pollinisateur` tinyint(1) NOT NULL,
  `infos` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `fleurs_sauvages_locales`
--

INSERT INTO `fleurs_sauvages_locales` (`id`, `espece`, `latin`, `famille`, `cycle`, `couleur`, `debut_floraison`, `fin_floraison`, `hauteur`, `debut_semis`, `fin_semis`, `culture`, `technique`, `exposition`, `pollinisateur`, `infos`) VALUES
(1, 'Achillée Millefeuille', 'Achillea millefolium', 'Astéracées', 3, 1, 6, 9, 50, 5, 7, 1, 'Privilégier repiquages repousses', 3, 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `graines`
--

DROP TABLE IF EXISTS `graines`;
CREATE TABLE IF NOT EXISTS `graines` (
  `id_db` int(11) NOT NULL AUTO_INCREMENT,
  `id_graine` int(11) NOT NULL,
  `categorie` tinyint(4) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id_db`),
  KEY `grainotheque_ibfk_1` (`id_graine`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `graines`
--

INSERT INTO `graines` (`id_db`, `id_graine`, `categorie`, `stock`) VALUES
(1, 1, 1, 50),
(2, 1, 3, 3),
(3, 1, 4, 10);

-- --------------------------------------------------------

--
-- Structure de la table `legumes`
--

DROP TABLE IF EXISTS `legumes`;
CREATE TABLE IF NOT EXISTS `legumes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `espece` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `variete` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latin` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `famille` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cycle` tinyint(1) NOT NULL,
  `couleur` tinyint(4) NOT NULL,
  `debut_floraison` tinyint(1) NOT NULL,
  `fin_floraison` tinyint(1) NOT NULL,
  `hauteur` tinyint(4) NOT NULL,
  `debut_semis` tinyint(1) NOT NULL,
  `fin_semis` tinyint(1) NOT NULL,
  `type_semis` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ecartement_entre_lignes` float NOT NULL,
  `ecartement_sur_lignes` float NOT NULL,
  `technique` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `exposition` tinyint(1) NOT NULL,
  `pollinisateur` tinyint(1) NOT NULL,
  `infos` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `legumes`
--

INSERT INTO `legumes` (`id`, `espece`, `variete`, `latin`, `famille`, `cycle`, `couleur`, `debut_floraison`, `fin_floraison`, `hauteur`, `debut_semis`, `fin_semis`, `type_semis`, `ecartement_entre_lignes`, `ecartement_sur_lignes`, `technique`, `exposition`, `pollinisateur`, `infos`) VALUES
(1, 'Aubergine', '', 'Solanum melongena', 'Astéridées', 1, 7, 7, 10, 80, 2, 5, '2/3 graines par pot', 50, 0, 'Recouvrir d\'une terre légère. Arroser régulièrement', 4, 0, '');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `aromatiques`
--
ALTER TABLE `aromatiques`
  ADD CONSTRAINT `aromatiques_ibfk_1` FOREIGN KEY (`id`) REFERENCES `graines` (`id_graine`);

--
-- Contraintes pour la table `fleurs_horticoles`
--
ALTER TABLE `fleurs_horticoles`
  ADD CONSTRAINT `fleurs_horticoles_ibfk_1` FOREIGN KEY (`id`) REFERENCES `graines` (`id_graine`);

--
-- Contraintes pour la table `fleurs_sauvages_locales`
--
ALTER TABLE `fleurs_sauvages_locales`
  ADD CONSTRAINT `fleurs_sauvages_locales_ibfk_1` FOREIGN KEY (`id`) REFERENCES `graines` (`id_graine`);

--
-- Contraintes pour la table `legumes`
--
ALTER TABLE `legumes`
  ADD CONSTRAINT `legumes_ibfk_1` FOREIGN KEY (`id`) REFERENCES `graines` (`id_graine`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
