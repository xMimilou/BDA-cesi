-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 15 nov. 2019 à 08:05
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bda`
--

-- --------------------------------------------------------

--
-- Structure de la table `cookie`
--

DROP TABLE IF EXISTS `cookie`;
CREATE TABLE IF NOT EXISTS `cookie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nbcookie` int(11) NOT NULL,
  `gain` float NOT NULL,
  `recu` float NOT NULL,
  `rendu` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cookie`
--

INSERT INTO `cookie` (`id`, `nbcookie`, `gain`, `recu`, `rendu`) VALUES
(16, 3, 2, 2, 1),
(17, 3, 1.5, 10, 8.5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
