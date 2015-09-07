-- FICHIER : commun_table-lancer-en-premier.sql --
CREATE TABLE matters
(
	id SERIAL PRIMARY KEY,
	title VARCHAR
);

CREATE TABLE trainee_status
(
	id SERIAL PRIMARY KEY,
	title VARCHAR
);

CREATE TABLE study_levels
(
	id SERIAL PRIMARY KEY,
	wording VARCHAR
);

CREATE TABLE family_status
(
	id SERIAL PRIMARY KEY,
	title VARCHAR
);

CREATE TABLE nationalities
(
	id SERIAL PRIMARY KEY,
	title VARCHAR
);

CREATE TABLE remuneration_types
(
	id SERIAL PRIMARY KEY,
	title VARCHAR
);

-- FICHIER : formations.sql --
CREATE TABLE formations	
(
	id SERIAL PRIMARY KEY, 
	title VARCHAR NOT NULL,
	average_effective INT, -- nombre d'élève par formation
	convention_hour_center TIME NOT NULL, -- nombre d'heures conventionnées en centre
	convention_hour_compagny TIME NOT NULL, --nombre d'heures conventionnées en entreprise 
	deal_code VARCHAR NOT NULL, -- code de marché 
	order_giver VARCHAR, -- donneur d'ordre
	deal_begin_date DATE NOT NULL, -- date début du marché
	deal_ending_date DATE NOT NULL -- date fin de marché
);

CREATE TABLE formation_sessions
(
	id SERIAL PRIMARY KEY, 
	formations_id INT,
	begin_date DATE NOT NULL, -- date début d'une session de formation
	ending_date DATE NOT NULL, -- date fin de sesion de formation
	FOREIGN KEY (formations_id) REFERENCES formations(id)
);

CREATE TABLE ref_pedagos
(
	id SERIAL, 
	formations_id INT,
	matters_id INT,  -- code matiere
	PRIMARY KEY (formations_id, matters_id),
	FOREIGN KEY (formations_id) REFERENCES formations(id),
	FOREIGN KEY (matters_id) REFERENCES matters(id)
);

-- FICHIER : etudiant.sql --
CREATE TABLE trainees 
(
	id SERIAL PRIMARY KEY,
	civility VARCHAR NOT NULL,
	name VARCHAR NOT NULL,
	firstname VARCHAR NOT NULL,
	birthday DATE NOT NULL,
	birthdayplace VARCHAR NOT NULL,
	gender VARCHAR NOT NULL,
	adress_off_street VARCHAR NOT NULL,
	adress_off_complement VARCHAR NOT NULL,
	adress_off_codpost VARCHAR NOT NULL,
	adress_off_city VARCHAR NOT NULL,
	adress_form_street VARCHAR,
	adress_form_complement VARCHAR,
	adress_form_codpost VARCHAR,
	adress_form_city VARCHAR,
	phone VARCHAR NOT NULL,
	mail VARCHAR NOT NULL,
	cellphone VARCHAR NOT NULL,
	social_security_number VARCHAR NOT NULL,
	photo VARCHAR,
	remuneration_type_id INTEGER NOT NULL,
	FOREIGN KEY (remuneration_type_id) REFERENCES remuneration_types(id),
	status_trainee_id INTEGER NOT NULL,
	FOREIGN KEY (status_trainee_id) REFERENCES trainee_status(id),
	study_levels_id INTEGER NOT NULL,
	FOREIGN KEY (study_levels_id) REFERENCES study_levels(id),
	family_status_id INTEGER NOT NULL,
	FOREIGN KEY (family_status_id) REFERENCES family_status(id),
	nationality_id INTEGER NOT NULL,
	FOREIGN KEY (nationality_id) REFERENCES nationalities(id)
); 

CREATE TABLE sessions_trainee 
(
	id SERIAL PRIMARY KEY,
	session_id INTEGER NOT NULL,
	FOREIGN KEY (session_id) REFERENCES formation_sessions(id),
	trainee_id INTEGER NOT NULL,
	FOREIGN KEY (trainee_id) REFERENCES trainees(id),
	nb_hour_present_school INTEGER NOT NULL,
	nb_hour_present_trainer INTEGER NOT NULL	
);

-- FICHIER : entreprises.sql --
/**
Table des entreprises
 */

