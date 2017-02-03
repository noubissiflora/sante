-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Ven 03 Février 2017 à 16:58
-- Version du serveur :  5.6.33
-- Version de PHP :  5.6.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sante`
--

-- --------------------------------------------------------

--
-- Structure de la table `commands`
--

CREATE TABLE `commands` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `pharmacy_id` int(11) NOT NULL,
  `amount` float DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `comment` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commands`
--

INSERT INTO `commands` (`id`, `patient_id`, `pharmacy_id`, `amount`, `status`, `comment`, `created`, `modified`) VALUES
(1, 1, 1, 5000, 'en cours', 'azert', '2017-01-31 10:32:56', '2017-02-02 12:18:21'),
(2, 1, 1, 6000, 'en cours', '', '2017-02-01 12:43:22', '2017-02-01 12:43:22'),
(3, 2, 1, 10000, 'en cours', 'errttt', '2017-02-02 08:07:16', '2017-02-02 08:07:16');

-- --------------------------------------------------------

--
-- Structure de la table `contributions`
--

CREATE TABLE `contributions` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `command_id` int(11) NOT NULL,
  `amount` float DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `comment` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contributions`
--

INSERT INTO `contributions` (`id`, `patient_id`, `command_id`, `amount`, `status`, `comment`, `created`, `modified`) VALUES
(1, 2, 1, 2000, '', '', '2017-02-01 12:38:26', '2017-02-01 12:38:36');

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `patients`
--

INSERT INTO `patients` (`id`, `role_id`, `name`, `surname`, `phone`, `country`, `created`, `modified`) VALUES
(1, 1, 'flora', 'flo', '67788994455', 'Cameroun', '2017-01-27 16:34:07', '2017-02-01 12:29:26'),
(2, 2, 'sacha', 'flo', '699887766', 'Cameroun', '2017-02-01 10:45:30', '2017-02-01 10:45:30'),
(3, 1, 'noubissi', 'flora', '123456', 'Cameroun', '2017-02-02 15:49:23', '2017-02-02 15:49:23'),
(4, 1, 'popo', 'po', '123456', 'Cameroun', '2017-02-02 16:00:36', '2017-02-02 16:00:36');

-- --------------------------------------------------------

--
-- Structure de la table `pharmacies`
--

CREATE TABLE `pharmacies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `responsible_1` varchar(255) DEFAULT NULL,
  `responsible_2` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pharmacies`
--

INSERT INTO `pharmacies` (`id`, `name`, `address`, `phone`, `email`, `responsible_1`, `responsible_2`, `created`, `modified`) VALUES
(1, 'soleil', 'abbia', '677777777', 'flora@flora.com', 'aba', 'abiba', '2017-01-31 10:32:33', '2017-01-31 10:32:33');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `typ` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`, `typ`, `created`, `modified`) VALUES
(1, 'patient', '2017-01-27 16:33:36', '2017-01-27 16:33:36'),
(2, 'famille', '2017-02-01 10:44:34', '2017-02-01 10:44:34'),
(3, 'admin', '2017-02-03 11:12:13', '2017-02-03 11:12:13');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `login` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `patient_id`, `login`, `password`, `status`, `created`, `modified`) VALUES
(1, 1, 'azerty', '$2y$10$XX3FK6oOZCq/A04jyg7nB.fPMMeZJb821p50vXL.7BYgtEXLjzY1C', 'actif', '2017-01-27 16:34:39', '2017-02-01 14:09:30'),
(2, 4, 'popo', '$2y$10$YpNnXVPllYMWk45tQCEgPeAt8VLlzOZP5uFNqLU2C3uSH8Dmg3hM6', 'mp', '2017-02-02 16:00:36', '2017-02-03 15:07:47');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commands`
--
ALTER TABLE `commands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_key` (`patient_id`),
  ADD KEY `pharmacy_key` (`pharmacy_id`);

--
-- Index pour la table `contributions`
--
ALTER TABLE `contributions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_key` (`patient_id`),
  ADD KEY `command_key` (`command_id`);

--
-- Index pour la table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_key` (`role_id`);

--
-- Index pour la table `pharmacies`
--
ALTER TABLE `pharmacies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_key` (`patient_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commands`
--
ALTER TABLE `commands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `contributions`
--
ALTER TABLE `contributions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `pharmacies`
--
ALTER TABLE `pharmacies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commands`
--
ALTER TABLE `commands`
  ADD CONSTRAINT `commands_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `commands_ibfk_2` FOREIGN KEY (`pharmacy_id`) REFERENCES `pharmacies` (`id`);

--
-- Contraintes pour la table `contributions`
--
ALTER TABLE `contributions`
  ADD CONSTRAINT `contributions_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `contributions_ibfk_2` FOREIGN KEY (`command_id`) REFERENCES `commands` (`id`);

--
-- Contraintes pour la table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
