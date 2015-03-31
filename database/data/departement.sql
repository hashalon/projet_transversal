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

INSERT INTO `departement` (`dep_no`, `dep_name`, `dep_svg`, `reg_no`) VALUES
('1', 'Ain', 'Ain', 82),
('10', 'Aube', 'Aube', 21),
('11', 'Aude', 'Aude', 91),
('12', 'Aveyron', 'Aveyron', 73),
('13', 'Bouches-du-Rhone', 'Bouches-du-Rhone', 93),
('14', 'Calvados', 'Calvados', 25),
('15', 'Cantal', 'Cantal', 83),
('16', 'Charente', 'Charente', 54),
('17', 'Charente-Maritime', 'Charente-Maritime', 54),
('18', 'Cher', 'Cher', 24),
('19', 'Correze', 'Correze', 74),
('2', 'Aisne', 'Aisne', 22),
('21', 'Cote-d''Or', 'Cote-d_Or', 26),
('22', 'Cotes-d''Armor', 'Cotes-d_Armor', 53),
('23', 'Creuse', 'Creuse', 74),
('24', 'Dordogne', 'Dordogne', 72),
('25', 'Doubs', 'Doubs', 43),
('26', 'Drome', 'Drome', 82),
('27', 'Eure', 'Eure', 23),
('28', 'Eure-et-Loir', 'Eure-et-Loir', 24),
('29', 'Finistere', 'Finistere', 53),
('2A', 'Corse-du-Sud', 'Corse-du-Sud', 94),
('2B', 'Haute-Corse', 'Haute-Corse', 94),
('3', 'Allier', 'Allier', 83),
('30', 'Gard', 'Gard', 91),
('31', 'Haute-Garonne', 'Haute-Garonne', 73),
('32', 'Gers', 'Gers', 73),
('33', 'Gironde', 'Gironde', 72),
('34', 'Herault', 'Herault', 91),
('35', 'Ille-et-Vilaine', 'Ille-et-Vilaine', 53),
('36', 'Indre', 'Indre', 24),
('37', 'Indre-et-Loire', 'Indre-et-Loire', 24),
('38', 'Isere', 'Isere', 82),
('39', 'Jura', 'Jura', 43),
('4', 'Alpes-de-Haute-Provence', 'Alpes-de-Haute-Provence', 93),
('40', 'Landes', 'Landes', 72),
('41', 'Loir-et-Cher', 'Loir-et-Cher', 24),
('42', 'Loire', 'Loire', 82),
('43', 'Haute-Loire', 'Haute-Loire', 83),
('44', 'Loire-Atlantique', 'Loire-Atlantique', 52),
('45', 'Loiret', 'Loiret', 24),
('46', 'Lot', 'Lot', 73),
('47', 'Lot-et-Garonne', 'Lot-et-Garonne', 72),
('48', 'Lozere', 'Lozere', 91),
('49', 'Maine-et-Loire', 'Maine-et-Loire', 52),
('5', 'Hautes-Alpes', 'Hautes-Alpes', 93),
('50', 'Manche', 'Manche', 25),
('51', 'Marne', 'Marne', 21),
('52', 'Haute-Marne', 'Haute-Marne', 21),
('53', 'Mayenne', 'Mayenne', 52),
('54', 'Meurthe-et-Moselle', 'Meurthe-et-Moselle', 41),
('55', 'Meuse', 'Meuse', 41),
('56', 'Morbihan', 'Morbihan', 53),
('57', 'Moselle', 'Moselle', 41),
('58', 'Nievre', 'Nievre', 26),
('59', 'Nord', 'Nord', 31),
('6', 'Alpes-Maritimes', 'Alpes-Maritimes', 93),
('60', 'Oise', 'Oise', 22),
('61', 'Orne', 'Orne', 25),
('62', 'Pas-de-Calais', 'Pas-de-Calais', 31),
('63', 'Puy-de-Dome', 'Puy-de-Dome', 83),
('64', 'Pyrenees-Atlantiques', 'Pyrenees-Atlantiques', 72),
('65', 'Hautes-Pyrenees', 'Hautes-Pyrenees', 73),
('66', 'Pyrenees-Orientales', 'Pyrenees-Orientales', 91),
('67', 'Bas-Rhin', 'Bas-Rhin', 42),
('68', 'Haut-Rhin', 'Haut-Rhin', 42),
('69', 'Rhone', 'Rhone', 82),
('7', 'Ardeche', 'Ardeche', 82),
('70', 'Haute-Saone', 'Haute-Saone', 43),
('71', 'Saone-et-Loire', 'Saone-et-Loire', 26),
('72', 'Sarthe', 'Sarthe', 52),
('73', 'Savoie', 'Savoie', 82),
('74', 'Haute-Savoie', 'Haute-Savoie', 82),
('75', 'Paris', 'Paris', 11),
('76', 'Seine-Maritime', 'Seine-Maritime', 23),
('77', 'Seine-et-Marne', 'Seine-et-Marne', 11),
('78', 'Yvelines', 'Yvelines', 11),
('79', 'Deux-Sevres', 'Deux-Sevres', 54),
('8', 'Ardennes', 'Ardennes', 21),
('80', 'Somme', 'Somme', 22),
('81', 'Tarn', 'Tarn', 73),
('82', 'Tarn-et-Garonne', 'Tarn-et-Garonne', 73),
('83', 'Var', 'Var', 93),
('84', 'Vaucluse', 'Vaucluse', 93),
('85', 'Vendee', 'Vendee', 52),
('86', 'Vienne', 'Vienne', 54),
('87', 'Haute-Vienne', 'Haute-Vienne', 74),
('88', 'Vosges', 'Vosges', 41),
('89', 'Yonne', 'Yonne', 26),
('9', 'Ariege', 'Ariege', 73),
('90', 'Territoire de Belfort', 'Territoire_de_Belfort', 43),
('91', 'Essonne', 'Essonne', 11),
('92', 'Hauts-de-Seine', 'Hauts-de-Seine', 11),
('93', 'Seine-Saint-Denis', 'Seine-Saint-Denis', 11),
('94', 'Val-de-Marne', 'Val-de-Marne', 11),
('95', 'Val-d''Oise', 'Val-d_Oise', 11),
('971', 'Guadeloupe', 'Guadeloupe', 1),
('972', 'Martinique', 'Martinique', 2),
('973', 'Guyane', 'Guyane', 3),
('974', 'La Reunion', 'La_Reunion', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
