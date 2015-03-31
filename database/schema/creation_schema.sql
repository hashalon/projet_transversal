-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 29 Mars 2015 à 23:32
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

CREATE DATABASE IF NOT EXISTS `dynamismeFR`;
USE `dynamismeFR`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `new_schema`
--

-- --------------------------------------------------------

--
-- Structure de la table `arrondissement`
--

DROP TABLE IF EXISTS `arrondissement`;
CREATE TABLE IF NOT EXISTS `arrondissement` (
  `arr_code` varchar(50) NOT NULL,
  `arr_name` varchar(50) NOT NULL,
  `arr_svg` varchar(50) NOT NULL,
  `dep_no` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`arr_code`),
  KEY `test_department_dep_no` (`dep_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_age`
--

DROP TABLE IF EXISTS `categorie_age`;
CREATE TABLE IF NOT EXISTS `categorie_age` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_type` varchar(10) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `chomage`
--

DROP TABLE IF EXISTS `chomage`;
CREATE TABLE IF NOT EXISTS `chomage` (
  `ch_id` int(11) NOT NULL AUTO_INCREMENT,
  `ch_year` int(11) DEFAULT NULL,
  `ch_number` varchar(50) DEFAULT NULL,
  `zone_no` int(11) DEFAULT NULL,
  PRIMARY KEY (`ch_id`),
  KEY `zone_demploi_zone_no` (`zone_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

DROP TABLE IF EXISTS `commune`;
CREATE TABLE IF NOT EXISTS `commune` (
  `com_code` varchar(50) NOT NULL,
  `com_name` varchar(50) NOT NULL,
  `epci` varchar(50) NOT NULL,
  `arr_code` varchar(50) DEFAULT NULL,
  `zone_no` int(11) DEFAULT NULL,
  PRIMARY KEY (`com_code`),
  UNIQUE KEY `com_code_UNIQUE` (`com_code`),
  KEY `zone_demploi_zone_no` (`zone_no`),
  KEY `commune_ibfk_2` (`arr_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `deces`
--

DROP TABLE IF EXISTS `deces`;
CREATE TABLE IF NOT EXISTS `deces` (
  `deces_id` int(11) NOT NULL AUTO_INCREMENT,
  `deces_year` int(11) DEFAULT NULL,
  `deces_num` int(11) DEFAULT NULL,
  `deces_place` varchar(50) DEFAULT NULL,
  `com_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`deces_id`),
  KEY `commune_com_code` (`com_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `defm`
--

DROP TABLE IF EXISTS `defm`;
CREATE TABLE IF NOT EXISTS `defm` (
  `defm_id` int(11) NOT NULL AUTO_INCREMENT,
  `defm_year` int(11) DEFAULT NULL,
  `defm_num` int(11) DEFAULT NULL,
  `defmcat_id` int(11) DEFAULT NULL,
  `com_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`defm_id`),
  KEY `defmcat_fk_idx` (`defmcat_id`),
  KEY `defm_ibfk_1` (`com_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `defm_category`
--

DROP TABLE IF EXISTS `defm_category`;
CREATE TABLE IF NOT EXISTS `defm_category` (
  `defmcat_id` int(11) NOT NULL AUTO_INCREMENT,
  `defm_cat` varchar(10) NOT NULL,
  PRIMARY KEY (`defmcat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `dep_no` varchar(50) NOT NULL,
  `dep_name` varchar(50) NOT NULL,
  `dep_svg` varchar(50) NOT NULL,
  `reg_no` int(11) DEFAULT NULL,
  PRIMARY KEY (`dep_no`),
  KEY `region_reg_no` (`reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

DROP TABLE IF EXISTS `etablissement`;
CREATE TABLE IF NOT EXISTS `etablissement` (
  `etabl_id` int(11) NOT NULL AUTO_INCREMENT,
  `etabl_type` varchar(100) NOT NULL,
  PRIMARY KEY (`etabl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `etabl_activ`
--

DROP TABLE IF EXISTS `etabl_activ`;
CREATE TABLE IF NOT EXISTS `etabl_activ` (
  `ea_id` int(11) NOT NULL AUTO_INCREMENT,
  `ea_year` int(11) DEFAULT NULL,
  `ea_num` int(11) DEFAULT NULL,
  `etabl_id` int(11) DEFAULT NULL,
  `com_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ea_id`),
  KEY `etablissement_etabl_id` (`etabl_id`),
  KEY `etabl_activ_ibfk_2` (`com_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `logements`
--

DROP TABLE IF EXISTS `logements`;
CREATE TABLE IF NOT EXISTS `logements` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_year` int(11) DEFAULT NULL,
  `log_num` varchar(50) DEFAULT NULL,
  `com_code` varchar(50) DEFAULT NULL,
  `log_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`log_id`),
  KEY `fk_1_idx` (`com_code`),
  KEY `logements_ibfk_1` (`log_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `log_type`
--

DROP TABLE IF EXISTS `log_type`;
CREATE TABLE IF NOT EXISTS `log_type` (
  `log_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_name` varchar(50) NOT NULL,
  PRIMARY KEY (`log_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `menages`
--

DROP TABLE IF EXISTS `menages`;
CREATE TABLE IF NOT EXISTS `menages` (
  `menag_id` int(11) NOT NULL AUTO_INCREMENT,
  `menag_year` int(11) DEFAULT NULL,
  `menag_num` int(11) DEFAULT NULL,
  `com_code` varchar(50) DEFAULT NULL,
  `mt_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`menag_id`),
  KEY `com_name_fk_idx` (`com_code`),
  KEY `com_code_fk_idx` (`com_code`),
  KEY `menage_type_mt_id_idx` (`mt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `menage_type`
--

DROP TABLE IF EXISTS `menage_type`;
CREATE TABLE IF NOT EXISTS `menage_type` (
  `mt_id` int(11) NOT NULL AUTO_INCREMENT,
  `mt_name` varchar(60) NOT NULL,
  PRIMARY KEY (`mt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `naissance`
--

DROP TABLE IF EXISTS `naissance`;
CREATE TABLE IF NOT EXISTS `naissance` (
  `naiss_id` int(11) NOT NULL AUTO_INCREMENT,
  `naiss_year` int(11) DEFAULT NULL,
  `naiss_num` int(11) DEFAULT NULL,
  `naiss_place` varchar(50) DEFAULT NULL,
  `com_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`naiss_id`),
  KEY `commune_com_code` (`com_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `population`
--

DROP TABLE IF EXISTS `population`;
CREATE TABLE IF NOT EXISTS `population` (
  `pop_id` int(11) NOT NULL AUTO_INCREMENT,
  `ph_year` int(11) NOT NULL,
  `ph_num` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `pt_id` int(11) DEFAULT NULL,
  `com_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pop_id`),
  KEY `population_ibfk_1` (`cat_id`),
  KEY `population_ibfk_2` (`pt_id`),
  KEY `population_ibfk_3` (`com_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `pop_type`
--

DROP TABLE IF EXISTS `pop_type`;
CREATE TABLE IF NOT EXISTS `pop_type` (
  `pt_id` int(11) NOT NULL AUTO_INCREMENT,
  `pt_type` varchar(10) NOT NULL,
  PRIMARY KEY (`pt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `reg_no` int(11) NOT NULL,
  `reg_name` varchar(50) NOT NULL,
  `reg_svg` varchar(50) NOT NULL,
  PRIMARY KEY (`reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `revenue_fisc`
--

DROP TABLE IF EXISTS `revenue_fisc`;
CREATE TABLE IF NOT EXISTS `revenue_fisc` (
  `rf_id` int(11) NOT NULL AUTO_INCREMENT,
  `rf_year` int(11) NOT NULL,
  `nomb_men_fc` int(11) DEFAULT NULL,
  `nomb_pers_fc` varchar(50) DEFAULT NULL,
  `com_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`rf_id`),
  KEY `revenue_fisc_ibfk_1` (`com_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `travailleurs`
--

DROP TABLE IF EXISTS `travailleurs`;
CREATE TABLE IF NOT EXISTS `travailleurs` (
  `tr_id` int(11) NOT NULL AUTO_INCREMENT,
  `tr_year` int(11) DEFAULT NULL,
  `tr_number` int(11) DEFAULT NULL,
  `zone_no` int(11) DEFAULT NULL,
  `com_code` varchar(50) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`tr_id`),
  KEY `com_code` (`com_code`),
  KEY `travailleurs_ibfk_1` (`zone_no`),
  KEY `travailleurs_ibfk_3` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `zone_demploi`
--

DROP TABLE IF EXISTS `zone_demploi`;
CREATE TABLE IF NOT EXISTS `zone_demploi` (
  `zone_no` int(11) NOT NULL,
  `zone_name` varchar(50) NOT NULL,
  `emploi` int(11) NOT NULL,
  `taux_chomage` double DEFAULT NULL,
  PRIMARY KEY (`zone_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
