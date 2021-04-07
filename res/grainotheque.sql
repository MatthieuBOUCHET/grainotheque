-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 07 avr. 2021 à 22:28
-- Version du serveur :  5.7.23-23-log
-- Version de PHP : 7.4.5

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

CREATE TABLE `aromatiques` (
  `id` int(11) NOT NULL,
  `espece` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stock` smallint(5) DEFAULT '0',
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
  `infos` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fleurs_horticoles`
--

CREATE TABLE `fleurs_horticoles` (
  `id` int(11) NOT NULL,
  `espece` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stock` smallint(5) DEFAULT '0',
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
  `infos` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fleurs_sauvages_locales`
--

CREATE TABLE `fleurs_sauvages_locales` (
  `id` int(11) NOT NULL,
  `stock` smallint(5) NOT NULL DEFAULT '0',
  `espece` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  `pollinisateur` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `legumes`
--

CREATE TABLE `legumes` (
  `id` int(11) NOT NULL,
  `espece` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stock` smallint(5) DEFAULT '0',
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
  `infos` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `aromatiques`
--
ALTER TABLE `aromatiques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fleurs_horticoles`
--
ALTER TABLE `fleurs_horticoles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fleurs_sauvages_locales`
--
ALTER TABLE `fleurs_sauvages_locales`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `legumes`
--
ALTER TABLE `legumes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `aromatiques`
--
ALTER TABLE `aromatiques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fleurs_horticoles`
--
ALTER TABLE `fleurs_horticoles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fleurs_sauvages_locales`
--
ALTER TABLE `fleurs_sauvages_locales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `legumes`
--
ALTER TABLE `legumes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
