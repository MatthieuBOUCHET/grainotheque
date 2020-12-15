-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 15 déc. 2020 à 16:14
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
(1, 'Aneth odorant', 6, 'Anethum graveolens', 'Apiacées', 1, 1, 6, 10, 100, 4, 5, NULL, NULL, 1, 1, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `type_semis` text COLLATE utf8_unicode_ci,
  `culture` tinyint(1) DEFAULT NULL,
  `technique` text COLLATE utf8_unicode_ci,
  `exposition` tinyint(1) DEFAULT NULL,
  `pollinisateur` tinyint(1) DEFAULT NULL,
  `infos` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `fleurs_sauvages_locales`
--

INSERT INTO `fleurs_sauvages_locales` (`id`, `espece`, `stock`, `latin`, `famille`, `cycle`, `couleur`, `debut_floraison`, `fin_floraison`, `hauteur`, `debut_semis`, `fin_semis`, `type_semis`, `culture`, `technique`, `exposition`, `pollinisateur`, `infos`) VALUES
(1, 'Bardane (à petites têtes)', 3, 'Arctium minus', 'Astéracées', 2, 6, 7, 9, 127, 6, 9, NULL, NULL, NULL, 4, 1, NULL),
(2, 'Achillée Millefeuille', 5, 'Achillea millefolium', 'Astéracées', 3, 1, 6, 9, 50, 5, 7, NULL, NULL, 'Privilégier repiquages repousses', 4, 1, NULL),
(3, 'Aigremoine eupatoire', 10, 'Agrimonia eupatoria', 'Rosacées', 3, 2, 6, 9, 50, 8, 9, '', 0, '', 1, 1, ''),
(4, 'Agripaume cardiaque', 4, 'Leonurus cardiaca', 'Lamiacées', 3, 3, 6, 8, 100, 0, 0, '', 0, '', 4, 1, ''),
(5, 'Alliaire officinale', 1, 'Alliaria officinalis', 'Brassicacées', 2, 1, 4, 6, 60, 6, 9, '', 0, '', 2, 1, ''),
(6, 'Anthyllide vulnéraire', 2, 'Anthyllis vulneraria', 'Fabacées', 3, 2, 6, 9, 30, 3, 4, '', 0, '', 1, 1, ''),
(7, 'Benoîte commune', 7, 'Geum urbanum', 'Rosacées', 3, 2, 5, 7, 50, 4, 10, '', 0, '', 2, 1, ''),
(8, 'Bleuet des champs', 14, 'Centaurea cyanus', 'Astéracées', 1, 5, 5, 9, 60, 3, 5, '', 0, '', 1, 1, 'Messicole'),
(9, 'Bouillon blanc', 8, 'Verbascum thapsus', 'Scrophulariaceae', 2, 2, 6, 9, 127, 3, 6, '', 0, '', 4, 1, ''),
(10, 'Bouillon noir', 3, 'Verbascum nigrum', 'Scrophulariaceae', 2, 2, 6, 9, 100, 3, 5, '', 0, '', 4, 1, ''),
(11, 'Bourrache', 1, 'Borago officinalis', 'Boraginacées', 1, 5, 5, 9, 50, 3, 5, '', 0, 'Transplanter nombreux resemis spontanés', 4, 1, 'Comestible'),
(12, 'Camomille des teinturiers', 10, 'Anthemis tinctoria', 'Astéracées', 3, 2, 6, 9, 50, 3, 5, '', 0, 'Divisions printemps ou automne', 1, 1, 'Plante tinctoriale'),
(13, 'Matricaire fausse camomille', 1, 'Matricaria discoidea', 'Astéracées', 1, 1, 5, 9, 40, 3, 5, '', 0, '', 1, 0, ''),
(14, 'Campanule agglomérée', 12, 'Campanule glomerata', 'Campanulacées', 3, 3, 6, 8, 60, 3, 5, '', 0, 'Divisions printemps ou automne', 4, 1, ''),
(15, 'Cardère sauvage', 1, 'Dipsacus fullonum', 'Dipsacaceae', 2, 3, 7, 9, 127, 6, 9, '', 0, '', 1, 1, ''),
(16, 'Carotte Sauvage', 10, 'Daucus carota', 'Apiacées', 2, 1, 6, 9, 60, 5, 9, '', 0, '', 4, 1, ''),
(17, 'Centaurée Jacée', 9, 'Centaurea jacea', 'Astéracées', 3, 3, 5, 9, 70, 3, 5, '', 0, '', 4, 1, ''),
(18, 'Chicorée sauvage', 13, 'Cichorium intybus', 'Astéracées', 3, 5, 5, 10, 120, 3, 5, '', 0, '', 1, 1, ''),
(19, 'Clématite des haies', 6, 'Clematis vitalba', '', 0, 1, 0, 0, 0, 0, 0, '', 0, 'Bouture herbacée mai juin ou bois aoûté', 0, 1, ''),
(20, 'Coquelicot', 7, 'Papaver rhoeas', 'Papaveracées', 1, 0, 4, 8, 50, 9, 4, '', 0, '', 1, 1, 'Messicole'),
(21, 'Fenouil', 12, 'Foeniculum', 'Apiacées', 3, 2, 7, 10, 127, 4, 5, '', 0, '', 1, 1, ''),
(22, 'Grande marguerite', 14, 'Leucanthemum vulgare', 'Asteracées', 3, 1, 4, 8, 60, 3, 5, '', 0, 'Divisions printemps ou automne', 1, 1, ''),
(23, 'Réséda des teinturiers', 8, 'Reseda Luteola', 'Résédacées', 2, 2, 6, 9, 120, 6, 9, '', 0, '', 1, 1, 'Plante tinctoriale'),
(24, 'Linaire commune', 6, 'Linaria vulgaris', 'Plantaginacées', 3, 2, 6, 10, 40, 3, 5, '', 0, '', 4, 1, ''),
(25, 'Liseron des haies', 3, 'Calystegia sepium', 'Convulvulacées', 3, 1, 6, 9, 127, 3, 5, '', 0, 'Division racinaire', 4, 1, 'Grimpante'),
(26, 'Lotier corniculé', 3, 'Lotus corniculatus', 'Fabacées', 3, 2, 5, 9, 40, 3, 5, '', 0, 'Divisions printemps ou automne', 1, 1, ''),
(27, 'Mauve Alcée', 3, 'Malva alcea', 'Malvacées', 3, 7, 6, 10, 50, 9, 10, '', 0, '', 1, 1, ''),
(28, 'Mauve musquée', 6, 'Malva moschata', 'Malvacées', 3, 3, 5, 9, 60, 3, 5, '', 0, '', 4, 1, ''),
(29, 'Mauve sylvestre', 12, 'Malva sylvestris', 'Malvacées', 3, 3, 4, 10, 90, 3, 5, '', 0, '', 4, 1, 'Ne pas enfouir les graines (semis surface)'),
(30, 'Mélilot officinal', 2, 'Melilotus officinalis', 'Fabacées', 2, 2, 6, 8, 70, 5, 9, '', 0, '', 1, 1, ''),
(31, 'Mélilot blanc', 13, 'Melilotus alba', 'Fabacées', 2, 1, 6, 8, 70, 5, 9, '', 0, '', 1, 1, ''),
(32, 'Millepertuis commun', 5, 'Hypericum perforatum', 'Hypericacées', 3, 2, 5, 8, 60, 3, 5, '', 0, '', 4, 1, ''),
(33, 'Monnaie du Pape, Lunaire annuelle', 13, 'Lunaria annua', 'Brassicacées', 2, 3, 4, 6, 60, 6, 9, '', 0, '', 2, 1, ''),
(34, 'Moutarde (var ?)', 1, 'Sinapis', 'Brassicacées', 1, 2, 5, 10, 80, 3, 5, '', 0, '', 1, 1, ''),
(35, 'Nepeta', 13, '', '', 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, 1, ''),
(36, 'Nielle des blés', 11, 'Agrostemma githago', 'Caryophylacées', 1, 3, 5, 8, 80, 3, 5, '', 0, '', 1, 1, 'Messicole'),
(37, 'Onagre', 10, '', '', 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, 1, ''),
(38, 'Petite pimprenelle', 1, 'Sanguisorba minor', 'Rosacées', 3, 0, 4, 8, 50, 3, 5, '', 0, '', 4, 1, ''),
(39, 'Pissenlit', 0, 'Taraxacum officinale', 'Astéracées', 3, 2, 4, 8, 30, 3, 5, '', 0, 'Bouture racinaire printemps ou automne', 4, 1, ''),
(40, 'Plantain lancéolé', 7, '', '', 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, 1, ''),
(41, 'Pois vivace', 13, 'Lathyrus latifolius', 'Fabacées', 3, 3, 5, 8, 127, 4, 5, '', 0, '', 1, 1, 'Grimpante (non comestible)'),
(42, 'Sainfoin à feuilles de vesce', 11, 'Onobrychis viciifolia', 'Fabacées', 3, 7, 5, 9, 60, 3, 5, '', 0, '', 1, 1, 'Vivace courte (3 ans)'),
(43, 'Saponaire officinale', 7, 'Saponaria officinalis', 'Caryophyllacées', 3, 7, 6, 9, 60, 3, 5, '', 0, 'Bouture tiges début printemps', 4, 1, ''),
(44, 'Sauge sclarée', 0, 'Salvia sclarea', 'Lamiacées', 2, 7, 6, 9, 80, 4, 9, '', 0, 'Transplanter nombreux resemis spontanés', 1, 1, 'Peut se comporter comme une vivace'),
(45, 'Sauge des près', 7, 'Salvia pratensis', 'Lamiacées', 3, 7, 5, 8, 60, 3, 5, '', 1, '', 1, 1, ''),
(46, 'Scabieuse colombaire', 1, 'Scabiosa columbaria', 'Dipsacacées', 3, 7, 6, 9, 70, 3, 5, '', 1, '', 1, 1, ''),
(47, 'Silène enflée', 3, 'Silene vulgaris', 'Caryophyllacées', 3, 1, 4, 8, 50, 3, 5, '', 0, '', 4, 1, ''),
(48, 'Tanaisie commune', 12, 'Tanacetum vulgare', 'Asteracées', 3, 2, 6, 10, 80, 3, 5, '', 0, 'Divisions printemps ou automne', 1, 1, ''),
(49, 'Tournesol', 10, 'Helianthus annus', 'Asteracées', 1, 2, 7, 9, 100, 4, 6, '', 0, '', 1, 1, ''),
(50, 'Vesce cultivée', 2, 'Vicia sativa', 'Fabacées', 1, 7, 5, 7, 30, 3, 5, '', 0, '', 4, 1, 'Semi-grimpante'),
(51, 'Vesce en épis', 5, 'Vicia cracca', 'Fabacées', 3, 7, 6, 8, 30, 3, 5, '', 0, '', 4, 1, 'Semi-grimpante'),
(52, 'Vipérine', 0, 'Echium vulgare', 'Boraginacées', 2, 7, 6, 8, 80, 6, 9, '', 0, '', 1, 1, '');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `legumes`
--

INSERT INTO `legumes` (`id`, `espece`, `stock`, `variete`, `latin`, `famille`, `cycle`, `couleur`, `debut_floraison`, `fin_floraison`, `hauteur`, `debut_semis`, `fin_semis`, `type_semis`, `ecartement_entre_lignes`, `ecartement_sur_lignes`, `technique`, `exposition`, `pollinisateur`, `infos`) VALUES
(1, 'Aubergine', 2, '', 'Solanum melongena', 'Astéridées', 1, 7, 7, 10, 80, 2, 5, NULL, 50, 2, 'Recouvrir d\'une terre légère. Arroser régulièrement', 4, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
