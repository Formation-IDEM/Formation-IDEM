/* Ajout des colonnes pour ObjGen (de la class ObjGen) */

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

