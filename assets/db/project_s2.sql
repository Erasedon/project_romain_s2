-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 10 juin 2022 à 09:02
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `project_s2`
--

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

DROP TABLE IF EXISTS `avoir`;
CREATE TABLE IF NOT EXISTS `avoir` (
  `id_ps2_roles` int(11) NOT NULL DEFAULT '1',
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`id_ps2_roles`,`id_users`),
  KEY `Avoir_users0_FK` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `avoir`
--

INSERT INTO `avoir` (`id_ps2_roles`, `id_users`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id_project` int(11) NOT NULL AUTO_INCREMENT,
  `titre_project` varchar(255) NOT NULL,
  `img_project` varchar(255) NOT NULL,
  `url_project` varchar(255) NOT NULL,
  `date_project` date NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`id_project`),
  KEY `project_users_FK` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ps2_roles`
--

DROP TABLE IF EXISTS `ps2_roles`;
CREATE TABLE IF NOT EXISTS `ps2_roles` (
  `id_ps2_roles` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ps2_roles` varchar(100) NOT NULL,
  PRIMARY KEY (`id_ps2_roles`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ps2_roles`
--

INSERT INTO `ps2_roles` (`id_ps2_roles`, `nom_ps2_roles`) VALUES
(1, 'client'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo_users` varchar(50) NOT NULL,
  `email_users` varchar(100) NOT NULL,
  `mdp_users` varchar(100) NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `pseudo_users`, `email_users`, `mdp_users`) VALUES
(1, 'test10', 'test@email.fr', '$2y$10$wb2t9.54Z3ptU2cQCj55dOLeU5YAuJ0PMjEMZr8mC5GZWonaQdHcW');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD CONSTRAINT `Avoir_ps2_roles_FK` FOREIGN KEY (`id_ps2_roles`) REFERENCES `ps2_roles` (`id_ps2_roles`),
  ADD CONSTRAINT `Avoir_users0_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

--
-- Contraintes pour la table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_users_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
