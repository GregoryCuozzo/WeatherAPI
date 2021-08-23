-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 23 août 2021 à 06:08
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
-- Base de données : `weather`
--

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ville` varchar(225) DEFAULT NULL,
  `pays` varchar(50) NOT NULL,
  `User_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_User` (`User_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `country`
--

INSERT INTO `country` (`id`, `ville`, `pays`, `User_ID`) VALUES
(98, 'London', 'UK', 5),
(97, 'Calpe', 'es', 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `email` text,
  `session_token` varchar(255) DEFAULT NULL,
  `session_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`, `email`, `session_token`, `session_time`) VALUES
(5, 'Gc926184', '$2y$10$snMPX5CvITPTUFpo54Foq.ey7WUdAuOKIcqSuf7eGBwj5xhL58irK', 'astro.informatique.cuozzo@gmail.com', '451b93968d809293.1629697296', NULL),
(6, 'Admin2021', '$2y$10$UtObg4vSS9xgm1f29QDJtu8Bsfup8pQ1pLU5I2WPmMLf4TBw4hb52', 'gregg.ozzo@yahoo.net', 'f09b63504394e82f.1629698510', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
