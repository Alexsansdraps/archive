-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 12 jan. 2020 à 21:42
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
-- Structure de la table `affecter`
--

CREATE TABLE `affecter` (
  `id_zone` int(11) NOT NULL,
  `id_personne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE `document` (
  `id_document` int(11) NOT NULL,
  `nomDocument` varchar(50) NOT NULL,
  `id_etagere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `document`
--

INSERT INTO `document` (`id_document`, `nomDocument`, `id_etagere`) VALUES
(1, 'barbarossa', 1),
(2, 'midway', 2),
(3, 'kasserine', 3),
(4, 'blabla', 1);

-- --------------------------------------------------------

--
-- Structure de la table `etagere`
--

CREATE TABLE `etagere` (
  `id_etagere` int(11) NOT NULL,
  `nomEtagere` varchar(200) NOT NULL,
  `id_zone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etagere`
--

INSERT INTO `etagere` (`id_etagere`, `nomEtagere`, `id_zone`) VALUES
(1, '1941-est', 1),
(2, '1942-pacifique', 2),
(3, '1943-afrique', 3);

-- --------------------------------------------------------

--
-- Structure de la table `lieustockage`
--

CREATE TABLE `lieustockage` (
  `id_stockage` int(11) NOT NULL,
  `nomStockage` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `lieustockage`
--

INSERT INTO `lieustockage` (`id_stockage`, `nomStockage`) VALUES
(1, 'alpha');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id_personne` int(11) NOT NULL,
  `nomPersonne` varchar(200) NOT NULL,
  `prenomPersonne` varchar(200) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `telephone` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id_personne`, `nomPersonne`, `prenomPersonne`, `adresse`, `mail`, `telephone`) VALUES
(1, 'brownss', 'jason', '1 rue du nfl', 'jbrown@mail.fr', '01 23 58 69 97'),
(2, 'petitss', 'romain', '4 rue du rugby', 'rpetit@mail.fr', '04 45 62 32 57'),
(9, 'DECUYPER', 'romain', '24 Avenue du Général Margueritte', 'decuyper@mail.net', '02 89 56 23 48'),
(10, '5665564', '556576', '45656456+', '5656', '55656456'),
(11, 'fff', 'romain', '24 Avenue du Général Margueritte', 'rpetit@mail.fr', '02 89 56 23 47');

-- --------------------------------------------------------

--
-- Structure de la table `traiter`
--

CREATE TABLE `traiter` (
  `id_personne` int(11) NOT NULL,
  `id_document` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `zone`
--

CREATE TABLE `zone` (
  `id_zone` int(11) NOT NULL,
  `nomZone` varchar(200) NOT NULL,
  `id_stockage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `zone`
--

INSERT INTO `zone` (`id_zone`, `nomZone`, `id_stockage`) VALUES
(1, 'front de l\'est', 1),
(2, 'pacifique', 1),
(3, 'afrique', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affecter`
--
ALTER TABLE `affecter`
  ADD PRIMARY KEY (`id_zone`,`id_personne`),
  ADD KEY `affecter_personne0_FK` (`id_personne`);

--
-- Index pour la table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id_document`),
  ADD KEY `document_etagere_FK` (`id_etagere`);

--
-- Index pour la table `etagere`
--
ALTER TABLE `etagere`
  ADD PRIMARY KEY (`id_etagere`),
  ADD KEY `etagere_zone_FK` (`id_zone`);

--
-- Index pour la table `lieustockage`
--
ALTER TABLE `lieustockage`
  ADD PRIMARY KEY (`id_stockage`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_personne`);

--
-- Index pour la table `traiter`
--
ALTER TABLE `traiter`
  ADD PRIMARY KEY (`id_personne`,`id_document`),
  ADD KEY `traiter_document0_FK` (`id_document`);

--
-- Index pour la table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`id_zone`),
  ADD KEY `zone_lieuStockage_FK` (`id_stockage`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `document`
--
ALTER TABLE `document`
  MODIFY `id_document` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `etagere`
--
ALTER TABLE `etagere`
  MODIFY `id_etagere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `lieustockage`
--
ALTER TABLE `lieustockage`
  MODIFY `id_stockage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `zone`
--
ALTER TABLE `zone`
  MODIFY `id_zone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `affecter`
--
ALTER TABLE `affecter`
  ADD CONSTRAINT `affecter_personne0_FK` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`),
  ADD CONSTRAINT `affecter_zone_FK` FOREIGN KEY (`id_zone`) REFERENCES `zone` (`id_zone`);

--
-- Contraintes pour la table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_etagere_FK` FOREIGN KEY (`id_etagere`) REFERENCES `etagere` (`id_etagere`);

--
-- Contraintes pour la table `etagere`
--
ALTER TABLE `etagere`
  ADD CONSTRAINT `etagere_zone_FK` FOREIGN KEY (`id_zone`) REFERENCES `zone` (`id_zone`);

--
-- Contraintes pour la table `traiter`
--
ALTER TABLE `traiter`
  ADD CONSTRAINT `traiter_document0_FK` FOREIGN KEY (`id_document`) REFERENCES `document` (`id_document`),
  ADD CONSTRAINT `traiter_personne_FK` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);

--
-- Contraintes pour la table `zone`
--
ALTER TABLE `zone`
  ADD CONSTRAINT `zone_lieuStockage_FK` FOREIGN KEY (`id_stockage`) REFERENCES `lieustockage` (`id_stockage`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;