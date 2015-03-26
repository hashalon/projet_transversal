CREATE DATABASE IF NOT EXISTS dynamismeFR;
use dynamismeFR;

SET FOREIGN_KEY_CHECKS = 0;

drop table if exists formation;
drop table if exists diplome;
drop table if exists revenue_fisc;
drop table if exists travailleurs;
drop table if exists chomage;
drop table if exists population;
drop table if exists pop_type;
drop table if exists categorie_age;
drop table if exists defm;
drop table if exists defm_category;
drop table if exists creation_ee;
drop table if exists etabl_activ;
drop table if exists etablissement;
drop table if exists deces;
drop table if exists naissance;
drop table if exists menages;
drop table if exists menage_type;
drop table if exists logements;
drop table if exists log_type;
drop table if exists commune;
drop table if exists zone_demploi;
drop table if exists arrondissement;
drop table if exists departement;
drop table if exists region;

create table if not exists region(
    reg_no int primary key not null,
    reg_name varchar(50) not null
);

create table if not exists departement(
    dep_no int primary key not null,
    dep_name varchar(50) not null,
    region_reg_no int,
    FOREIGN KEY (region_reg_no) REFERENCES region(reg_no)
);

create table if not exists arrondissement(
    arr_code int primary key not null,
    arr_name varchar(50) not null,
    departement_dep_no int,
    FOREIGN KEY (departement_dep_no) REFERENCES departement(dep_no)
);

create table if not exists zone_demploi(
    zone_no int primary key not null,
    zone_name varchar(50) not null,
    emploi int not null,
    taux_chomage double
);

create table if not exists commune(
    com_code int primary key not null,
    com_name varchar(50) not null,
    epci int not null,
    arrondissement_arr_code int,
    FOREIGN KEY (arrondissement_arr_code) REFERENCES arrondissement(arr_code),
    zone_demploi_zone_no int,
    FOREIGN KEY (zone_demploi_zone_no) REFERENCES  zone_demploi(zone_no)
);

create table if not exists log_type(
    log_type_id int primary key not null,
    log_name varchar(50) not null
);

create table if not exists logements(
    log_id int primary key not null,
    log_year int,
    log_num int,
    commune_com_code int,
    FOREIGN KEY (commune_com_code) REFERENCES commune(com_code),
    log_type_log_type_id int,
    FOREIGN KEY (log_type_log_type_id) REFERENCES  log_type(log_type_id)
);

create table if not exists menage_type(
    mt_id int primary key not null,
    mt_name varchar(30) not null
);

create table if not exists menages(
    menag_id int primary key not null,
    menag_year int,
    commune_com_code int,
    FOREIGN KEY (commune_com_code) REFERENCES commune(com_code),
    menage_type_mt_name int,
    FOREIGN KEY (menage_type_mt_name) REFERENCES  menage_type(mt_id)
);

create table if not exists naissance(
    naiss_id int primary key not null,
    naiss_year int,
    naiss_num int,
    naiss_place varchar(50),
    commune_com_code int,
    FOREIGN KEY (commune_com_code) REFERENCES commune(com_code)
);

create table if not exists deces(
    deces_id int primary key not null,
    deces_year int,
    deces_num int,
    deces_place varchar(50),
    commune_com_code int,
    FOREIGN KEY (commune_com_code) REFERENCES commune(com_code)
);

create table if not exists etablissement(
    etabl_id int primary key not null,
    etabl_type varchar(50) not null
);

create table if not exists etabl_activ(
    ea_id int primary key not null,
    ea_year int,
    ea_num int,
    etablissement_etabl_id int,
    FOREIGN KEY (etablissement_etabl_id) REFERENCES etablissement(etabl_id),
    commune_com_code int,
    FOREIGN KEY (commune_com_code) REFERENCES commune(com_code)
);

create table if not exists creation_ee( -- creation d'etabl et d'entreprises
    cr_ee_id int primary key not null,
    creat_year int,
    etablissement_etabl_id int,
    FOREIGN KEY (etablissement_etabl_id) REFERENCES etablissement(etabl_id),
    commune_com_code int,
    FOREIGN KEY (commune_com_code) REFERENCES commune(com_code)
);

create table if not exists defm_category(
    defmcat_id int primary key not null,
    defm_cat varchar(3) not null
);

create table if not exists defm(
    defm_id int primary key not null,
    defm_category_defmcat_id int,
    FOREIGN KEY (defm_category_defmcat_id) REFERENCES defm_category(defmcat_id),
    commune_com_code int,
    FOREIGN KEY (commune_com_code) REFERENCES commune(com_code)
);

create table if not exists categorie_age(
    cat_id int primary key not null,
    cat_type varchar(10) not null
);

create table if not exists pop_type(
    pt_id int primary key not null,
    pt_type varchar(10) not null
);

create table if not exists population(
    pop_id int primary key not null,
    ph_year int not null,
    ph_num int not null,
    categorie_age_cat_id int,
    FOREIGN KEY (categorie_age_cat_id) REFERENCES categorie_age(cat_id),
    pop_type_pt_id int,
    FOREIGN KEY (pop_type_pt_id) REFERENCES pop_type(pt_id),
    commune_com_code int,
    FOREIGN KEY (commune_com_code) REFERENCES commune(com_code)
);

create table if not exists chomage(
    ch_id int primary key not null,
    ch_year int,
    ch_number int,
    zone_demploi_zone_no int,
    FOREIGN KEY (zone_demploi_zone_no) REFERENCES  zone_demploi(zone_no)
);

create table if not exists travailleurs(
    tr_id int primary key not null,
    tr_year int,
    tr_number int,
    zone_demploi_zone_no int,
    FOREIGN KEY (zone_demploi_zone_no) REFERENCES  zone_demploi(zone_no),
    categorie_age_cat_id int,
    FOREIGN KEY (categorie_age_cat_id) REFERENCES categorie_age(cat_id)
);

create table if not exists revenue_fisc(
    rf_id int primary key not null,
    rf_year int not null,
    nomb_men_fc int, -- nombre de menages fiscaux
    nomb_pers_fc int, -- nombre personnes des ménages fiscaux
    commune_com_code int,
    FOREIGN KEY (commune_com_code) REFERENCES commune(com_code)
);

create table if not exists diplome(
    dipl_id int primary key not null,
    dipl_type varchar(20)
);

create table if not exists formation( -- par departement
    form_id int primary key not null,
    dipl_year int,
    diplome_dipl_id int,
    FOREIGN KEY (diplome_dipl_id) REFERENCES diplome(dipl_id),
    categorie_age_cat_id int,
    FOREIGN KEY (categorie_age_cat_id) REFERENCES categorie_age(cat_id),
    pop_type_pt_id int,
    FOREIGN KEY (pop_type_pt_id) REFERENCES pop_type(pt_id)
);

SET FOREIGN_KEY_CHECKS = 1;