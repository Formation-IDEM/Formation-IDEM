/* Création de la table formateur */
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
