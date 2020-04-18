-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 18 avr. 2020 à 09:51
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
-- Base de données :  `ebayece`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat_immediat`
--

DROP TABLE IF EXISTS `achat_immediat`;
CREATE TABLE IF NOT EXISTS `achat_immediat` (
  `achat_immediat_id` int(11) NOT NULL AUTO_INCREMENT,
  `prix` decimal(10,0) NOT NULL,
  `produit_id` int(11) NOT NULL,
  PRIMARY KEY (`achat_immediat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `acheteur`
--

DROP TABLE IF EXISTS `acheteur`;
CREATE TABLE IF NOT EXISTS `acheteur` (
  `acheteur_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `carte_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`acheteur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`acheteur_id`, `nom`, `prenom`, `mail`, `telephone`, `adresse`, `ville`, `code_postal`, `pays`, `password`, `carte_id`) VALUES
(1, 'Lepetit', 'Michel', 'michel.lepetit@gmail.com', '01 56 78 41 56', '45 rue de la Savoie', 'Paris', '75009', 'France', 'mlp75', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `adresse_livraison`
--

DROP TABLE IF EXISTS `adresse_livraison`;
CREATE TABLE IF NOT EXISTS `adresse_livraison` (
  `adresse_id` int(11) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`adresse_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `carte_bancaire`
--

DROP TABLE IF EXISTS `carte_bancaire`;
CREATE TABLE IF NOT EXISTS `carte_bancaire` (
  `numero` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('Visa','MasterCard','American Express') COLLATE utf8_unicode_ci NOT NULL,
  `date_expiration` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  PRIMARY KEY (`numero`,`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `compte_bancaire`
--

DROP TABLE IF EXISTS `compte_bancaire`;
CREATE TABLE IF NOT EXISTS `compte_bancaire` (
  `numero_carte` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('Visa','MasterCard','American Express') COLLATE utf8_unicode_ci NOT NULL,
  `date_expiration` date NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plafond` int(11) NOT NULL,
  PRIMARY KEY (`numero_carte`,`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `connexion_courante`
--

DROP TABLE IF EXISTS `connexion_courante`;
CREATE TABLE IF NOT EXISTS `connexion_courante` (
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `acheteur_id` int(11) DEFAULT NULL,
  `vendeur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `encheres`
--

DROP TABLE IF EXISTS `encheres`;
CREATE TABLE IF NOT EXISTS `encheres` (
  `encheres_id` int(11) NOT NULL AUTO_INCREMENT,
  `prix_init` decimal(10,0) NOT NULL,
  `prix_max` decimal(10,0) NOT NULL DEFAULT '0',
  `prix_min` decimal(10,0) NOT NULL DEFAULT '0',
  `date_fin` datetime NOT NULL,
  `nombre_encheres` int(11) NOT NULL DEFAULT '0',
  `acheteur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`encheres_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `negociation`
--

DROP TABLE IF EXISTS `negociation`;
CREATE TABLE IF NOT EXISTS `negociation` (
  `negociation_id` int(11) NOT NULL AUTO_INCREMENT,
  `offre_id` int(11) NOT NULL,
  PRIMARY KEY (`negociation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE IF NOT EXISTS `offre` (
  `offre_id` int(11) NOT NULL AUTO_INCREMENT,
  `prix_negocie` decimal(10,0) NOT NULL,
  `compteur` int(11) NOT NULL,
  `tour` tinyint(1) NOT NULL,
  `acheteur_id` int(11) NOT NULL,
  PRIMARY KEY (`offre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `acheteur_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  PRIMARY KEY (`acheteur_id`,`produit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `produit_id` int(11) NOT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `produit_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categorie` enum('Ferraille ou Tresor','Bon pour le musee','Accessoire VIP') COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '0',
  `achat_immediat_id` int(11) DEFAULT NULL,
  `encheres_id` int(11) DEFAULT NULL,
  `negociation_id` int(11) DEFAULT NULL,
  `vendeur_id` int(11) NOT NULL,
  PRIMARY KEY (`produit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `prix` decimal(10,0) NOT NULL,
  `adresse_id` int(11) NOT NULL,
  `acheteur_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `vendeur_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pp` blob,
  `mur` blob,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`vendeur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
