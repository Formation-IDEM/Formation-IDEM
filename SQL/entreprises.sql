
/**
Table des entreprises
 */
CREATE TABLE companies (
	id SERIAL PRIMARY KEY,
	name VARCHAR(120) UNIQUE NOT NULL,        -- nom de l'entreprise
	status VARCHAR(120) NOT NULL,             -- raison sociale
	company_name VARCHAR(120) DEFAULT NULL,   -- nom commercial
	address VARCHAR(250) NOT NULL,
	postal_code VARCHAR(6) DEFAULT NULL,
	city VARCHAR(60) NOT NULL,
	country VARCHAR(60) NOT NULL,
	phone VARCHAR(15) NOT NULL,
	mobile VARCHAR(15) DEFAULT NULL,
	fax VARCHAR(15) DEFAULT NULL,
	manager_id VARCHAR(60) DEFAULT NULL,
	create_date TIMESTAMP DEFAULT(NOW()),
  update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
	create_uid INT NOT NULL,
	update_uid INT DEFAULT NULL,
	visit_date DATE DEFAULT NULL,
	active BOOLEAN DEFAULT(true)
);

/**
Table des stages
 */
CREATE TABLE internships (
	id SERIAL PRIMARY KEY,
	title VARCHAR(120) NOT NULL,
	company_id INT REFERENCES companies(id),
	formation_id INT(4) REFERENCES formations(id),
	explain TEXT DEFAULT NULL,
	referent_id VARCHAR(60) REFERENCES trainers(id),
	create_date TIMESTAMP DEFAULT(NOW()),
	update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
	create_uid INT NOT NULL,
	update_uid INT NOT NULL,
	active SMALLINT DEFAULT(0),
	pay BOOLEAN DEFAULT(false),
	wage NUMERIC DEFAULT(0)
);

/**
Table de liaison entre les entreprises, les stagiaires et les stages
 */
CREATE TABLE company_internship(
	trainee_id INT REFERENCES trainees(id),
	company_id INT REFERENCES companies(id),
	internship_id INT REFERENCES internships(id),
	active BOOLEAN DEFAULT(false),
	hiring BOOLEAN DEFAULT(false),
	total_hours INT NOT NULL DEFAULT(0),
	date_begin TIMESTAMP DEFAULT(NOW()),
	date_end TIMESTAMP CHECK(date_end >= date_begin) DEFAULT(NOW())
);
