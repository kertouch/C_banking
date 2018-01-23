-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 18 jan. 2018 à 21:43
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `PTDW`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `id_agence` int(11) NOT NULL AUTO_INCREMENT,
  `id_banque` int(11) NOT NULL,
  `lat` decimal(11,7) NOT NULL,
  `lon` decimal(11,7) NOT NULL,
  `adresse` text NOT NULL,
  `DirectionGen` tinyint(1) NOT NULL DEFAULT '0',
  `Ville` text NOT NULL,
  PRIMARY KEY (`id_agence`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`id_agence`, `id_banque`, `lat`, `lon`, `adresse`, `DirectionGen`, `Ville`) VALUES
(35, 93, '36.0000000', '3.0000000', '48, Rue des FrÃ¨res Bouadou, Bir Mourad RaÃ¯s â€“ Alger', 1, 'Alger'),
(37, 94, '37.0000000', '3.0000000', '8, Boulevard Ernesto Che Guevara, Alger', 1, 'Alger'),
(42, 93, '36.1907480', '5.4101850', 'park mall, Setif', 0, 'Setif'),
(43, 93, '36.1912130', '5.3959180', 'maabouda, Setif', 0, 'Setif'),
(44, 95, '36.7516510', '2.8881790', '5, rue Gaci Amar, Staoueli, Alger', 1, 'Alger'),
(45, 94, '36.2101520', '5.4109730', 'bousseking, setif', 0, 'Setif'),
(46, 93, '36.7508900', '5.0567330', 'Lkhmiss, bejaia', 0, 'Bejaia');

-- --------------------------------------------------------

--
-- Structure de la table `banque`
--

