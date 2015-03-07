
drop table formation;
drop table diplome;
drop table revenue_fisc;
drop table travailleurs;
drop table chomage;
drop table population;
drop table pop_type;
drop table categorie_age;
drop table defm;
drop table defm_category;
drop table creation_ee;
drop table etabl_activ;
drop table etablissement;
drop table deces;
drop table naissance;
drop table menages;
drop table menage_type;
drop table logements;
drop table log_type;
drop table commune;
drop table zone_demploi;
drop table arrondissement;
drop table departement;
drop table region;

create table region(
reg_no int primary key not null,
reg_name varchar(50) not null
);

create table departement(
dep_no int primary key not null,
dep_name varchar(50) not null,
region_reg_no int,
FOREIGN KEY (region_reg_no) REFERENCES region(reg_no)
);

create table arrondissement(
arr_code int primary key not null,
arr_name varchar(50) not null,
departement_dep_no int,
FOREIGN KEY (departement_dep_no) REFERENCES departement(dep_no)
);

create table zone_demploi(
zone_no int primary key not null,
zone_name varchar(50) not null,
emploi int not null,
taux_chomage double
);

create table commune(
com_code int primary key not null,
com_name varchar(50) not null,
epci int not null,
arrondissement_arr_code int,
FOREIGN KEY (arrondissement_arr_code) REFERENCES arrondissement(arr_code),
zone_demploi_zone_no int,
FOREIGN KEY (zone_demploi_zone_no) REFERENCES  zone_demploi(zone_no)
);

create table log_type(
log_type_id int primary key not null,
log_name varchar(50) not null
);

create table logements(
log_id int primary key not null,
log_year int,
log_num int,
commune_com_code int,
FOREIGN KEY (commune_com_code) REFERENCES commune(com_code),
log_type_log_type_id int,
FOREIGN KEY (log_type_log_type_id) REFERENCES  log_type(log_type_id)
);

create table menage_type(
mt_id int primary key not null,
mt_name varchar(30) not null
);

create table menages(
menag_id int primary key not null,
menag_year int,
commune_com_code int,
FOREIGN KEY (commune_com_code) REFERENCES commune(com_code),
menage_type_mt_name int,
FOREIGN KEY (menage_type_mt_name) REFERENCES  menage_type(mt_id)
);

create table naissance(
naiss_id int primary key not null,
naiss_year int,
naiss_num int,
naiss_place varchar(50),
commune_com_code int,
FOREIGN KEY (commune_com_code) REFERENCES commune(com_code)
);

create table deces(
deces_id int primary key not null,
deces_year int,
deces_num int,
deces_place varchar(50),
commune_com_code int,
FOREIGN KEY (commune_com_code) REFERENCES commune(com_code)
);

create table etablissement(
etabl_id int primary key not null,
etabl_type varchar(50) not null
);

create table etabl_activ(
ea_id int primary key not null,
ea_year int,
ea_num int,
etablissement_etabl_id int,
FOREIGN KEY (etablissement_etabl_id) REFERENCES etablissement(etabl_id),
commune_com_code int,
FOREIGN KEY (commune_com_code) REFERENCES commune(com_code)
);

create table creation_ee( -- creation d'etabl et d'entreprises
cr_ee_id int primary key not null,
creat_year int,
etablissement_etabl_id int,
FOREIGN KEY (etablissement_etabl_id) REFERENCES etablissement(etabl_id),
commune_com_code int,
FOREIGN KEY (commune_com_code) REFERENCES commune(com_code)
);

create table defm_category(
defmcat_id int primary key not null,
defm_cat varchar(3) not null
);

create table defm(
defm_id int primary key not null,
defm_category_defmcat_id int,
FOREIGN KEY (defm_category_defmcat_id) REFERENCES defm_category(defmcat_id),
commune_com_code int,
FOREIGN KEY (commune_com_code) REFERENCES commune(com_code)
);

create table categorie_age(
cat_id int primary key not null,
cat_type varchar(10) not null
);

create table pop_type(
pt_id int primary key not null,
pt_type varchar(10) not null
);

create table population(
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

create table chomage(
ch_id int primary key not null,
ch_year int,
ch_number int,
zone_demploi_zone_no int,
FOREIGN KEY (zone_demploi_zone_no) REFERENCES  zone_demploi(zone_no)
);

create table travailleurs(
tr_id int primary key not null,
tr_year int,
tr_number int,
zone_demploi_zone_no int,
FOREIGN KEY (zone_demploi_zone_no) REFERENCES  zone_demploi(zone_no),
categorie_age_cat_id int,
FOREIGN KEY (categorie_age_cat_id) REFERENCES categorie_age(cat_id)
);

create table revenue_fisc(
rf_id int primary key not null,
rf_year int not null,
nomb_men_fc int, -- nombre de menages fiscaux
nomb_pers_fc int, -- nombre personnes des ménages fiscaux
commune_com_code int,
FOREIGN KEY (commune_com_code) REFERENCES commune(com_code)
);

create table diplome(
dipl_id int primary key not null,
dipl_type varchar(20)
);

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

