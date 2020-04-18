-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 18, 2020 at 08:22 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebayece`
--
CREATE DATABASE IF NOT EXISTS `ebayece` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `ebayece`;

-- --------------------------------------------------------

--
-- Table structure for table `achat_immediat`
--

DROP TABLE IF EXISTS `achat_immediat`;
CREATE TABLE `achat_immediat` (
  `achat_immediat_id` int(11) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `produit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `achat_immediat`
--

INSERT INTO `achat_immediat` (`achat_immediat_id`, `prix`, `produit_id`) VALUES
(1, '26', 1),
(2, '46', 3),
(3, '150', 4),
(4, '1000', 6),
(5, '70', 12),
(6, '12800', 18),
(7, '650', 15),
(8, '250', 21),
(9, '320000', 8),
(10, '13800', 10),
(11, '120', 13);

-- --------------------------------------------------------

--
-- Table structure for table `acheteur`
--

DROP TABLE IF EXISTS `acheteur`;
CREATE TABLE `acheteur` (
  `acheteur_id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `carte_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acheteur`
--

INSERT INTO `acheteur` (`acheteur_id`, `nom`, `prenom`, `mail`, `telephone`, `adresse`, `ville`, `code_postal`, `pays`, `password`, `carte_id`) VALUES
(1, 'Lepetit', 'Michel', 'michel.lepetit@gmail.com', '01 56 78 41 56', '45 rue de la Savoie', 'Paris', '75009', 'France', 'mlp75', NULL),
(3, 'Cambier', 'Matheo', 'matheo.cambier@edu.ece.fr', '0909090909', '5 Allée des Bourdons', 'Montesson', '78360', 'France', '1234', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `adresse_livraison`
--

DROP TABLE IF EXISTS `adresse_livraison`;
CREATE TABLE `adresse_livraison` (
  `adresse_id` int(11) NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carte_bancaire`
--

DROP TABLE IF EXISTS `carte_bancaire`;
CREATE TABLE `carte_bancaire` (
  `numero` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('Visa','MasterCard','American Express') COLLATE utf8_unicode_ci NOT NULL,
  `date_expiration` int(11) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compte_bancaire`
--

DROP TABLE IF EXISTS `compte_bancaire`;
CREATE TABLE `compte_bancaire` (
  `numero_carte` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('Visa','MasterCard','American Express') COLLATE utf8_unicode_ci NOT NULL,
  `date_expiration` date NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plafond` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `connexion_courante`
--

DROP TABLE IF EXISTS `connexion_courante`;
CREATE TABLE `connexion_courante` (
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `acheteur_id` int(11) DEFAULT NULL,
  `vendeur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `encheres`
--

DROP TABLE IF EXISTS `encheres`;
CREATE TABLE `encheres` (
  `encheres_id` int(11) NOT NULL,
  `prix_init` decimal(10,0) NOT NULL,
  `prix_max` decimal(10,0) NOT NULL DEFAULT '0',
  `prix_min` decimal(10,0) NOT NULL DEFAULT '0',
  `date_fin` datetime NOT NULL,
  `nombre_encheres` int(11) NOT NULL DEFAULT '0',
  `acheteur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `encheres`
--

INSERT INTO `encheres` (`encheres_id`, `prix_init`, `prix_max`, `prix_min`, `date_fin`, `nombre_encheres`, `acheteur_id`) VALUES
(1, '5', '0', '0', '2020-04-29 11:29:00', 0, NULL),
(2, '50', '0', '0', '2020-05-11 15:18:07', 0, NULL),
(3, '45', '0', '0', '2020-04-30 14:00:00', 0, NULL),
(4, '2000', '0', '0', '2020-05-20 00:00:00', 0, NULL),
(5, '10', '0', '0', '2020-04-26 00:00:00', 0, NULL),
(6, '15', '0', '0', '2020-05-10 00:00:00', 0, NULL),
(7, '80', '0', '0', '2020-04-28 00:00:00', 0, NULL),
(8, '20', '0', '0', '2020-05-27 00:00:00', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `negociation`
--

DROP TABLE IF EXISTS `negociation`;
CREATE TABLE `negociation` (
  `negociation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `negociation`
--

INSERT INTO `negociation` (`negociation_id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8);

-- --------------------------------------------------------

--
-- Table structure for table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE `offre` (
  `offre_id` int(11) NOT NULL,
  `prix_negocie` decimal(10,0) NOT NULL,
  `compteur` int(11) NOT NULL,
  `tour` tinyint(1) NOT NULL,
  `acheteur_id` int(11) NOT NULL,
  `negociation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE `panier` (
  `acheteur_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE `photo` (
  `photo_id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `produit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`photo_id`, `nom`, `reference`, `produit_id`) VALUES
(1, 'Photo1', 'photo/coffre.jpg', 1),
(2, 'Photo1', 'photo/bague.jpg', 2),
(3, 'Photo1', 'photo/coffret.jpg', 3),
(4, 'Photo1', 'photo/monnaie.jpg', 4),
(5, 'Photo2', 'photo/monnaie3.jpg', 5),
(6, 'Photo1', 'photo/monnaie5.jpg', 5),
(7, 'Photo1', 'photo/monnaie4.jpg', 6),
(8, 'Photo1', 'photo/tableau-tigre.jpg', 7),
(9, 'Photo1', 'photo/tableau.jpg', 8),
(10, 'Photo1', 'photo/tableau2.jpg', 9),
(11, 'Photo2', 'photo/tableau3.jpg', 9),
(12, 'Photo3', 'photo/tableau5.jpg', 9),
(13, 'Photo1', 'photo/tableau4.jpg', 10),
(14, 'Photo1', 'photo/timbre.jpg', 12),
(15, 'Photo1', 'photo/timbre2.jpg', 13),
(16, 'Photo1', 'photo/timbre3.jpg', 14),
(17, 'Photo2', 'photo/timbre4.jpg', 14),
(18, 'Photo3', 'photo/timbre5.jpg', 14),
(19, 'Photo1', 'photo/montre.jpg', 15),
(20, 'Photo1', 'photo/montre2.jpg', 16),
(21, 'Photo2', 'photo/montre3.jpg', 16),
(22, 'Photo1', 'photo/montre4.jpg', 17),
(23, 'Photo1', 'photo/montre5', 18),
(24, 'Photo1', 'photo/montre_gousset.jpg', 19),
(25, 'Photo1', 'photo/bague1.jpg', 20),
(26, 'Photo2', 'photo/bague2.jpg', 20),
(27, 'Photo1', 'photo/parure.jpg', 21);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE `produit` (
  `produit_id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categorie` enum('Ferraille ou Tresor','Bon pour le musee','Accessoire VIP') COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '0',
  `achat_immediat_id` int(11) DEFAULT NULL,
  `encheres_id` int(11) DEFAULT NULL,
  `negociation_id` int(11) DEFAULT NULL,
  `vendeur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`produit_id`, `nom`, `categorie`, `description`, `video`, `statut`, `achat_immediat_id`, `encheres_id`, `negociation_id`, `vendeur_id`) VALUES
(1, 'Coffre', 'Ferraille ou Tresor', 'Petit coffre ancien ayant appartenu à ma grand-mère.\r\nBien conservé.', NULL, 0, 1, NULL, NULL, 3),
(2, 'Bague dorée avec rubis', 'Ferraille ou Tresor', 'Bague très peu utilisée', NULL, 0, NULL, 1, NULL, 4),
(3, 'Collier de perle + coffret', 'Ferraille ou Tresor', 'Collier de perle assorti avec le coffret. Taille adulte.', NULL, 0, 2, NULL, 1, 2),
(4, 'Piece de monnaie', 'Bon pour le musee', 'Lot de deux pieces de monnaies très anciennes.\r\nElles datent de l\'empire romain.', NULL, 0, 3, 2, NULL, 5),
(5, 'Pieces de monnaie', 'Bon pour le musee', 'Lot de 3 pièces de monnaies très bien conservées, piece d\'exposition de premier choix.', NULL, 0, NULL, NULL, 2, 6),
(6, 'Piece de monnaie', 'Bon pour le musee', 'Piece de monnaie en argent de la reine de 1894.', NULL, 0, 4, NULL, NULL, 5),
(7, 'tableau tigre', 'Bon pour le musee', 'tableau contemporain représentant un tigre.', NULL, 0, NULL, 3, NULL, 4),
(8, 'Tableau', 'Bon pour le musee', 'Ancien tableau du peintre de renommée internationale français.', NULL, 0, 9, 4, NULL, 7),
(9, 'Tableaux', 'Bon pour le musee', 'Lot de deux tableaux représentant chacun une famille et un homme', NULL, 0, NULL, NULL, 3, 6),
(10, 'Tableau', 'Bon pour le musee', 'Tableau d\'un navire français quittant le port', NULL, 0, 10, NULL, 4, 7),
(12, 'Timbre', 'Bon pour le musee', 'Timbre de la République française', NULL, 0, 5, NULL, NULL, 3),
(13, 'Timbre ', 'Bon pour le musee', 'Ancien timbre provenant de Tunis', NULL, 0, 11, 5, NULL, 5),
(14, 'Lot de timbres', 'Bon pour le musee', 'Lot de plusieurs timbres venant d\'horizons différents.', NULL, 0, NULL, 6, NULL, 7),
(15, 'Montre', 'Accessoire VIP', 'Montre bracelet noir et cadran noir qui affiche très bien l\'heure.', NULL, 0, 7, NULL, NULL, 3),
(16, 'Lot de 2 montres', 'Accessoire VIP', 'Lot de deux montres de VIP. Accessoire incontournable si vous voulez être VIP. Affiche l\'heure accessoirement.', NULL, 0, NULL, NULL, 5, 7),
(17, 'Montre', 'Accessoire VIP', 'Montre au design contemporain. Vendu neuve.', NULL, 0, NULL, 7, NULL, 1),
(18, 'Montre bling-bling', 'Accessoire VIP', 'Montre avec bracelet or et diamants incrustés dans le cadran qui permet de lire l\'heure.', NULL, 0, 6, NULL, 6, 1),
(19, 'Montre à gousset', 'Accessoire VIP', 'Montre à gousset pour briller en société. Très bon état.', NULL, 0, NULL, 8, NULL, 5),
(20, 'Bague en argent et verte', 'Accessoire VIP', 'Bague neuve en argent incrusté d\'une pierre verte.', NULL, 0, NULL, NULL, 7, 3),
(21, 'Parure', 'Accessoire VIP', 'Parure pour femme très peu portée, bon état.', NULL, 0, 8, NULL, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `adresse_id` int(11) NOT NULL,
  `acheteur_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE `vendeur` (
  `vendeur_id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vendeur`
--

INSERT INTO `vendeur` (`vendeur_id`, `nom`, `prenom`, `pseudo`, `mail`, `pp`, `mur`, `admin`) VALUES
(2, 'Pollux', 'Martin', 'MoutonCanadien', 'martin.pollux@edu.ece.fr', 'pp/avatar.png', 'background/gold-backgrounds-background-37815.jpg', 1),
(3, 'Souplet', 'Bernard', 'l\'hermite', 'bernard.souplet@edu.ece.fr', 'pp/random.jpg', 'background/background-1986452_960_720.jpg', 0),
(4, 'Dumont', 'Jean-Pierre', 'JP92', 'jean-pierre.dumont@edu.ece.fr', 'pp/random2.jpg', 'background/background-2462431_960_720.jpg', 0),
(5, 'Padding', 'Zahia', 'Zaza', 'zahia.padding@edu.ece.fr', 'pp/randome.jpg', 'background/bleuetoile.jpg', 0),
(6, 'Stars', 'Caroline', 'Etoilies', 'caroline.stars@edu.ece.fr', 'pp/randome2.jpg', 'background/espace.jpg', 0),
(7, 'Lacase', 'Alexandre', 'zet-zet', 'alexandre.lacazette@edu.ece.fr', 'pp/Unknown.png', 'background/texture-2012078_960_720.jpg', 0);
--
-- Indexes for dumped tables
--
--
-- Indexes for table `achat_immediat`
--
ALTER TABLE `achat_immediat`
  ADD PRIMARY KEY (`achat_immediat_id`);
--
-- Indexes for table `acheteur`
--
ALTER TABLE `acheteur`
  ADD PRIMARY KEY (`acheteur_id`);
--
-- Indexes for table `adresse_livraison`
--
ALTER TABLE `adresse_livraison`
  ADD PRIMARY KEY (`adresse_id`);
--
-- Indexes for table `carte_bancaire`
--
ALTER TABLE `carte_bancaire`
  ADD PRIMARY KEY (`numero`,`nom`);
--
-- Indexes for table `compte_bancaire`
--
ALTER TABLE `compte_bancaire`
  ADD PRIMARY KEY (`numero_carte`,`nom`);
--
-- Indexes for table `connexion_courante`
--
ALTER TABLE `connexion_courante`
  ADD PRIMARY KEY (`ip`);
--
-- Indexes for table `encheres`
--
ALTER TABLE `encheres`
  ADD PRIMARY KEY (`encheres_id`);
--
-- Indexes for table `negociation`
--
ALTER TABLE `negociation`
  ADD PRIMARY KEY (`negociation_id`);
--
-- Indexes for table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`offre_id`);
--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`acheteur_id`,`produit_id`);
--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`photo_id`);
--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`produit_id`);
--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);
--
-- Indexes for table `vendeur`
--
ALTER TABLE `vendeur`
  ADD PRIMARY KEY (`vendeur_id`);
--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `achat_immediat`
--
ALTER TABLE `achat_immediat`
  MODIFY `achat_immediat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `acheteur`
--
ALTER TABLE `acheteur`
  MODIFY `acheteur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `adresse_livraison`
--
ALTER TABLE `adresse_livraison`
  MODIFY `adresse_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `encheres`
--
ALTER TABLE `encheres`
  MODIFY `encheres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `negociation`
--
ALTER TABLE `negociation`
  MODIFY `negociation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `offre`
--
ALTER TABLE `offre`
  MODIFY `offre_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `produit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vendeur`
--
ALTER TABLE `vendeur`
  MODIFY `vendeur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;