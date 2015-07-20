/* Création de la table formateur */
CREATE TABLE trainer
(
	id SERIAL PRIMARY KEY,
	further_informations TEXT,
);

/* Création de la table externe liée a un formateur */
CREATE TABLE trainer_extern
(
	id SERIAL PRIMARY KEY,
	hourly_rate FLOAT NOT NULL,
	trainer_id INT NOT NULL
);

/* Création de la table d'association entre formateur et matière */
CREATE TABLE level
(
	id SERIAL PRIMARY KEY,
	note INT NOT NULL DEFAULT(0),
	appreciation TEXT,
	matter_id INT,
	trainer_id INT
);

/* Création de la table d'association entre formateur et session_formation */
CREATE TABLE timesheet
(
	id SERIAL PRIMARY KEY,
	month INT NOT NULL,
	year INT NOT NULL,
	total_hours INT NOT NULL DEFAULT(0),
	trainer_id INT,
	formation_session INT
	
);
