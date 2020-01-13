-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 13, 2020 at 10:16 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bijoux`
--

-- --------------------------------------------------------

--
-- Table structure for table `bijou`
--

DROP TABLE IF EXISTS `bijou`;
CREATE TABLE IF NOT EXISTS `bijou` (
  `idBijoux` int(11) NOT NULL,
  `pathBijoux` char(255) DEFAULT NULL,
  `descBijoux` text,
  PRIMARY KEY (`idBijoux`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `idUser` int(11) NOT NULL,
  `idCommentaire` int(11) NOT NULL,
  `commentaire` text,
  PRIMARY KEY (`idCommentaire`,`idUser`),
  KEY `FKcommentaireUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`idUser`, `idCommentaire`, `commentaire`) VALUES
(1, 1, 'Wallah c\'est trop bien.'),
(1, 2, 'C\'est compliqué');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL,
  `nom` char(30) DEFAULT NULL,
  `prenom` char(30) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `username` char(20) DEFAULT NULL,
  `mdp` tinytext,
  `admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `nom`, `prenom`, `email`, `username`, `mdp`, `admin`) VALUES
(1, 'Domont', 'Julien', 'julien.domont123@gmail.com', 'juju la mitraille', 'dragonica', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `FKcommentaireUser` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
