-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 05 août 2019 à 17:09
-- Version du serveur :  10.3.15-MariaDB
-- Version de PHP :  7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `symfony-portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(3) NOT NULL,
  `u_firstname` varchar(100) NOT NULL,
  `u_lastname` varchar(100) NOT NULL,
  `u_pseudo` varchar(10) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `u_password` varchar(20) NOT NULL,
  `statut` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `u_firstname`, `u_lastname`, `u_pseudo`, `u_email`, `u_password`, `statut`) VALUES
(4, 'nassim', 'amara', 'admin', 'nassim.amara@outlook.com', 'admin', 1),
(5, '', '', 'admin', '', 'admin', 0),
(6, 'nassim', 'amara', 'admin', 'nassim.amara@lepoles.com', 'admin', 1);

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `id-competences` int(3) NOT NULL,
  `cp-technology` varchar(255) NOT NULL,
  `cp-level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id-contact` int(3) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` int(10) NOT NULL,
  `objet` varchar(20) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id-formation` int(3) NOT NULL,
  `ft-title` varchar(100) NOT NULL,
  `ft-subtitle` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hobbies`
--

CREATE TABLE `hobbies` (
  `id-hobbies` int(3) NOT NULL,
  `hb-hobbies` varchar(200) NOT NULL,
  `hb-description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `languages`
--

CREATE TABLE `languages` (
  `id-language` int(3) NOT NULL,
  `lg-language` varchar(40) NOT NULL,
  `lg-level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `professional experience`
--

CREATE TABLE `professional experience` (
  `id-experience` int(3) NOT NULL,
  `experience-year1` year(4) NOT NULL,
  `experience-year2` year(4) NOT NULL,
  `experience-year3` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE `projects` (
  `id-project` int(3) NOT NULL,
  `pj-title` varchar(50) NOT NULL,
  `pj-description` varchar(255) NOT NULL,
  `pj-lien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `projects`
--

INSERT INTO `projects` (`id-project`, `pj-title`, `pj-description`, `pj-lien`) VALUES
(1, 'fghjkkjhgf', 'sdfrgthyjuk', 'defrgthyju');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id-competences`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id-contact`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id-formation`);

--
-- Index pour la table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`id-hobbies`);

--
-- Index pour la table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id-language`);

--
-- Index pour la table `professional experience`
--
ALTER TABLE `professional experience`
  ADD PRIMARY KEY (`id-experience`);

--
-- Index pour la table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id-project`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `id-competences` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id-contact` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id-formation` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id-hobbies` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `languages`
--
ALTER TABLE `languages`
  MODIFY `id-language` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `professional experience`
--
ALTER TABLE `professional experience`
  MODIFY `id-experience` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `projects`
--
ALTER TABLE `projects`
  MODIFY `id-project` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