CREATE TABLE companies 
(
	id SERIAL PRIMARY KEY,
	name VARCHAR(120) UNIQUE NOT NULL,        -- nom de l'entreprise
	status VARCHAR(120) NOT NULL,             -- raison sociale
	company_name VARCHAR(120) DEFAULT NULL,   -- nom commercial
	address VARCHAR(250) NOT NULL,
	postal_code VARCHAR(6) DEFAULT NULL,
	city VARCHAR(60) NOT NULL,
	country VARCHAR(60) NOT NULL,
	phone VARCHAR(15) NOT NULL,
	mobile VARCHAR(15) DEFAULT NULL,
	fax VARCHAR(15) DEFAULT NULL,
	manager VARCHAR(60) DEFAULT NULL,
	visit_date DATE DEFAULT NULL
);

/**
Table des stages
 */

CREATE TABLE internships 
(
	id SERIAL PRIMARY KEY,
	title VARCHAR(120) NOT NULL,
	explain TEXT DEFAULT NULL,
	company_id INT NOT NULL,
	formation_id INT NOT NULL,
	referent_id VARCHAR(60) NOT NULL,
	pay BOOLEAN DEFAULT(false),
	wage NUMERIC DEFAULT(0)
);

/**
Table de liaison entre les entreprises, les stagiaires et les stages
 */

CREATE TABLE company_internship
(
	id SERIAL PRIMARY KEY,
	trainee_id INT NOT NULL,
	company_id INT NOT NULL,
	internship_id INT NOT NULL,
	hiring BOOLEAN DEFAULT(false),
	total_hours INT NOT NULL DEFAULT(0),
	date_begin TIMESTAMP DEFAULT(NOW()),
	date_end TIMESTAMP CHECK(date_end >= date_begin) DEFAULT(NOW())
);

-- FICHIER : formateurs.sql --
-- Création de la table formateur --
CREATE TABLE trainers
(
	id SERIAL PRIMARY KEY,
	further_informations TEXT,
	study_levels_id INT,
	name VARCHAR NOT NULL,
	firstname VARCHAR NOT NULL,
	birthday DATE NOT NULL,
	birthdayplace VARCHAR NOT NULL,
	gender VARCHAR NOT NULL,
	address_off_street VARCHAR NOT NULL,
	address_off_complement VARCHAR NOT NULL,
	address_off_codpost VARCHAR NOT NULL,
	address_off_city VARCHAR NOT NULL,
	address_form_street VARCHAR,
	address_form_complement VARCHAR,
	address_form_codpost VARCHAR,
	address_form_city VARCHAR,
	phone VARCHAR,
	mail VARCHAR NOT NULL,
	cellphone VARCHAR,
	social_security_number VARCHAR NOT NULL,
	photo VARCHAR,
	family_status_id INTEGER,
	nationality_id INTEGER,
	hourly_rate FLOAT,
	trainer_extern BOOLEAN DEFAULT(false)
);

/* Création de la table d'association entre formateur et matière */
CREATE TABLE levels
(
	id SERIAL PRIMARY KEY,
	note INT NOT NULL DEFAULT(0),
	appreciation TEXT,
	matter_id INT,
	trainer_id INT
);

/* Création de la table d'association entre formateur et session_formation */
CREATE TABLE timesheets
(
	id SERIAL PRIMARY KEY,
	month INT NOT NULL,
	year INT NOT NULL,
	total_hours INT NOT NULL DEFAULT(0),
	trainer_id INT,
	formation_session_id INT
	
);

-- FICHIER : commun-a-lancer-en-dernier.sql --
ALTER TABLE trainers
ADD COLUMN create_date TIMESTAMP DEFAULT(NOW()),
ADD COLUMN update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN DEFAULT TRUE;

ALTER TABLE timesheets
ADD COLUMN create_date TIMESTAMP DEFAULT(NOW()),
ADD COLUMN update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN DEFAULT TRUE;

ALTER TABLE formations
ADD COLUMN create_date TIMESTAMP DEFAULT(NOW()),
ADD COLUMN update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN DEFAULT TRUE;

ALTER TABLE trainees
ADD COLUMN create_date TIMESTAMP DEFAULT(NOW()),
ADD COLUMN update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN DEFAULT TRUE;

