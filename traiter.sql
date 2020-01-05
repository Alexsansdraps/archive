-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 05 jan. 2020 à 18:49
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP :  7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `archive`
--

-- --------------------------------------------------------

--
-- Structure de la table `traiter`
--

CREATE TABLE `traiter` (
  `id_personne` int(11) NOT NULL,
  `id_document` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `traiter`
--
ALTER TABLE `traiter`
  ADD PRIMARY KEY (`id_personne`,`id_document`),
  ADD KEY `traiter_document0_FK` (`id_document`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `traiter`
--
ALTER TABLE `traiter`
  ADD CONSTRAINT `traiter_document0_FK` FOREIGN KEY (`id_document`) REFERENCES `document` (`id_document`),
  ADD CONSTRAINT `traiter_personne_FK` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
