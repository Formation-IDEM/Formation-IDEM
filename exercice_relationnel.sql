CREATE TABLE materiel (code INT SERIAL PRIMARY KEY, designation VARCHAR (100) UNIQUE NOT NULL, fabricant VARCHAR (50) NOT NULL, date_achat DATE NOT NULL);
CREATE TABLE piece (ref INT SERIAL PRIMARY KEY, libelle VARCHAR (100) UNIQUE NOT NULL, prix NUMERIC NOT NULL); 
CREATE TABLE intervention (id INT SERIAL PRIMARY KEY, descriptif VARCHAR (250) NOT NULL, date DATE NOT NULL, temps_passe NUMERIC, fk_code INT) finir avec la contrainte foreign key