ALTER TABLE matters
ADD COLUMN create_date TIMESTAMP DEFAULT(NOW()),
ADD COLUMN update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN DEFAULT TRUE;

ALTER TABLE trainee_status
ADD COLUMN create_date TIMESTAMP DEFAULT(NOW()),
ADD COLUMN update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN DEFAULT TRUE;

ALTER TABLE study_levels
ADD COLUMN create_date TIMESTAMP DEFAULT(NOW()),
ADD COLUMN update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN DEFAULT TRUE;

ALTER TABLE family_status
ADD COLUMN create_date TIMESTAMP DEFAULT(NOW()),
ADD COLUMN update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN DEFAULT TRUE;

ALTER TABLE nationalities
ADD COLUMN create_date TIMESTAMP DEFAULT(NOW()),
ADD COLUMN update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN DEFAULT TRUE;

ALTER TABLE remuneration_types
ADD COLUMN create_date TIMESTAMP DEFAULT(NOW()),
ADD COLUMN update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN DEFAULT TRUE;

ALTER TABLE formation_sessions
ADD COLUMN create_date TIMESTAMP DEFAULT(NOW()),
ADD COLUMN update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN DEFAULT TRUE;

ALTER TABLE ref_pedagos
ADD COLUMN create_date TIMESTAMP DEFAULT(NOW()),
ADD COLUMN update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN DEFAULT TRUE;

ALTER TABLE sessions_trainee
ADD COLUMN create_date TIMESTAMP DEFAULT(NOW()),
ADD COLUMN update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN DEFAULT TRUE;

ALTER TABLE companies
ADD COLUMN create_date TIMESTAMP DEFAULT(NOW()),
ADD COLUMN update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN DEFAULT TRUE;

ALTER TABLE internships
ADD COLUMN create_date TIMESTAMP DEFAULT(NOW()),
ADD COLUMN update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN DEFAULT TRUE;

ALTER TABLE company_internship
ADD COLUMN create_date TIMESTAMP DEFAULT(NOW()),
ADD COLUMN update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN DEFAULT TRUE;

ALTER TABLE levels
ADD COLUMN create_date TIMESTAMP DEFAULT(NOW()),
ADD COLUMN update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN DEFAULT TRUE;

-- FOREIGN KEY (qui ne sont pas déjà présentes plus haut) --
ALTER TABLE internships ADD FOREIGN KEY (company_id) REFERENCES companies(id);
ALTER TABLE internships ADD FOREIGN KEY (formation_id) REFERENCES formations(id);
ALTER TABLE company_internship ADD FOREIGN KEY (trainee_id) REFERENCES trainees(id);

-- Mise en place des clées étrangères --
ALTER TABLE levels ADD CONSTRAINT fk_matters_levels FOREIGN KEY (matter_id) REFERENCES matters(id);
ALTER TABLE levels ADD CONSTRAINT fk_trainers_levels FOREIGN KEY (trainer_id) REFERENCES trainers(id);
ALTER TABLE timesheets ADD CONSTRAINT fk_formations_sessions_timesheets FOREIGN KEY (formation_session_id) REFERENCES formation_sessions(id);
ALTER TABLE trainers ADD CONSTRAINT fk_study_levels_trainers FOREIGN KEY (study_levels_id) REFERENCES study_levels(id);
ALTER TABLE trainers ADD CONSTRAINT fk_family_status_trainers FOREIGN KEY (family_status_id) REFERENCES family_status(id);
ALTER TABLE trainers ADD CONSTRAINT fk_nationality_trainers FOREIGN KEY (nationality_id) REFERENCES nationalities(id);

CREATE TABLE profile
(
	id SERIAL PRIMARY KEY,
	firstname VARCHAR,
	lastname VARCHAR,
	email VARCHAR UNIQUE,
	phone INTEGER,
	password VARCHAR,
	salt VARCHAR,
	session_key VARCHAR,
	role_id INTEGER
);

CREATE TABLE role
(
	id SERIAL PRIMARY KEY,
	name VARCHAR
);

ALTER TABLE role
ADD COLUMN create_date TIMESTAMP DEFAULT(NOW()),
ADD COLUMN update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN DEFAULT TRUE;

ALTER TABLE profile
ADD COLUMN create_date TIMESTAMP DEFAULT(NOW()),
ADD COLUMN update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN DEFAULT TRUE;

