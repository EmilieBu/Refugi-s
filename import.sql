-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 22 Décembre 2015 à 23:14
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `Symfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `camp`
--

CREATE TABLE `camp` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdDate` datetime NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `centrale_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `camp`
--

INSERT INTO `camp` (`id`, `name`, `createdDate`, `lat`, `lon`, `description`, `lieu`, `centrale_id`) VALUES
(1, 'Bollywood karma', '2010-01-01 00:00:00', 28.613939, 77.209021, 'C''est que du cinéma', 'New Dehli', 1),
(3, 'Camp de Jawab', '2010-01-01 00:00:00', 48.8687488, 2.3521819, 'C''est d''la bombe', 'Paris', 1),
(4, 'Nollywood Nnaji', '2010-01-01 00:00:00', 9.076479, 7.398574, 'C''est mieux que bombay', 'Abuja', 1);

-- --------------------------------------------------------

--
-- Structure de la table `centrale`
--

CREATE TABLE `centrale` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `centrale`
--

INSERT INTO `centrale` (`id`, `nom`, `lat`, `lon`) VALUES
(1, 'Auchan', 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `type`, `description`, `unit`) VALUES
(1, 'Riz', 'ali', '', 'kg'),
(6, 'Paracétamol', 'med', 'Contre les maux de tête', 'plaquette de 20'),
(7, 'amoxiciline', 'med', 'Antibiotique', 'plaquette de 10'),
(8, 'table', 'mob', NULL, 'unité'),
(9, 'tente', 'mob', 'Une pour 2 personnes', 'unité'),
(10, 'couverture', 'div', 'Pour dormir au chaud', 'paquet de 5'),
(11, 'Eau', 'ali', NULL, 'litre'),
(12, 'clémentine', 'ali', NULL, 'kg'),
(13, 'poulet', 'ali', NULL, 'cuisse');

-- --------------------------------------------------------

--
-- Structure de la table `quantite`
--

CREATE TABLE `quantite` (
  `id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `quantiteRequired` int(11) NOT NULL,
  `camp_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `quantite`
--

INSERT INTO `quantite` (`id`, `quantite`, `quantiteRequired`, `camp_id`, `produit_id`) VALUES
(1, 10, 10, 3, 1),
(3, 10, 100, 3, 6),
(4, 40, 100, 3, 9),
(5, 30, 20, 3, 7),
(6, 20, 10, 3, 8),
(7, 401, 200, 3, 11),
(8, 10, 10, 3, 10);

-- --------------------------------------------------------

--
-- Structure de la table `quantite_camp`
--

CREATE TABLE `quantite_camp` (
  `quantite_id` int(11) NOT NULL,
  `camp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `quantite_produit`
--

CREATE TABLE `quantite_produit` (
  `quantite_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `refugie`
--

CREATE TABLE `refugie` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `poids` int(11) DEFAULT NULL,
  `taille` int(11) DEFAULT NULL,
  `cheveux` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `yeux` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paysOrigine` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `villeOrigine` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateArr` datetime NOT NULL,
  `etatSante` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contamine` tinyint(1) NOT NULL,
  `camp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `refugie`
--

INSERT INTO `refugie` (`id`, `nom`, `prenom`, `age`, `poids`, `taille`, `cheveux`, `yeux`, `paysOrigine`, `villeOrigine`, `dateArr`, `etatSante`, `contamine`, `camp_id`) VALUES
(9, 'Ronaldo', 'Christiano', 36, 80, 187, 'brun', 'marron', 'GA', 'Bégé ville', '2010-01-01 00:00:00', 'Au top', 1, 3),
(10, 'Jacky', 'Lièvre', 70, 100, 180, 'brun', 'vert', 'ZA', 'Génève', '2010-01-01 00:00:00', 'Vieillesse avancée', 1, 3),
(11, 'Johnny', 'Lamar', 12, 230, 160, 'roux', 'bleu', 'ZA', 'Grenobles', '2010-01-01 00:00:00', 'Obésité morbide', 1, 3),
(12, 'Mereh', 'Momo', 22, 73, 180, 'brun', 'marron', 'FK', 'Bégé ville', '2010-01-01 00:00:00', 'Gastro + angine rouge', 0, 3),
(13, NULL, NULL, NULL, 170, 180, 'roux', 'vert', 'ZA', NULL, '2010-01-01 00:00:00', 'Ca va', 0, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `camp`
--
ALTER TABLE `camp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C194423058A1D71F` (`centrale_id`);

--
-- Index pour la table `centrale`
--
ALTER TABLE `centrale`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `quantite`
--
ALTER TABLE `quantite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8BF24A79F347EFB` (`produit_id`),
  ADD KEY `IDX_8BF24A7977075ABB` (`camp_id`);

--
-- Index pour la table `quantite_camp`
--
ALTER TABLE `quantite_camp`
  ADD PRIMARY KEY (`quantite_id`,`camp_id`),
  ADD KEY `IDX_F2EDEEF26444A2DB` (`quantite_id`),
  ADD KEY `IDX_F2EDEEF277075ABB` (`camp_id`);

--
-- Index pour la table `quantite_produit`
--
ALTER TABLE `quantite_produit`
  ADD PRIMARY KEY (`quantite_id`,`produit_id`),
  ADD KEY `IDX_90E594476444A2DB` (`quantite_id`),
  ADD KEY `IDX_90E59447F347EFB` (`produit_id`);

--
-- Index pour la table `refugie`
--
ALTER TABLE `refugie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_304ECA4A77075ABB` (`camp_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `camp`
--
ALTER TABLE `camp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `centrale`
--
ALTER TABLE `centrale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `quantite`
--
ALTER TABLE `quantite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `refugie`
--
ALTER TABLE `refugie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `camp`
--
ALTER TABLE `camp`
  ADD CONSTRAINT `FK_C194423058A1D71F` FOREIGN KEY (`centrale_id`) REFERENCES `centrale` (`id`);

--
-- Contraintes pour la table `quantite`
--
ALTER TABLE `quantite`
  ADD CONSTRAINT `FK_8BF24A79F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `FK_8BF24A7977075ABB` FOREIGN KEY (`camp_id`) REFERENCES `camp` (`id`);

--
-- Contraintes pour la table `quantite_camp`
--
ALTER TABLE `quantite_camp`
  ADD CONSTRAINT `FK_F2EDEEF277075ABB` FOREIGN KEY (`camp_id`) REFERENCES `camp` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_F2EDEEF26444A2DB` FOREIGN KEY (`quantite_id`) REFERENCES `quantite` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `quantite_produit`
--
ALTER TABLE `quantite_produit`
  ADD CONSTRAINT `FK_90E59447F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_90E594476444A2DB` FOREIGN KEY (`quantite_id`) REFERENCES `quantite` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `refugie`
--
ALTER TABLE `refugie`
  ADD CONSTRAINT `FK_304ECA4A77075ABB` FOREIGN KEY (`camp_id`) REFERENCES `camp` (`id`);
