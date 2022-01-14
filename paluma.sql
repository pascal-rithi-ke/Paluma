-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 13 jan. 2022 à 12:04
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `paluma`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `token` varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `pseudo`, `mdp`) VALUES
(1, 'Kien', 'Pascal', 'pascal', 'kien'),
(2, 'Correia Lopes', 'Lucy', 'Lucy', 'Correia_Lopes'),
(3, 'Serot', 'Malo', 'Malo', 'serot');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(50) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `idVisiteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `idProduit`, `idVisiteur`) VALUES
(2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `type` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `prix`, `type`, `img`) VALUES
(1, 'Big Mac', 4.3, 'Burger', 'https://ws.mcdonalds.fr/media/f9/2a/46/f92a4620185b701485e4b69cad53d81f67e7c3b1'),
(2, 'Mc Chicken', 4.3, 'Burger', 'https://ws.mcdonalds.fr/media/44/5f/b1/445fb1e49089f1364b359c673f80620244f93fc5'),
(3, 'Filet O Fish', 4.3, 'Burger', 'https://ws.mcdonalds.fr/media/92/98/d0/9298d0751ac047c90346b6288371b1bed28ad083'),
(4, 'Royal Deluxe', 4.3, 'Burger', 'https://d25dk4h1q4vl9b.cloudfront.net/media/images/menu-content/MQ/sandwichs-au-boeuf/Royal-Deluxe_new_fr.png'),
(5, 'Mc Nuggets x6', 3.6, 'Accompagnement', 'https://d25dk4h1q4vl9b.cloudfront.net/media/images/menu-content/MQ/sandwichs-et-snack-au-poulet/McNuggets.png'),
(6, 'Menu Big Mac', 7.1, 'Menu', 'https://ws.mcdonalds.fr/media/f2/06/99/f206996b0d82b3293e5c587d696a4d45865a672e'),
(7, 'Menu Mc Chicken', 7.1, 'Menu', 'https://mcdonalds.be/_webdata/product-images/MediumMenuMcChicken.png'),
(8, 'Menu Filet O Fish', 7.4, 'Menu', 'https://mcdonalds.be/_webdata/product-images/MediumMenuFiletOFish.png'),
(9, 'Menu Royal Deluxe', 8.1, 'Menu', 'https://d1ralsognjng37.cloudfront.net/27d004b9-e6e4-4890-8cf8-b6c1189ebc86.png'),
(10, 'Menu Mc Nuggets x6', 6.4, 'Menu', 'https://mcdonalds.be/_webdata/product-images/MediumMenuMcNuggets.png');

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

CREATE TABLE `visiteur` (
  `id` int(50) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `token` varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `visiteur`
--

INSERT INTO `visiteur` (`id`, `nom`, `prenom`, `pseudo`, `mdp`) VALUES
(1, 'L\'Eponge', 'Bob', 'Bob', 'L\'eponge'),
(2, 'Simpson', 'Homer', 'Homer', 'Simpson');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProduit` (`idProduit`,`idVisiteur`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `visiteur`
--
ALTER TABLE `visiteur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `visiteur`
--
ALTER TABLE `visiteur`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`idVisiteur`) REFERENCES `visiteur` (`id`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