ALTER TABLE profile ADD FOREIGN KEY (role_id) REFERENCES role(id);


ALTER SEQUENCE companies_id_seq RESTART WITH 1;
ALTER SEQUENCE internships_id_seq RESTART WITH 1;
ALTER SEQUENCE formations_id_seq RESTART WITH 1;
ALTER SEQUENCE matters_id_seq RESTART WITH 1;
ALTER SEQUENCE remuneration_types_id_seq RESTART WITH 1;
ALTER SEQUENCE trainee_status_id_seq RESTART WITH 1;
ALTER SEQUENCE study_levels_id_seq RESTART WITH 1;
ALTER SEQUENCE family_status_id_seq RESTART WITH 1;
ALTER SEQUENCE ref_pedagos_id_seq RESTART WITH 1;
ALTER SEQUENCE nationalities_id_seq RESTART WITH 1;
ALTER SEQUENCE formation_sessions_id_seq RESTART WITH 1;
ALTER SEQUENCE trainees_id_seq RESTART WITH 1;
ALTER SEQUENCE sessions_trainee_id_seq RESTART WITH 1;
ALTER SEQUENCE levels_id_seq RESTART WITH 1;
ALTER SEQUENCE timesheets_id_seq RESTART WITH 1;
ALTER SEQUENCE company_internship_id_seq RESTART WITH 1;
ALTER SEQUENCE trainers_id_seq RESTART WITH 1;

-- Insertion pour les entreprises
INSERT INTO companies(name, status, company_name, address, postal_code, city, country, phone, mobile, manager, create_uid) VALUES ('Entreprise 0', 'SARL 0', 'Ma compagnie 0', '0 rue des fleuristes', '66000', 'Perpignan', 'France', '0734987670', '0909090900', '1', '1');

INSERT INTO companies(name, status, company_name, address, postal_code, city, country, phone, mobile, manager, create_uid) VALUES ('Entreprise 1', 'SARL 1', 'Ma compagnie 1', '1 rue des fleuristes', '66000', 'Perpignan', 'France', '0734987671', '0909090901', '1', '1');

INSERT INTO companies(name, status, company_name, address, postal_code, city, country, phone, mobile, manager, create_uid) VALUES ('Entreprise 2', 'SARL 2', 'Ma compagnie 2', '2 rue des fleuristes', '66000', 'Perpignan', 'France', '0734987672', '0909090902', '1', '1');

INSERT INTO companies(name, status, company_name, address, postal_code, city, country, phone, mobile, manager, create_uid) VALUES ('Entreprise 3', 'SARL 3', 'Ma compagnie 3', '3 rue des fleuristes', '66000', 'Perpignan', 'France', '0734987673', '0909090903', '1', '1');

INSERT INTO companies(name, status, company_name, address, postal_code, city, country, phone, mobile, manager, create_uid) VALUES ('Entreprise 4', 'SARL 4', 'Ma compagnie 4', '4 rue des fleuristes', '66000', 'Perpignan', 'France', '0734987674', '0909090904', '1', '1');

-- pas de champ TIME pour un chiffre bordel de merde !!!!
ALTER TABLE formations DROP convention_hour_center;
ALTER TABLE formations DROP convention_hour_compagny;
ALTER TABLE formations ADD COLUMN convention_hour_center INT NOT NULL;
ALTER TABLE formations ADD COLUMN convention_hour_company  INT NOT NULL;

-- insertion pour les formations
INSERT INTO formations(title, average_effective, convention_hour_center, convention_hour_company, deal_code, order_giver, deal_begin_date, deal_ending_date) VALUES ('Formation n° 1', '5', 500, 250, '#5938593853#', '1', '2015-07-27 09:57:07', '2015-07-27 09:57:07');

INSERT INTO formations(title, average_effective, convention_hour_center, convention_hour_company, deal_code, order_giver, deal_begin_date, deal_ending_date) VALUES ('Formation n° 2', '10', 500, 250, '#5938593853#', '1', '2015-07-27 09:57:07', '2015-07-27 09:57:07');

INSERT INTO formations(title, average_effective, convention_hour_center, convention_hour_company, deal_code, order_giver, deal_begin_date, deal_ending_date) VALUES ('Formation n° 3', '21', 500, 250, '#5938593853#', '1', '2015-07-27 09:57:07', '2015-07-27 09:57:07');

