<<<<<<< HEAD:commun.sql
﻿CREATE TABLE matter
(
=======
﻿CREATE TABLE matters(
>>>>>>> 21e3205e7a039f6f85b1586156585f5f428c205c:SQL/commun.sql
	id SERIAL PRIMARY KEY,
	title VARCHAR -- intitulé de la formation
);

ALTER TABLE trainer 
ADD COLUMN id SERIAL PRIMARY KEY,
ADD COLUMN create_date DATE,
ADD COLUMN update_date DATE,
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN;

<<<<<<< HEAD:commun.sql
ALTER TABLE timesheet 
ADD COLUMN id SERIAL PRIMARY KEY,
ADD COLUMN create_date DATE,
ADD COLUMN update_date DATE,
ADD COLUMN create_uid INT,
ADD COLUMN update_uid INT,
ADD COLUMN active BOOLEAN;
=======
ALTER TABLE feuille_presence ADD COLUMN id SERIAL PRIMARY KEY;
ALTER TABLE feuille_presence ADD COLUMN create_date DATE;
ALTER TABLE feuille_presence ADD COLUMN update_date DATE;
ALTER TABLE feuille_presence ADD COLUMN create_uid INT;
ALTER TABLE feuille_presence ADD COLUMN update_uid INT;
ALTER TABLE feuille_presence ADD COLUMN active BOOLEAN;
>>>>>>> 21e3205e7a039f6f85b1586156585f5f428c205c:SQL/commun.sql
