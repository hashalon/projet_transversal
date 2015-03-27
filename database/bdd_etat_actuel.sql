-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 27 Mars 2015 à 16:52
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

-- --------------------------------------------------------

--
-- Structure de la table `arrondissement`
--

CREATE TABLE IF NOT EXISTS `arrondissement` (
  `arr_code` varchar(50) NOT NULL,
  `arr_name` varchar(50) NOT NULL,
  `arr_svg` varchar (50) NOT NULL,
  `departement_dep_no` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`arr_code`),
  KEY `test_department_dep_no` (`departement_dep_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_age`
--

CREATE TABLE IF NOT EXISTS `categorie_age` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_type` varchar(10) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Structure de la table `chomage`
--

CREATE TABLE IF NOT EXISTS `chomage` (
  `ch_id` int(11) NOT NULL AUTO_INCREMENT,
  `ch_year` int(11) DEFAULT NULL,
  `ch_number` varchar(50) DEFAULT NULL,
  `zone_demploi_zone_no` int(11) DEFAULT NULL,
  PRIMARY KEY (`ch_id`),
  KEY `zone_demploi_zone_no` (`zone_demploi_zone_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5415 ;

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE IF NOT EXISTS `commune` (
  `com_code` varchar(50) NOT NULL,
  `com_name` varchar(50) NOT NULL,
  `epci` varchar(50) NOT NULL,
  `arrondissement_arr_code` varchar(50) DEFAULT NULL,
  `zone_demploi_zone_no` int(11) DEFAULT NULL,
  UNIQUE KEY `com_code_UNIQUE` (`com_code`),
  KEY `zone_demploi_zone_no` (`zone_demploi_zone_no`),
  KEY `commune_ibfk_2` (`arrondissement_arr_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `deces`
--

CREATE TABLE IF NOT EXISTS `deces` (
  `deces_id` int(11) NOT NULL AUTO_INCREMENT,
  `deces_year` int(11) DEFAULT NULL,
  `deces_num` int(11) DEFAULT NULL,
  `deces_place` varchar(50) DEFAULT NULL,
  `commune_com_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`deces_id`),
  KEY `commune_com_code` (`commune_com_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=697478 ;

-- --------------------------------------------------------

--
-- Structure de la table `defm`
--

CREATE TABLE IF NOT EXISTS `defm` (
  `defm_id` int(11) NOT NULL AUTO_INCREMENT,
  `defm_year` int(11) DEFAULT NULL,
  `defm_num` int(11) DEFAULT NULL,
  `defm_category_defmcat_id` int(11) DEFAULT NULL,
  `commune_com_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`defm_id`),
  KEY `defmcat_fk_idx` (`defm_category_defmcat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=823113 ;

-- --------------------------------------------------------

--
-- Structure de la table `defm_category`
--

CREATE TABLE IF NOT EXISTS `defm_category` (
  `defmcat_id` int(11) NOT NULL AUTO_INCREMENT,
  `defm_cat` varchar(10) NOT NULL,
  PRIMARY KEY (`defmcat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE IF NOT EXISTS `departement` (
  `dep_no` varchar(50) NOT NULL,
  `dep_name` varchar(50) NOT NULL,
  `dep_svg` varchar(50) NOT NULL,
  `region_reg_no` int(11) DEFAULT NULL,
  PRIMARY KEY (`dep_no`),
  KEY `region_reg_no` (`region_reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE IF NOT EXISTS `etablissement` (
  `etabl_id` int(11) NOT NULL AUTO_INCREMENT,
  `etabl_type` varchar(100) NOT NULL,
  PRIMARY KEY (`etabl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Structure de la table `etabl_activ`
--

CREATE TABLE IF NOT EXISTS `etabl_activ` (
  `ea_id` int(11) NOT NULL AUTO_INCREMENT,
  `ea_year` int(11) DEFAULT NULL,
  `ea_num` int(11) DEFAULT NULL,
  `etablissement_etabl_id` int(11) DEFAULT NULL,
  `commune_com_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ea_id`),
  KEY `etablissement_etabl_id` (`etablissement_etabl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=364359 ;

-- --------------------------------------------------------

--
-- Structure de la table `logements`
--

CREATE TABLE IF NOT EXISTS `logements` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_year` int(11) DEFAULT NULL,
  `log_num` varchar(50) DEFAULT NULL,
  `commune_com_code` varchar(50) DEFAULT NULL,
  `log_type_log_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`log_id`),
  KEY `fk_1_idx` (`commune_com_code`),
  KEY `log_type_fk_idx` (`log_type_log_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=665364 ;

-- --------------------------------------------------------

--
-- Structure de la table `log_type`
--

CREATE TABLE IF NOT EXISTS `log_type` (
  `log_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_name` varchar(50) NOT NULL,
  PRIMARY KEY (`log_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Structure de la table `menages`
--

CREATE TABLE IF NOT EXISTS `menages` (
  `menag_id` int(11) NOT NULL AUTO_INCREMENT,
  `menag_year` int(11) DEFAULT NULL,
  `menag_num` int(11) DEFAULT NULL,
  `commune_com_code` varchar(50) DEFAULT NULL,
  `menage_type_mt_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`menag_id`),
  KEY `com_name_fk_idx` (`commune_com_code`),
  KEY `com_code_fk_idx` (`commune_com_code`),
  KEY `menage_type_mt_id_idx` (`menage_type_mt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1160015 ;

-- --------------------------------------------------------

--
-- Structure de la table `menage_type`
--

CREATE TABLE IF NOT EXISTS `menage_type` (
  `mt_id` int(11) NOT NULL AUTO_INCREMENT,
  `mt_name` varchar(60) NOT NULL,
  PRIMARY KEY (`mt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Structure de la table `naissance`
--

CREATE TABLE IF NOT EXISTS `naissance` (
  `naiss_id` int(11) NOT NULL AUTO_INCREMENT,
  `naiss_year` int(11) DEFAULT NULL,
  `naiss_num` int(11) DEFAULT NULL,
  `naiss_place` varchar(50) DEFAULT NULL,
  `commune_com_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`naiss_id`),
  KEY `commune_com_code` (`commune_com_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=697478 ;

-- --------------------------------------------------------

--
-- Structure de la table `population`
--

CREATE TABLE IF NOT EXISTS `population` (
  `pop_id` int(11) NOT NULL AUTO_INCREMENT,
  `ph_year` int(11) NOT NULL,
  `ph_num` int(11) NOT NULL,
  `categorie_age_cat_id` int(11) DEFAULT NULL,
  `pop_type_pt_id` int(11) DEFAULT NULL,
  `commune_com_code` int(11) DEFAULT NULL,
  PRIMARY KEY (`pop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2133809 ;

-- --------------------------------------------------------

--
-- Structure de la table `pop_type`
--

CREATE TABLE IF NOT EXISTS `pop_type` (
  `pt_id` int(11) NOT NULL AUTO_INCREMENT,
  `pt_type` varchar(10) NOT NULL,
  PRIMARY KEY (`pt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `reg_no` int(11) NOT NULL,
  `reg_name` varchar(50) NOT NULL,
  `reg_svg` varchar (50) NOT NULL,
  PRIMARY KEY (`reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------


--
-- Structure de la table `zone_demploi`
--

CREATE TABLE IF NOT EXISTS `zone_demploi` (
  `zone_no` int(11) NOT NULL,
  `zone_name` varchar(50) NOT NULL,
  `emploi` int(11) NOT NULL,
  `taux_chomage` double DEFAULT NULL,
  PRIMARY KEY (`zone_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `arrondissement`
--
ALTER TABLE `arrondissement`
  ADD CONSTRAINT `arrondissement_ibfk_1` FOREIGN KEY (`departement_dep_no`) REFERENCES `departement` (`dep_no`);

--
-- Contraintes pour la table `chomage`
--
ALTER TABLE `chomage`
  ADD CONSTRAINT `chomage_ibfk_1` FOREIGN KEY (`zone_demploi_zone_no`) REFERENCES `zone_demploi` (`zone_no`);

--
-- Contraintes pour la table `commune`
--
ALTER TABLE `commune`
  ADD CONSTRAINT `commune_ibfk_1` FOREIGN KEY (`zone_demploi_zone_no`) REFERENCES `zone_demploi` (`zone_no`),
  ADD CONSTRAINT `commune_ibfk_2` FOREIGN KEY (`arrondissement_arr_code`) REFERENCES `arrondissement` (`arr_code`);

--
-- Contraintes pour la table `deces`
--
ALTER TABLE `deces`
  ADD CONSTRAINT `deces_ibfk_1` FOREIGN KEY (`commune_com_code`) REFERENCES `commune` (`com_code`);

--
-- Contraintes pour la table `departement`
--
ALTER TABLE `departement`
  ADD CONSTRAINT `departement_ibfk_1` FOREIGN KEY (`region_reg_no`) REFERENCES `region` (`reg_no`);

--
-- Contraintes pour la table `etabl_activ`
--
ALTER TABLE `etabl_activ`
  ADD CONSTRAINT `etabl_activ_ibfk_1` FOREIGN KEY (`etablissement_etabl_id`) REFERENCES `etablissement` (`etabl_id`);

--
-- Contraintes pour la table `logements`
--
ALTER TABLE `logements`
  ADD CONSTRAINT `logements_ibfk_1` FOREIGN KEY (`log_type_log_type_id`) REFERENCES `log_type` (`log_type_id`),
  ADD CONSTRAINT `log_type_fk` FOREIGN KEY (`log_type_log_type_id`) REFERENCES `log_type` (`log_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `menages`
--
ALTER TABLE `menages`
  ADD CONSTRAINT `menages_ibfk_1` FOREIGN KEY (`menage_type_mt_id`) REFERENCES `menage_type` (`mt_id`),
  ADD CONSTRAINT `menages_ibfk_2` FOREIGN KEY (`commune_com_code`) REFERENCES `commune` (`com_code`);

--
-- Contraintes pour la table `naissance`
--
ALTER TABLE `naissance`
  ADD CONSTRAINT `naissance_ibfk_1` FOREIGN KEY (`commune_com_code`) REFERENCES `commune` (`com_code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- En plus des tables plus haut, y a encore celles-là qui sont vides là tout de suite comme je viens de te dire sur Skype

-- La table travailleurs

create table travailleurs(
tr_id int primary key not null,
tr_year int,
tr_number int,
zone_demploi_zone_no int,
FOREIGN KEY (zone_demploi_zone_no) REFERENCES  zone_demploi(zone_no),
categorie_age_cat_id int,	
FOREIGN KEY (categorie_age_cat_id) REFERENCES categorie_age(cat_id)
);

-- La table revenue_fisc
create table revenue_fisc(
rf_id int primary key not null,
rf_year int not null,
nomb_men_fc int, -- nombre de menages fiscaux
nomb_pers_fc int, -- nombre personnes des ménages fiscaux
commune_com_code int,
FOREIGN KEY (commune_com_code) REFERENCES commune(com_code)
);

-- La table diplome 
create table diplome(
dipl_id int primary key not null,
dipl_type varchar(20)
);

-- Et la table formation
create table formation(		-- par departement
form_id int primary key not null,
dipl_year int,
diplome_dipl_id int,
FOREIGN KEY (diplome_dipl_id) REFERENCES diplome(dipl_id),
categorie_age_cat_id int,
FOREIGN KEY (categorie_age_cat_id) REFERENCES categorie_age(cat_id),
pop_type_pt_id int,
FOREIGN KEY (pop_type_pt_id) REFERENCES pop_type(pt_id)
);