INSERT INTO formations(title, average_effective, convention_hour_center, convention_hour_company, deal_code, order_giver, deal_begin_date, deal_ending_date) VALUES ('Formation n° 4', '19', 500, 250, '#5938593853#', '1', '2015-07-27 09:57:07', '2015-07-27 09:57:07');

INSERT INTO formations(title, average_effective, convention_hour_center, convention_hour_company, deal_code, order_giver, deal_begin_date, deal_ending_date) VALUES ('Formation n° 5', '3', 500, 250, '#5938593853#', '1', '2015-07-27 09:57:07', '2015-07-27 09:57:07');

-- insertion pour les matières
INSERT INTO matters(title) VALUES ('Matière 0');

INSERT INTO matters(title) VALUES ('Matière 1');

INSERT INTO matters(title) VALUES ('Matière 2');

INSERT INTO matters(title) VALUES ('Matière 3');

INSERT INTO matters(title) VALUES ('Matière 4');

-- insertion pour les status d'entrainement
INSERT INTO trainee_status(title) VALUES ('Statut 0');

INSERT INTO trainee_status(title) VALUES ('Statut 1');

INSERT INTO trainee_status(title) VALUES ('Statut 2');

INSERT INTO trainee_status(title) VALUES ('Statut 3');

INSERT INTO trainee_status(title) VALUES ('Statut 4');

-- insertion pour les niveau d'études
INSERT INTO study_levels(wording) VALUES ('Niveau 0');

INSERT INTO study_levels(wording) VALUES ('Niveau 1');

INSERT INTO study_levels(wording) VALUES ('Niveau 2');

INSERT INTO study_levels(wording) VALUES ('Niveau 3');

INSERT INTO study_levels(wording) VALUES ('Niveau 4');

-- insertion pour les status des familles
INSERT INTO family_status(title) VALUES ('Status n°0');

INSERT INTO family_status(title) VALUES ('Status n°1');

INSERT INTO family_status(title) VALUES ('Status n°2');

INSERT INTO family_status(title) VALUES ('Status n°3');

INSERT INTO family_status(title) VALUES ('Status n°4');

-- insertion pour les nationalités
INSERT INTO nationalities(title) VALUES ('Nationalité n°0');

INSERT INTO nationalities(title) VALUES ('Nationalité n°1');

INSERT INTO nationalities(title) VALUES ('Nationalité n°2');

INSERT INTO nationalities(title) VALUES ('Nationalité n°3');

INSERT INTO nationalities(title) VALUES ('Nationalité n°4');

-- insertion pour les types de rémunération
INSERT INTO remuneration_types(title) VALUES ('Type de rémunération n°0');

INSERT INTO remuneration_types(title) VALUES ('Type de rémunération n°1');

INSERT INTO remuneration_types(title) VALUES ('Type de rémunération n°2');

INSERT INTO remuneration_types(title) VALUES ('Type de rémunération n°3');

INSERT INTO remuneration_types(title) VALUES ('Type de rémunération n°4');

-- insertion pour les sessions de formation
INSERT INTO formation_sessions(formations_id, begin_date, ending_date) VALUES ('1', '2015-07-27 10:00:35', '2015-07-27 10:00:35');

INSERT INTO formation_sessions(formations_id, begin_date, ending_date) VALUES ('1', '2015-07-27 10:00:35', '2015-07-27 10:00:35');

INSERT INTO formation_sessions(formations_id, begin_date, ending_date) VALUES ('1', '2015-07-27 10:00:35', '2015-07-27 10:00:35');

INSERT INTO formation_sessions(formations_id, begin_date, ending_date) VALUES ('1', '2015-07-27 10:00:35', '2015-07-27 10:00:35');

INSERT INTO formation_sessions(formations_id, begin_date, ending_date) VALUES ('1', '2015-07-27 10:00:35', '2015-07-27 10:00:35');

-- insertion pour les reférences pédagogiques
INSERT INTO ref_pedagos(formations_id, matters_id) VALUES ('1', '1');

INSERT INTO ref_pedagos(formations_id, matters_id) VALUES ('1', '2');

INSERT INTO ref_pedagos(formations_id, matters_id) VALUES ('1', '3');

