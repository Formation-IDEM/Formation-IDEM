CREATE TABLE companies (
	id SERIAL PRIMARY KEY,
	name VARCHAR(120) UNIQUE NOT NULL,
	status VARCHAR(120) NOT NULL,
	company_name VARCHAR(120) DEFAULT NULL,
	adresse VARCHAR(250) NOT NULL,
	postal_code VARCHAR(6) DEFAULT NULL,
	city VARCHAR(60) NOT NULL,
	country VARCHAR(60) NOT NULL,
	phone VARCHAR(15) NOT NULL,
	mobile VARCHAR(15) DEFAULT NULL,
	fax VARCHAR(15) DEFAULT NULL,
	manager_id VARCHAR(60) DEFAULT NULL,
	create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	update_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	create_uid INT NOT NULL,
	update_uid INT DEFAULT NULL,
	date_visite DATE DEFAULT NULL,
	active BOOLEAN DEFAULT true
);

CREATE TABLE stages (
	id SERIAL PRIMARY KEY,
	title VARCHAR(120) NOT NULL,
	company_id INT REFERENCES companies(id),
	--formation_id INT(4) REFERENCES formations(id),
	explain TEXT DEFAULT NULL,
	referent_id VARCHAR(60) REFERENCES formateurs(id),
	create_date TIMESTAMP DEFAULT(NOW()),
	update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
	create_uid INT NOT NULL,
	update_uid INT NOT NULL,
	active SMALLINT DEFAULT(0),
	pay BOOLEAN DEFAULT(false),
	wadge NUMERIC DEFAULT(0)
);

CREATE TABLE stagiaire_entreprise (
	--stagiaire_id INT REFERENCES stagiaires(id),
	company_id INT REFERENCES entreprises(id),
	enternship_id INT REFERENCES  stages(id),
	is_active BOOLEAN DEFAULT(false),
	hiring BOOLEAN DEFAULT(false),
	total_hours INT NOT NULL DEFAULT(0),
	date_begin TIMESTAMP DEFAULT(NOW()),
	date_end TIMESTAMP CHECK(date_end >= date_begin) DEFAULT(NOW())
);