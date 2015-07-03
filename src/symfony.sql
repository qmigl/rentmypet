-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 03 Juillet 2015 à 12:36
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `symfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `pet`
--

CREATE TABLE IF NOT EXISTS `pet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idOwner` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_E4529B85D8A4A561` (`idOwner`),
  UNIQUE KEY `UNIQ_E4529B855697F554` (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `pet`
--

INSERT INTO `pet` (`id`, `name`, `birthdate`, `description`, `id_category`, `sex`, `idOwner`) VALUES
(1, 'Skanie', '2015-01-12', 'Samoyède', 1, 'Femelle', 1);

-- --------------------------------------------------------

--
-- Structure de la table `pet_category`
--

CREATE TABLE IF NOT EXISTS `pet_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `pet_category`
--

INSERT INTO `pet_category` (`id`, `type`) VALUES
(1, 'Chien'),
(2, 'Chat'),
(3, 'Phoque'),
(4, 'Chèvre');

-- --------------------------------------------------------

--
-- Structure de la table `rent`
--

CREATE TABLE IF NOT EXISTS `rent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateStart` date NOT NULL,
  `dateEnd` date NOT NULL,
  `pet_owner_id` int(11) DEFAULT NULL,
  `pet_renter_id` int(11) DEFAULT NULL,
  `pet_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2784DCC374B6834` (`pet_owner_id`),
  UNIQUE KEY `UNIQ_2784DCC7156C41` (`pet_renter_id`),
  UNIQUE KEY `UNIQ_2784DCC966F7FB6` (`pet_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `rent`
--

INSERT INTO `rent` (`id`, `dateStart`, `dateEnd`, `pet_owner_id`, `pet_renter_id`, `pet_id`) VALUES
(1, '2015-07-03', '2015-07-31', 1, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idLocation` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rights` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `firstName`, `lastName`, `phone`, `idLocation`, `city`, `adress`, `rights`) VALUES
(1, 'admin@rentmypet.com', 'azerty', 'admin', 'admin', '06590105055', 69, 'Lyon', 'Avenue de Gerland', 1),
(3, 'test@danstoncul.fr', '123456', 'Yoan', 'Lévy', '0601162032', 69, 'Ferme ta chatte', 'test', 2),
(4, 'migliore@test.fr', '123', 'Quentin', 'Migliore', '0605020304', 1, 'Lyon ça race', '19 avenue de ton cul', 2);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `FK_E4529B855697F554` FOREIGN KEY (`id_category`) REFERENCES `pet_category` (`id`),
  ADD CONSTRAINT `FK_E4529B85D8A4A561` FOREIGN KEY (`idOwner`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `FK_2784DCC966F7FB6` FOREIGN KEY (`pet_id`) REFERENCES `pet` (`id`),
  ADD CONSTRAINT `FK_2784DCC374B6834` FOREIGN KEY (`pet_owner_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_2784DCC7156C41` FOREIGN KEY (`pet_renter_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