INSERT INTO ref_pedagos(formations_id, matters_id) VALUES ('1', '4');

INSERT INTO ref_pedagos(formations_id, matters_id) VALUES ('1', '5');

-- insertion pour les stages
INSERT INTO internships(title, explain, company_id, formation_id, referent_id, create_uid, update_uid, active) VALUES ('Stage n°1', 'Présentation du stage n° 0', '1', '1', '1', '1', '0', '1');

INSERT INTO internships(title, explain, company_id, formation_id, referent_id, create_uid, update_uid, active) VALUES ('Stage n°2', 'Présentation du stage n° 1', '2', '2', '2', '1', '0', '1');

INSERT INTO internships(title, explain, company_id, formation_id, referent_id, create_uid, update_uid, active) VALUES ('Stage n°3', 'Présentation du stage n° 2', '3', '3', '3', '1', '0', '1');

INSERT INTO internships(title, explain, company_id, formation_id, referent_id, create_uid, update_uid, active) VALUES ('Stage n°4', 'Présentation du stage n° 3', '4', '4', '4', '1', '0', '1');

INSERT INTO internships(title, explain, company_id, formation_id, referent_id, create_uid, update_uid, active) VALUES ('Stage n°5', 'Présentation du stage n° 4', '5', '5', '5', '1', '0', '1');

-- insertion pour les étudiants
ALTER TABLE trainees DROP COLUMN social_security_number;
ALTER TABLE trainees ADD COLUMN social_security_number VARCHAR NOT NULL;

INSERT INTO trainees(civility, name, firstname, birthday, birthdayplace, gender, adress_off_street, adress_off_complement, adress_off_codpost, adress_off_city, adress_form_street, adress_form_complement, adress_form_codpost, adress_form_city, phone, mail, cellphone, social_security_number, photo, remuneration_type_id, status_trainee_id, study_levels_id, family_status_id, nationality_id) VALUES ('Monsieur','Etudiant n° 1', 'Toto', '1990-04-20', 'Perpignan', 'M', '0 rue des nounours', 'Etage n° 1', '66000', 'Perpignan', '0 rue des nounours', 'Etage n° 1', '66000', 'Perpignan', '0102030401', 'etudiant1@email.com', '0102030401', '010203010203', 'http://auto.img.v4.skyrock.net/8830/58378830/pics/2355029543_1.jpg', '1', '1', '1', '1', '1');

INSERT INTO trainees(civility, name, firstname, birthday, birthdayplace, gender, adress_off_street, adress_off_complement, adress_off_codpost, adress_off_city, adress_form_street, adress_form_complement, adress_form_codpost, adress_form_city, phone, mail, cellphone, social_security_number, photo, remuneration_type_id, status_trainee_id, study_levels_id, family_status_id, nationality_id) VALUES ('Monsieur','Etudiant n° 2', 'Toto', '1990-04-20', 'Perpignan', 'M', '1 rue des nounours', 'Etage n° 2', '66000', 'Perpignan', '1 rue des nounours', 'Etage n° 2', '66000', 'Perpignan', '0102030402', 'etudiant2@email.com', '0102030402', '010203010203', 'http://auto.img.v4.skyrock.net/8830/58378830/pics/2355029543_1.jpg', '2', '2', '2', '2', '2');

INSERT INTO trainees(civility, name, firstname, birthday, birthdayplace, gender, adress_off_street, adress_off_complement, adress_off_codpost, adress_off_city, adress_form_street, adress_form_complement, adress_form_codpost, adress_form_city, phone, mail, cellphone, social_security_number, photo, remuneration_type_id, status_trainee_id, study_levels_id, family_status_id, nationality_id) VALUES ('Monsieur','Etudiant n° 3', 'Toto', '1990-04-20', 'Perpignan', 'M', '2 rue des nounours', 'Etage n° 3', '66000', 'Perpignan', '2 rue des nounours', 'Etage n° 3', '66000', 'Perpignan', '0102030403', 'etudiant3@email.com', '0102030403', '010203010203', 'http://auto.img.v4.skyrock.net/8830/58378830/pics/2355029543_1.jpg', '3', '3', '3', '3', '3');

