-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mar. 21 avr. 2020 à 09:44
-- Version du serveur :  5.7.25
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `bijoux`
--

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `idMatiere` char(3) NOT NULL,
  `descriptionMatiere` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`idMatiere`, `descriptionMatiere`) VALUES
('1', 'Or'),
('2', 'Argent');

-- --------------------------------------------------------

--
-- Structure de la table `reparationbijoux`
--

CREATE TABLE `reparationbijoux` (
  `idReparation` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idType` char(3) DEFAULT NULL,
  `idMatiere` char(3) DEFAULT NULL,
  `probleme` varchar(255) DEFAULT NULL,
  `termine` int(11) NOT NULL,
  `numeroSAV` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reparationbijoux`
--

INSERT INTO `reparationbijoux` (`idReparation`, `idUser`, `idType`, `idMatiere`, `probleme`, `termine`, `numeroSAV`, `date`) VALUES
(1, 1, '3', '2', 'sddds', 1, 1, '2020-04-29'),
(2, 1, '4', '2', 'mpmp', 1, 2, '2020-04-30'),
(3, 1, '5', '1', 'jujuju', 0, 3, '2020-04-25');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `idReservation` int(11) NOT NULL,
  `prenom` char(50) DEFAULT NULL,
  `nom` char(50) DEFAULT NULL,
  `telephone` char(50) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `typedebijou` char(50) DEFAULT NULL,
  `matiere` char(50) DEFAULT NULL,
  `probleme` text,
  `dateRDV` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `idType` int(11) NOT NULL,
  `descriptionType` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`idType`, `descriptionType`) VALUES
(1, 'Bague'),
(2, 'Collier'),
(3, 'Bracelet'),
(4, 'Boucle d oreille'),
(5, 'Anneau');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `nom` char(30) DEFAULT NULL,
  `prenom` char(30) DEFAULT NULL,
  `username` char(20) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `mdp` tinytext,
  `telephone` varchar(10) DEFAULT NULL,
  `commentaire` varchar(500) DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `adm` int(11) DEFAULT NULL,
  `blacklist` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `nom`, `prenom`, `username`, `email`, `mdp`, `telephone`, `commentaire`, `note`, `adm`, `blacklist`) VALUES
(1, 'Domont', 'Julien', 'juju la mitraille', 'julien.domont123@gmail.com', 'dragonica', NULL, 'biteeeee', 5, 1, NULL),
(5, 'Didi', 'Tutu', 'tutu', 'tutudidi@wanadoo.fr', 'salutlesterriens', NULL, NULL, 4, NULL, NULL),
(6, 'Hocq', 'Julie', NULL, 'juhc@gmail.com', 'jujujuju', NULL, NULL, 3, 0, NULL),
(7, 'Tryla', 'Mathis', NULL, 'fedefoot62@gmail.com', 'federer26', NULL, 'mathis comment', 5, 0, NULL),
(16, 'Petit', 'Valentine', NULL, 'vpetit@gmail.com', 'vavavavava', NULL, NULL, 0, 0, NULL),
(18, 'Fremeaux', 'Martin', NULL, 'mama@gmail.com', 'fremaxeny', NULL, NULL, 0, 0, NULL),
(19, 'Pouillery', 'Agathe', NULL, 'degatg@gmail.com', 'bibidu62', NULL, NULL, 5, 0, NULL),
(20, 'Longuepe', 'Maxime', NULL, 'lolo@gmail.com', 'ffffffffff', NULL, NULL, 0, 0, NULL),
(40, 'Hocq', 'Julie', NULL, 'juliehocq@gmail.com', 'jujuhoho', NULL, NULL, 0, 0, NULL),
(41, 'Tryla', 'Mathis', NULL, 'fede@gmail.com', 'bitegrosse', NULL, NULL, 0, 0, NULL),
(54, 'Tryla', 'Mathis', NULL, 'groscacadu62@gmail.com', 'putepute2', NULL, NULL, NULL, 0, NULL),
(55, 'Ronaldo', 'Cristiano', NULL, 'cricriPortugal@hotmail.fr', 'grosAbdosDuPortugal', NULL, NULL, NULL, 0, NULL),
(56, 'Ronaldo', 'Cricri', NULL, 'cricriPortouguech@outlook.fr', 'grousseBiteDouPortou', NULL, NULL, NULL, 0, NULL),
(57, 'Bite', 'Arhsum', NULL, 'arshum@wanadoo.fr', 'biteArshumAmsdkrkrkr', NULL, NULL, NULL, 0, NULL),
(58, 'Ferguson', 'Alex', 'Sir_alex', 'alex@gmail.com', 'sisiengland', NULL, NULL, 1, 0, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idCommentaire`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`idMatiere`);

--
-- Index pour la table `reparationbijoux`
--
ALTER TABLE `reparationbijoux`
  ADD PRIMARY KEY (`idReparation`),
  ADD KEY `Fk_idUser` (`idUser`),
  ADD KEY `Fk_idType` (`idType`),
  ADD KEY `Fk_idMatiere` (`idMatiere`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`idType`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `idUser` (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idCommentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `reparationbijoux`
--
ALTER TABLE `reparationbijoux`
  MODIFY `idReparation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `idType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
