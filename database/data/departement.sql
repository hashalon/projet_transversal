-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 29 Mars 2015 à 23:37
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
-- Contenu de la table `departement`
--

INSERT INTO `departement` (`dep_no`, `dep_name`, `reg_no`) VALUES
('1', 'Ain', 82),
('10', 'Aube', 21),
('11', 'Aude', 91),
('12', 'Aveyron', 73),
('13', 'Bouches-du-Rhone', 93),
('14', 'Calvados', 25),
('15', 'Cantal', 83),
('16', 'Charente', 54),
('17', 'Charente-Maritime', 54),
('18', 'Cher', 24),
('19', 'Correze', 74),
('2', 'Aisne', 22),
('21', 'Cote-d''Or', 26),
('22', 'Cotes-d''Armor', 53),
('23', 'Creuse', 74),
('24', 'Dordogne', 72),
('25', 'Doubs', 43),
('26', 'Drome', 82),
('27', 'Eure', 23),
('28', 'Eure-et-Loir', 24),
('29', 'Finistere', 53),
('2A', 'Corse-du-Sud', 94),
('2B', 'Haute-Corse', 94),
('3', 'Allier', 83),
('30', 'Gard', 91),
('31', 'Haute-Garonne', 73),
('32', 'Gers', 73),
('33', 'Gironde', 72),
('34', 'Herault', 91),
('35', 'Ille-et-Vilaine', 53),
('36', 'Indre', 24),
('37', 'Indre-et-Loire', 24),
('38', 'Isere', 82),
('39', 'Jura', 43),
('4', 'Alpes-de-Haute-Provence', 93),
('40', 'Landes', 72),
('41', 'Loir-et-Cher', 24),
('42', 'Loire', 82),
('43', 'Haute-Loire', 83),
('44', 'Loire-Atlantique', 52),
('45', 'Loiret', 24),
('46', 'Lot', 73),
('47', 'Lot-et-Garonne', 72),
('48', 'Lozere', 91),
('49', 'Maine-et-Loire', 52),
('5', 'Hautes-Alpes', 93),
('50', 'Manche', 25),
('51', 'Marne', 21),
('52', 'Haute-Marne', 21),
('53', 'Mayenne', 52),
('54', 'Meurthe-et-Moselle', 41),
('55', 'Meuse', 41),
('56', 'Morbihan', 53),
('57', 'Moselle', 41),
('58', 'Nievre', 26),
('59', 'Nord', 31),
('6', 'Alpes-Maritimes', 93),
('60', 'Oise', 22),
('61', 'Orne', 25),
('62', 'Pas-de-Calais', 31),
('63', 'Puy-de-Dome', 83),
('64', 'Pyrenees-Atlantiques', 72),
('65', 'Hautes-Pyrenees', 73),
('66', 'Pyrenees-Orientales', 91),
('67', 'Bas-Rhin', 42),
('68', 'Haut-Rhin', 42),
('69', 'Rhone', 82),
('7', 'Ardeche', 82),
('70', 'Haute-Saone', 43),
('71', 'Saone-et-Loire', 26),
('72', 'Sarthe', 52),
('73', 'Savoie', 82),
('74', 'Haute-Savoie', 82),
('75', 'Paris', 11),
('76', 'Seine-Maritime', 23),
('77', 'Seine-et-Marne', 11),
('78', 'Yvelines', 11),
('79', 'Deux-Sevres', 54),
('8', 'Ardennes', 21),
('80', 'Somme', 22),
('81', 'Tarn', 73),
('82', 'Tarn-et-Garonne', 73),
('83', 'Var', 93),
('84', 'Vaucluse', 93),
('85', 'Vendee', 52),
('86', 'Vienne', 54),
('87', 'Haute-Vienne', 74),
('88', 'Vosges', 41),
('89', 'Yonne', 26),
('9', 'Ariege', 73),
('90', 'Territoire de Belfort', 43),
('91', 'Essonne', 11),
('92', 'Hauts-de-Seine', 11),
('93', 'Seine-Saint-Denis', 11),
('94', 'Val-de-Marne', 11),
('95', 'Val-d''Oise', 11),
('971', 'Guadeloupe', 1),
('972', 'Martinique', 2),
('973', 'Guyane', 3),
('974', 'La Reunion', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
