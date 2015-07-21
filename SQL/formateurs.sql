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

/* Mise en place des clées étrangères */
/* ATTENTION : La table matiere, formation, session_formation doivent êtres créées d'abord ! */
ALTER TABLE trainer_extern ADD CONSTRAINT fk_trainer_extern FOREIGN KEY (trainer_id) REFERENCES trainer(id);
ALTER TABLE level ADD CONSTRAINT fk_matter_level FOREIGN KEY (matter_id) REFERENCES matter(id);
ALTER TABLE level ADD CONSTRAINT fk_trainer_level FOREIGN KEY (trainer_id) REFERENCES trainer(id);
ALTER TABLE timesheet ADD CONSTRAINT fk_formation_session_timesheet FOREIGN KEY (formation_session_id) REFERENCES formation_session(id);
