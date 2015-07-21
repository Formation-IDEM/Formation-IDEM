/* Ajout des colonnes pour ObjGen (de la class ObjGen) */

ALTER TABLE trainers
ADD COLUMN create_date DATE,
ADD COLUMN update_date DATE,
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN;

ALTER TABLE timesheets
ADD COLUMN create_date DATE,
ADD COLUMN update_date DATE,
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN;


ALTER TABLE formations
ADD COLUMN create_date DATE,
ADD COLUMN update_date DATE,
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN;

ALTER TABLE trainees
ADD COLUMN create_date DATE,
ADD COLUMN update_date DATE,
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN;

