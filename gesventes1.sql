-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 04 Juillet 2018 à 13:44
-- Version du serveur :  5.7.18-log
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gesvente`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `IDCLIENT` int(11) NOT NULL,
  `NOM` char(25) NOT NULL,
  `PRENOM` char(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`IDCLIENT`, `NOM`, `PRENOM`) VALUES
(133, 'Dieye Diallo', 'Fatou'),
(6, 'DIALLO', 'Mohamed Samba');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `IDCOMMANDE` int(11) NOT NULL,
  `IDCLIENT` int(11) NOT NULL,
  `NUMERO` char(25) NOT NULL,
  `DATE` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `IDLIGNE` int(11) NOT NULL,
  `IDCOMMANDE` int(11) NOT NULL,
  `IDPRODUIT` int(11) NOT NULL,
  `QUANTITE` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `IDPRODUIT` int(11) NOT NULL,
  `LIBELLE` char(25) NOT NULL,
  `PRIX` decimal(8,2) NOT NULL,
  `QUANTITE` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`IDPRODUIT`, `LIBELLE`, `PRIX`, `QUANTITE`) VALUES
(10, 'niamby', '200.00', 7),
(12, 'pain', '150.00', 3),
(13, 'lait', '100.00', 3),
(7, 'clavier', '500000.00', 7),
(11, 'ecran', '100000.00', 2),
(14, 'pagnet', '250.00', 1),
(15, 'pagnet', '15000.00', 2),
(16, 'Baignet', '50.00', 100);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idU` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `ddn` date NOT NULL,
  `sex` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idU`, `nom`, `prenom`, `login`, `ddn`, `sex`, `mdp`) VALUES
(35, 'Diallo', 'Mohamed Samba', 'mohamed', '2018-07-02', 'M', '292959f6c7ab4f8b0761469ac1f11fc73f43b306'),
(34, 'Ibou', 'Diallo', 'moha', '1999-01-01', 'H', '8c42e5addbc5a9a77b9110e880ccac6d7fcb67d066ba91c7627fa02b892f0e85');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`IDCLIENT`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`IDCOMMANDE`),
  ADD KEY `FK_COMMANDER` (`IDCLIENT`);

--
-- Index pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`IDLIGNE`),
  ADD KEY `FK_ASSOCIATION_2` (`IDCOMMANDE`),
  ADD KEY `FK_ASSOCIATION_3` (`IDPRODUIT`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`IDPRODUIT`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idU`),
  ADD UNIQUE KEY `uniquelogin` (`login`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `IDCLIENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `IDPRODUIT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
