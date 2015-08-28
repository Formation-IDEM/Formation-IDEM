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
	PRIMARY KEY (id, formations_id, matters_id),
	FOREIGN KEY (formations_id) REFERENCES formations(id),
	FOREIGN KEY (matters_id) REFERENCES matters(id)
);

-- FICHIER : etudiant.sql --
CREATE TABLE trainees 
(
	id SERIAL PRIMARY KEY,
	name VARCHAR NOT NULL,
	firstname VARCHAR NOT NULL,
	birthday DATE NOT NULL,
	birthdayplace VARCHAR NOT NULL,
	gender VARCHAR NOT NULL,
	adress_off_street VARCHAR NOT NULL,
	adress_off_complement VARCHAR NOT NULL,
	adress_off_codpost VARCHAR NOT NULL,
	adress_off_city VARCHAR NOT NULL,
	adress_form_street VARCHAR NOT NULL,
	adress_form_complement VARCHAR NOT NULL,
	adress_form_codpost VARCHAR NOT NULL,
	adress_form_city VARCHAR NOT NULL,
	phone VARCHAR NOT NULL,
	mail VARCHAR NOT NULL,
	cellphone VARCHAR NOT NULL,
	social_security_number INTEGER NOT NULL,
	photo VARCHAR NOT NULL,
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
	create_date TIMESTAMP DEFAULT(NOW()),
  	update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
	create_uid INT NOT NULL,
	update_uid INT DEFAULT NULL,
	visit_date DATE DEFAULT NULL,
	active BOOLEAN DEFAULT(true)
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
	create_date TIMESTAMP DEFAULT(NOW()),
	update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
	create_uid INT NOT NULL,
	update_uid INT NOT NULL,
	active SMALLINT DEFAULT(0),
	pay BOOLEAN DEFAULT(false),
	wage NUMERIC DEFAULT(0)
);

/**
Table de liaison entre les entreprises, les stagiaires et les stages
 */

CREATE TABLE company_internship
(
	trainee_id INT NOT NULL,
	company_id INT NOT NULL,
	internship_id INT NOT NULL,
	active BOOLEAN DEFAULT(false),
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
	address_form_street VARCHAR NOT NULL,
	address_form_complement VARCHAR NOT NULL,
	address_form_codpost VARCHAR NOT NULL,
	address_form_city VARCHAR NOT NULL,
	phone VARCHAR NOT NULL,
	mail VARCHAR NOT NULL,
	cellphone VARCHAR NOT NULL,
	social_security_number INTEGER NOT NULL,
	photo VARCHAR NOT NULL,
	family_status_id INTEGER,
	nationality_id INTEGER
);

/* Création de la table trainer_extern liée a un formateur */
CREATE TABLE trainers_externs
(
	id SERIAL PRIMARY KEY,
	hourly_rate FLOAT NOT NULL,
	trainer_id INT NOT NULL
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
ADD COLUMN active BOOLEAN;

ALTER TABLE timesheets
ADD COLUMN create_date TIMESTAMP DEFAULT(NOW()),
ADD COLUMN update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN;

ALTER TABLE formations
ADD COLUMN create_date TIMESTAMP DEFAULT(NOW()),
ADD COLUMN update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN;

ALTER TABLE trainees
ADD COLUMN create_date TIMESTAMP DEFAULT(NOW()),
ADD COLUMN update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN;


-- FOREIGN KEY (qui ne sont pas déjà présentes plus haut) --
ALTER TABLE internships ADD FOREIGN KEY (company_id) REFERENCES companies(id);
ALTER TABLE internships ADD FOREIGN KEY (formation_id) REFERENCES formations(id);
ALTER TABLE company_internship ADD FOREIGN KEY (trainee_id) REFERENCES trainees(id);

-- Mise en place des clées étrangères --
ALTER TABLE trainers_externs ADD CONSTRAINT fk_trainers_externs FOREIGN KEY (trainer_id) REFERENCES trainers(id);
ALTER TABLE levels ADD CONSTRAINT fk_matters_levels FOREIGN KEY (matter_id) REFERENCES matters(id);
ALTER TABLE levels ADD CONSTRAINT fk_trainers_levels FOREIGN KEY (trainer_id) REFERENCES trainers(id);
ALTER TABLE timesheets ADD CONSTRAINT fk_formations_sessions_timesheets FOREIGN KEY (formation_session_id) REFERENCES formation_sessions(id);
ALTER TABLE trainers ADD CONSTRAINT fk_study_levels_trainers FOREIGN KEY (study_levels_id) REFERENCES study_levels(id);
ALTER TABLE trainers ADD CONSTRAINT fk_family_status_trainers FOREIGN KEY (family_status_id) REFERENCES family_status(id);
ALTER TABLE trainers ADD CONSTRAINT fk_nationality_trainers FOREIGN KEY (nationality_id) REFERENCES nationalities(id);





