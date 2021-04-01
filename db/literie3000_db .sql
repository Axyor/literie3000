-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 01 avr. 2021 à 16:01
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `literie3000_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `id` int(11) NOT NULL,
  `img` text DEFAULT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`id`, `img`, `nom`) VALUES
(1, 'https://upload.wikimedia.org/wikipedia/fr/6/60/Logo-bultex.png', 'BULTEX'),
(2, 'https://www.leroidumatelas.fr/skin/frontend/lrdm/default/images/logo_dreamway.jpg', 'DREAMWAY');

-- --------------------------------------------------------

--
-- Structure de la table `matelas`
--

CREATE TABLE `matelas` (
  `id` int(11) NOT NULL,
  `img` text DEFAULT NULL,
  `marque` varchar(50) DEFAULT NULL,
  `nom` varchar(100) NOT NULL,
  `dimension` varchar(100) NOT NULL,
  `prix` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `matelas`
--

INSERT INTO `matelas` (`id`, `img`, `marque`, `nom`, `dimension`, `prix`) VALUES
(1, 'https://static2.lacompagniedulit.net/2091-large_default/matelas-epeda-lyon.jpg', 'EPEDA', 'Matelas TAMOUL', '90x190', 529),
(3, 'https://www.leroidumatelas.fr/media/catalog/product/cache/1/image/1800x/040ec09b1e35df139433887a97daa66f/M/A/MAT-JUNGLE_01.jpg', 'DREAMWAY', 'Matelas WALDORF', '90x190', 709),
(4, 'https://media3.coin-fr.com/7661-large_default/sommier-matelas-bultex-clearness.jpg', 'BULTEX', 'Matelas JORIS', '140x90', 529),
(5, 'https://www.quelmatelas.fr/images/pool/Autres%20matelas/Matelas%20Epeda/matelas-ep%C3%A9da-salvia.png', 'EPEDA', 'Matelas MELON', '160x200', 509);

-- --------------------------------------------------------

--
-- Structure de la table `matelas_marques`
--

CREATE TABLE `matelas_marques` (
  `matelas_id` int(11) NOT NULL,
  `marque_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matelas`
--
ALTER TABLE `matelas`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matelas_marques`
--
ALTER TABLE `matelas_marques`
  ADD PRIMARY KEY (`matelas_id`,`marque_id`),
  ADD KEY `marque_id` (`marque_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `matelas`
--
ALTER TABLE `matelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `matelas_marques`
--
ALTER TABLE `matelas_marques`
  ADD CONSTRAINT `matelas_marques_ibfk_1` FOREIGN KEY (`matelas_id`) REFERENCES `matelas` (`id`),
  ADD CONSTRAINT `matelas_marques_ibfk_2` FOREIGN KEY (`marque_id`) REFERENCES `marques` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
