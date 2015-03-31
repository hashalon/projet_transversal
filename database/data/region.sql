-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 29 Mars 2015 à 23:52
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projet_transversal`
--

--
-- Contenu de la table `region`
--

INSERT INTO `region` (`reg_no`, `reg_name`, `reg_svg`) VALUES
(1, 'Guadeloupe ', 'Guadeloupe_'),
(2, 'Martinique ', 'Martinique_'),
(3, 'Guyane ', 'Guyane_'),
(4, 'La Reunion ', 'La_Reunion_'),
(11, 'Ile-de-France', 'Ile-de-France'),
(21, 'Champagne-Ardenne', 'Champagne-Ardenne'),
(22, 'Picardie', 'Picardie'),
(23, 'Haute-Normandie', 'Haute-Normandie'),
(24, 'Centre', 'Centre'),
(25, 'Basse-Normandie', 'Basse-Normandie'),
(26, 'Bourgogne', 'Bourgogne'),
(31, 'Nord-Pas-de-Calais', 'Nord-Pas-de-Calais'),
(41, 'Lorraine', 'Lorraine'),
(42, 'Alsace', 'Alsace'),
(43, 'Franche-Comte', 'Franche-Comte'),
(52, 'Pays de la Loire', 'Pays_de_la_Loire'),
(53, 'Bretagne', 'Bretagne'),
(54, 'Poitou-Charentes', 'Poitou-Charentes'),
(72, 'Aquitaine', 'Aquitaine'),
(73, 'Midi-Pyrenees ', 'Midi-Pyrenees_'),
(74, 'Limousin', 'Limousin'),
(82, 'Rhone-Alpes', 'Rhone-Alpes'),
(83, 'Auvergne', 'Auvergne'),
(91, 'Languedoc-Roussillon', 'Languedoc-Roussillon'),
(93, 'Provence-Alpes-Cote d''Azur', 'Provence-Alpes-Cote_d_Azur'),
(94, 'Corse', 'Corse');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
