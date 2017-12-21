-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 21 Décembre 2017 à 11:19
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `testlexik`
--

-- --------------------------------------------------------

--
-- Structure de la table `groupuser`
--

CREATE TABLE `groupuser` (
  `IdGroupUser` int(11) NOT NULL,
  `NomGroup` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `groupuser`
--

INSERT INTO `groupuser` (`IdGroupUser`, `NomGroup`) VALUES
(1, 'GroupA'),
(2, 'GroupB'),
(3, 'GroupC');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `IdUser` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `DateAnniversaire` date NOT NULL,
  `IdGroupUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`IdUser`, `Nom`, `Prenom`, `Email`, `DateAnniversaire`, `IdGroupUser`) VALUES
(40, 'Gibaru', 'Daniel', 'daniel.gibaru.34@gmail.com', '1993-12-10', 1),
(41, 'Sponge', 'Bob', 'bS@bikini.botton', '1890-08-01', 1),
(42, 'Solid', 'Snack', 'PizzaT@pro.fr', '2003-03-30', 2),
(43, 'Comandant', 'Shepard', 'Shepard.c.34@gmail.com', '2003-12-10', 3),
(44, 'Mr', 'Patatta', 'toys@pixar.com', '1993-08-01', 3),
(45, 'Alduin', 'devoreur de monde', 'Alduin@Bordelciel.fr', '2003-03-30', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `groupuser`
--
ALTER TABLE `groupuser`
  ADD PRIMARY KEY (`IdGroupUser`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IdUser`),
  ADD KEY `IdGroupUser` (`IdGroupUser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `groupuser`
--
ALTER TABLE `groupuser`
  MODIFY `IdGroupUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`IdGroupUser`) REFERENCES `groupuser` (`IdGroupUser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
