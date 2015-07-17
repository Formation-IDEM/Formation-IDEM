/* Création de la table formateur */
CREATE TABLE formateur
(
	id SERIAL PRIMARY KEY,
	infos_complementaires TEXT,
	formation_id INT
);

/* Création de la table externe liée a un formateur */
CREATE TABLE externe
(
	id SERIAL PRIMARY KEY,
	tarif_horaire FLOAT NOT NULL,
	formateur_id INT NOT NULL
);

/* Création de la table d'association entre formateur et matière */
CREATE TABLE niveau
(
	id SERIAL PRIMARY KEY,
	note INT NOT NULL DEFAULT(0),
	appreciation TEXT,
	matiere_id INT,
	formateur_id INT
);

/* Création de la table d'association entre formateur et session_formation */
CREATE TABLE feuille_presence
(
	id SERIAL PRIMARY KEY,
	mois INT NOT NULL,
	annee INT NOT NULL,
	total_heures INT NOT NULL DEFAULT(0),
	formateur_id INT,
	session_formation INT
	
);

/* Mise en place des clées étrangères */
/* ATTENTION : La table matiere, formation, session_formation doivent êtres créées d'abord ! */
ALTER TABLE externe ADD CONSTRAINT fk_formateur_externe FOREIGN KEY (formateur_id) REFERENCES formateur(id);
ALTER TABLE niveau ADD CONSTRAINT fk_matiere_niveau FOREIGN KEY (matiere_id) REFERENCES matiere(id);
ALTER TABLE niveau ADD CONSTRAINT fk_formateur_niveau FOREIGN KEY (formateur_id) REFERENCES formateur(id);
ALTER TABLE feuille_presence ADD CONSTRAINT fk_session_formation_feuille_presence FOREIGN KEY (session_formation_id) REFERENCES session_formation(id);
ALTER TABLE formateur ADD CONSTRAINT fk_formation_formateur FOREIGN KEY (formation_id) REFERENCES formation(id);