INSERT INTO trainees(civility, name, firstname, birthday, birthdayplace, gender, adress_off_street, adress_off_complement, adress_off_codpost, adress_off_city, adress_form_street, adress_form_complement, adress_form_codpost, adress_form_city, phone, mail, cellphone, social_security_number, photo, remuneration_type_id, status_trainee_id, study_levels_id, family_status_id, nationality_id) VALUES ('Monsieur','Etudiant n° 4', 'Toto', '1990-04-20', 'Perpignan', 'M', '3 rue des nounours', 'Etage n° 4', '66000', 'Perpignan', '3 rue des nounours', 'Etage n° 4', '66000', 'Perpignan', '0102030404', 'etudiant4@email.com', '0102030404', '010203010203', 'http://auto.img.v4.skyrock.net/8830/58378830/pics/2355029543_1.jpg', '4', '4', '4', '4', '4');

INSERT INTO trainees(civility, name, firstname, birthday, birthdayplace, gender, adress_off_street, adress_off_complement, adress_off_codpost, adress_off_city, adress_form_street, adress_form_complement, adress_form_codpost, adress_form_city, phone, mail, cellphone, social_security_number, photo, remuneration_type_id, status_trainee_id, study_levels_id, family_status_id, nationality_id) VALUES ('Monsieur','Etudiant n° 5', 'Toto', '1990-04-20', 'Perpignan', 'M', '4 rue des nounours', 'Etage n° 5', '66000', 'Perpignan', '4 rue des nounours', 'Etage n° 5', '66000', 'Perpignan', '0102030405', 'etudiant5@email.com', '0102030405', '010203010203', 'http://auto.img.v4.skyrock.net/8830/58378830/pics/2355029543_1.jpg', '5', '5', '5', '5', '5');

-- insertion pour les sessions de formations
INSERT INTO sessions_trainee(session_id, trainee_id, nb_hour_present_school, nb_hour_present_trainer) VALUES ('1', '1', '500', '500');

INSERT INTO sessions_trainee(session_id, trainee_id, nb_hour_present_school, nb_hour_present_trainer) VALUES ('2', '2', '500', '500');

INSERT INTO sessions_trainee(session_id, trainee_id, nb_hour_present_school, nb_hour_present_trainer) VALUES ('3', '3', '500', '500');

INSERT INTO sessions_trainee(session_id, trainee_id, nb_hour_present_school, nb_hour_present_trainer) VALUES ('4', '4', '500', '500');

INSERT INTO sessions_trainee(session_id, trainee_id, nb_hour_present_school, nb_hour_present_trainer) VALUES ('5', '5', '500', '500');

-- insertion pour les formateurs
INSERT INTO trainers (name, firstname, phone, cellphone, mail, birthday, birthdayplace, gender, address_off_street, address_off_complement, address_off_codpost, address_off_city, address_form_street, address_form_complement, address_form_codpost, address_form_city, social_security_number, photo, nationality_id, family_status_id, further_informations, study_levels_id, hourly_rate, trainer_extern, active) VALUES ('patrick', 'jean', '06', '01616', 'dsf@sdf.com', '01/01/1970', 'dfer', 'male', 'iluhh', 'dfsdf', '66500', 'jean', NULL, NULL, NULL, NULL, '123456789012345', NULL, '1', '1', NULL, '1', '1', '0', '1');

