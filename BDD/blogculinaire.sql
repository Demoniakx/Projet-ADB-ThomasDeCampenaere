-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 24 mai 2024 à 20:33
-- Version du serveur : 8.2.0
-- Version de PHP : 8.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blogculinaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
CREATE TABLE IF NOT EXISTS `recipes` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `cookingtools` text NOT NULL,
  `ingredients` text NOT NULL,
  `person` int NOT NULL,
  `recipe` longtext NOT NULL,
  `author` varchar(50) NOT NULL,
  `date_create` date NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `recipes`
--

INSERT INTO `recipes` (`ID`, `title`, `cookingtools`, `ingredients`, `person`, `recipe`, `author`, `date_create`, `user_id`) VALUES
(5, 'couscous merguez poulet', 'aucun', 'semoul\r\npoulet\r\nmerguez\r\npoids chihches', 6, 'dslqjdks\r\nqdsq\r\nd\r\nsq\r\nd\r\nqs\r\nd\r\nqs\r\nd\r\nsq\r\nd\r\nqs\r\nd\r\nfbvd\r\ngsf\r\nsdfsd\r\nfsd\r\nf\r\nsdf\r\nsd\r\nf\r\nsd', 'Demoniakx', '2024-05-22', 5),
(6, 'Tajine a la menthe', 'cuillères\r\ntajine\r\npoêle\r\ncasseroles', 'semoule\r\nmenthe\r\npoulet\r\npoivrons', 6, 'sdsd\r\nsdqs\r\ndsqd\r\nsq\r\ndqs\r\nd\r\nqsd\r\nqs\r\nd\r\nqs\r\nd\r\nq\r\nd\r\nq\r\nd\r\nq\r\nd\r\nqsdqdq\r\n\r\nqsd', 'Demoniakx', '2024-05-22', 5),
(7, 'Poulet pané doritos', '1 grand bol\r\n2 assiettes', '4 filets de poulet pané\r\n1 packet de chips style doritos\r\noeuf\r\nfarine', 4, 'casser les oeufs\r\nbattre les oeufs\r\nrecouvrir le poulet de farine\r\nplongé le filet de poulet dans les oeufs\r\nrecouvrir de panure\r\nRépétez ces actions pour les autres filets\r\nMettre au four a 180 pendant 25 minutes\r\n\r\nServez ce plat avec du riz ou des pates\r\n\r\nBon appétit', 'Guillaume', '2024-05-24', 8);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `date_create` timestamp NOT NULL,
  `date_log` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `lastname`, `firstname`, `password`, `role`, `date_create`, `date_log`) VALUES
(5, 'thomasdecampenaere@gmail.com', 'Demoniakx', 'De Campenaere', 'Thomas', '$2y$10$wpfGSfxKiWYghlN2qsz1kO16dVeWktJFCFn3v5QcyXhQP8k.ROmyu', 1, '2021-05-23 22:00:00', '2024-05-24 18:28:25'),
(8, 'guillaume@gmail.com', 'Guillaume', 'Raugui', 'Guillaume', '$2y$10$r8r/JkNm4j7wfIDbnii/5.3iRL0I1L5pFy5BXtXGoCPHcdI443UWq', 0, '2024-05-22 08:42:18', '2024-05-24 18:13:17'),
(18, 'Fifille@hotmail.com', 'Fifille', 'Cookie', 'Fifille', '$2y$10$XmSeP3IVmOHcHOFruNCzSexh8UnnF4/pqF/ZVbfH6Ue8Mf3kL1iY.', 0, '2024-05-24 14:12:05', '2024-05-24 18:33:33');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