DROP TABLE IF EXISTS `banque`;
CREATE TABLE IF NOT EXISTS `banque` (
  `id_banque` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text,
  `adresse` text,
  `logo` text,
  `tel` text,
  `fax` text,
  `lat` decimal(11,7) NOT NULL,
  `lon` decimal(11,7) NOT NULL,
  PRIMARY KEY (`id_banque`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `banque`
--

INSERT INTO `banque` (`id_banque`, `nom`, `adresse`, `logo`, `tel`, `fax`, `lat`, `lon`) VALUES
(93, 'BANQUE EXTERIEURE D ALGERIE Â« BEA Â»', '48, Rue des FrÃ¨res Bouadou, Bir Mourad RaÃ¯s â€“ Alger', 'l1.png', '021 56 25 70', '021 56 30 50 / 56 51 54', '36.0000000', '3.0000000'),
(94, 'BANQUE NATIONALE D ALGERIE Â« BNA Â»', '8, Boulevard Ernesto Che Guevara, Alger', 'logo2.png', '021 43 99 98', '021 43 94 94', '37.0000000', '3.0000000'),
(95, 'BANQUE DE DÃ‰VELOPPEMENT LOCAL Â« BDL Â»', '5, rue Gaci Amar, Staoueli, Alger', '9.jpg', '021 39 34 89 â€“ 39 52 15', '021 39 37 57', '36.7516510', '2.8881790');

--
-- Déclencheurs `banque`
--
DROP TRIGGER IF EXISTS `add_agancy`;
DELIMITER $$
CREATE TRIGGER `add_agancy` AFTER INSERT ON `banque` FOR EACH ROW INSERT INTO `agence` (`id_agence`, `id_banque`, `lat`, `lon`, `adresse`, `DirectionGen`,`Ville`) VALUES (NULL, new.id_banque, new.lat, new.lon, new.adresse, '1',"Alger")
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ajouter_monetique`;
DELIMITER $$
CREATE TRIGGER `ajouter_monetique` AFTER INSERT ON `banque` FOR EACH ROW INSERT INTO `monetique` (`id_monetique`, `id_banque`, `emi_car`, `ren`, `rec`, `ree`, `com_dab`, `com_dab_co`, `com_tpe_cl`, `com_tpe_comm`, `em_cart_inter`, `octr`, `mise`, `recon`, `ree_sec`, `chan_pin`) VALUES (NULL, new.id_banque, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ajouter_paiemnt`;
DELIMITER $$
CREATE TRIGGER `ajouter_paiemnt` AFTER INSERT ON `banque` FOR EACH ROW INSERT INTO `paiement` (`id_paiment`, `id_banque`, `vers_cli`, `vers_tie`, `vers_dep`, `vir_mem`, `vir_aut`, `vir_dev`, `ret_esp`, `ret_gui`, `emmi_ch`, `emmi_dep`, `annu_ban`, `vir_com`, `vir_ord`) VALUES (NULL,new.id_banque, 0,0,0, 0,0,0, 0,0,0, 0,0,0,0)
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `insert_compte`;
DELIMITER $$
CREATE TRIGGER `insert_compte` AFTER INSERT ON `banque` FOR EACH ROW INSERT INTO `compte` (`id_compte`, `id_banque`, `courant`, `professionnel`,`cheque`, `livret`, `devise`, `fermCourant`, `fermCheque`, `fermLivret`, `fermDevise`, `delivrance`) VALUES (NULL, new.id_banque, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `id_compte` int(11) NOT NULL AUTO_INCREMENT,
  `id_banque` int(11) NOT NULL,
  `courant` int(100) NOT NULL DEFAULT '0',
  `professionnel` int(100) NOT NULL DEFAULT '0',
  `cheque` int(100) NOT NULL DEFAULT '0',
  `livret` int(100) NOT NULL DEFAULT '0',
  `devise` int(100) NOT NULL DEFAULT '0',
  `fermCourant` int(100) NOT NULL DEFAULT '0',
  `fermCheque` int(100) NOT NULL DEFAULT '0',
  `fermLivret` int(100) NOT NULL DEFAULT '0',
  `fermDevise` int(100) NOT NULL DEFAULT '0',
  `delivrance` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_compte`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id_compte`, `id_banque`, `courant`, `professionnel`, `cheque`, `livret`, `devise`, `fermCourant`, `fermCheque`, `fermLivret`, `fermDevise`, `delivrance`) VALUES
(70, 95, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(69, 94, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(68, 93, 0, 0, 0, 0, 0, 0, 0, 57, 37, 100);

-- --------------------------------------------------------

--
-- Structure de la table `monetique`
--

DROP TABLE IF EXISTS `monetique`;
CREATE TABLE IF NOT EXISTS `monetique` (
  `id_monetique` int(11) NOT NULL AUTO_INCREMENT,
  `id_banque` int(11) NOT NULL,
  `emi_car` int(100) DEFAULT NULL,
  `ren` int(100) DEFAULT NULL,
  `rec` int(100) NOT NULL,
  `ree` int(100) NOT NULL,
  `com_dab` int(100) NOT NULL,
  `com_dab_co` int(100) NOT NULL,
  `com_tpe_cl` int(100) NOT NULL,
  `com_tpe_comm` int(100) NOT NULL,
  `em_cart_inter` int(100) NOT NULL,
  `octr` int(100) NOT NULL,
  `mise` int(100) DEFAULT NULL,
  `recon` int(100) DEFAULT NULL,
  `ree_sec` int(100) DEFAULT NULL,
  `chan_pin` int(100) DEFAULT NULL,
  PRIMARY KEY (`id_monetique`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `monetique`
--

INSERT INTO `monetique` (`id_monetique`, `id_banque`, `emi_car`, `ren`, `rec`, `ree`, `com_dab`, `com_dab_co`, `com_tpe_cl`, `com_tpe_comm`, `em_cart_inter`, `octr`, `mise`, `recon`, `ree_sec`, `chan_pin`) VALUES
(64, 95, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(63, 94, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(62, 93, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `id_paiment` int(11) NOT NULL AUTO_INCREMENT,
  `id_banque` text,
  `vers_cli` int(100) DEFAULT NULL,
  `vers_tie` int(100) DEFAULT NULL,
  `vers_dep` int(100) DEFAULT NULL,
  `vir_mem` int(100) DEFAULT NULL,
  `vir_aut` int(100) DEFAULT NULL,
  `vir_dev` int(100) DEFAULT NULL,
  `ret_esp` int(100) DEFAULT NULL,
  `ret_gui` int(100) DEFAULT NULL,
  `emmi_ch` int(100) DEFAULT NULL,
  `emmi_dep` int(100) DEFAULT NULL,
  `annu_ban` int(100) DEFAULT NULL,
  `vir_com` int(100) DEFAULT NULL,
  `vir_ord` int(100) DEFAULT NULL,
  PRIMARY KEY (`id_paiment`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `paiement`
--

INSERT INTO `paiement` (`id_paiment`, `id_banque`, `vers_cli`, `vers_tie`, `vers_dep`, `vir_mem`, `vir_aut`, `vir_dev`, `ret_esp`, `ret_gui`, `emmi_ch`, `emmi_dep`, `annu_ban`, `vir_com`, `vir_ord`) VALUES
(65, '95', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(64, '94', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 123, 0, 10),
(63, '93', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`nom`, `prenom`, `email`, `password`) VALUES
('nasri', 'karim', 'dk_nasri@esi.dz', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