INSERT INTO trainers (name, firstname, phone, cellphone, mail, birthday, birthdayplace, gender, address_off_street, address_off_complement, address_off_codpost, address_off_city, address_form_street, address_form_complement, address_form_codpost, address_form_city, social_security_number, photo, nationality_id, family_status_id, further_informations, study_levels_id, hourly_rate, trainer_extern, active) VALUES ('patrick', 'jean', '06', '01616', 'dsf@sdf.com', '01/01/1970', 'dfer', 'male', 'iluhh', 'dfsdf', '66500', 'jean', NULL, NULL, NULL, NULL, '123456789012345', NULL, '1', '1', NULL, '1', '1', '0', '1');
INSERT INTO trainers (name, firstname, phone, cellphone, mail, birthday, birthdayplace, gender, address_off_street, address_off_complement, address_off_codpost, address_off_city, address_form_street, address_form_complement, address_form_codpost, address_form_city, social_security_number, photo, nationality_id, family_status_id, further_informations, study_levels_id, hourly_rate, trainer_extern, active) VALUES ('patrick', 'jean', '06', '01616', 'dsf@sdf.com', '01/01/1970', 'dfer', 'male', 'iluhh', 'dfsdf', '66500', 'jean', NULL, NULL, NULL, NULL, '123456789012345', NULL, '1', '1', NULL, '1', '1', '0', '1');
INSERT INTO trainers (name, firstname, phone, cellphone, mail, birthday, birthdayplace, gender, address_off_street, address_off_complement, address_off_codpost, address_off_city, address_form_street, address_form_complement, address_form_codpost, address_form_city, social_security_number, photo, nationality_id, family_status_id, further_informations, study_levels_id, hourly_rate, trainer_extern, active) VALUES ('patrick', 'jean', '06', '01616', 'dsf@sdf.com', '01/01/1970', 'dfer', 'male', 'iluhh', 'dfsdf', '66500', 'jean', NULL, NULL, NULL, NULL, '123456789012345', NULL, '1', '1', NULL, '1', '1', '0', '1');
INSERT INTO trainers (name, firstname, phone, cellphone, mail, birthday, birthdayplace, gender, address_off_street, address_off_complement, address_off_codpost, address_off_city, address_form_street, address_form_complement, address_form_codpost, address_form_city, social_security_number, photo, nationality_id, family_status_id, further_informations, study_levels_id, hourly_rate, trainer_extern, active) VALUES ('patrick', 'jean', '06', '01616', 'dsf@sdf.com', '01/01/1970', 'dfer', 'male', 'iluhh', 'dfsdf', '66500', 'jean', NULL, NULL, NULL, NULL, '123456789012345', NULL, '1', '1', NULL, '1', '1', '0', '1');


-- insertion pour les niveaux
INSERT INTO levels(note, appreciation, matter_id, trainer_id) VALUES ('0', 'Un texte', '1', '1');

INSERT INTO levels(note, appreciation, matter_id, trainer_id) VALUES ('1', 'Un texte', '2', '2');

INSERT INTO levels(note, appreciation, matter_id, trainer_id) VALUES ('2', 'Un texte', '3', '3');

INSERT INTO levels(note, appreciation, matter_id, trainer_id) VALUES ('3', 'Un texte', '4', '4');

INSERT INTO levels(note, appreciation, matter_id, trainer_id) VALUES ('4', 'Un texte', '5', '5');

-- insertion pour les timesheets
INSERT INTO timesheets(month, year, total_hours, trainer_id, formation_session_id) VALUES ('9', '2015', '140', '1', '1');

INSERT INTO timesheets(month, year, total_hours, trainer_id, formation_session_id) VALUES ('9', '2015', '140', '2', '2');

INSERT INTO timesheets(month, year, total_hours, trainer_id, formation_session_id) VALUES ('9', '2015', '140', '3', '3');

INSERT INTO timesheets(month, year, total_hours, trainer_id, formation_session_id) VALUES ('9', '2015', '140', '4', '4');

INSERT INTO timesheets(month, year, total_hours, trainer_id, formation_session_id) VALUES ('9', '2015', '140', '5', '5');

-- insertion pour les stages d'entreprise
INSERT INTO company_internship(trainee_id, company_id, internship_id, active, total_hours, date_begin, date_end) VALUES ('1', '1', '1', '1', '172', '2015-07-27 11:21:50', '2015-08-26 11:21:50');

INSERT INTO company_internship(trainee_id, company_id, internship_id, active, total_hours, date_begin, date_end) VALUES ('2', '2', '2', '1', '146', '2015-07-27 11:21:50', '2015-08-26 11:21:50');

INSERT INTO company_internship(trainee_id, company_id, internship_id, active, total_hours, date_begin, date_end) VALUES ('3', '3', '3', '1', '139', '2015-07-27 11:21:50', '2015-08-26 11:21:50');

INSERT INTO company_internship(trainee_id, company_id, internship_id, active, total_hours, date_begin, date_end) VALUES ('4', '4', '4', '1', '172', '2015-07-27 11:21:50', '2015-08-26 11:21:50');

INSERT INTO company_internship(trainee_id, company_id, internship_id, active, total_hours, date_begin, date_end) VALUES ('5', '5', '5', '1', '170', '2015-07-27 11:21:50', '2015-08-26 11:21:50');