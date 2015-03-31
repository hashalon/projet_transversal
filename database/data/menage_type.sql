-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 29 Mars 2015 à 23:43
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
-- Contenu de la table `menage_type`
--

INSERT INTO `menage_type` (`mt_id`, `mt_name`) VALUES
(1, 'Nombre de ménages'),
(2, 'Nombre de ménages 1 personne'),
(3, 'Nombre de ménages Hommes seuls'),
(4, 'Nombre de ménages Femmes seules'),
(5, 'Nombre de ménages autres sans famille'),
(6, 'Nombre de ménages avec famille'),
(7, 'Nombre de ménages fam princ Couple sans enfant'),
(8, 'Nombre de ménages fam princ Couple avec enfants(s)'),
(9, 'Nombre de ménages fam princ Famille mono');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
