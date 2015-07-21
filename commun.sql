CREATE TABLE matter(
	id SERIAL PRIMARY KEY,
	title VARCHAR
);

ALTER TABLE formateur ADD COLUMN id SERIAL PRIMARY KEY;
ALTER TABLE formateur ADD COLUMN create_date DATE;
ALTER TABLE formateur ADD COLUMN update_date DATE;
ALTER TABLE formateur ADD COLUMN create_uid INT;
ALTER TABLE formateur ADD COLUMN update_uid INT;
ALTER TABLE formateur ADD COLUMN active BOOLEAN;

ALTER TABLE feuille_presence ADD COLUMN id SERIAL PRIMARY KEY;
ALTER TABLE feuille_presence ADD COLUMN create_date DATE;
ALTER TABLE feuille_presence ADD COLUMN update_date DATE;
ALTER TABLE feuille_presence ADD COLUMN create_uid INT;
ALTER TABLE feuille_presence ADD COLUMN update_uid INT;
ALTER TABLE feuille_presence ADD COLUMN active BOOLEAN;
