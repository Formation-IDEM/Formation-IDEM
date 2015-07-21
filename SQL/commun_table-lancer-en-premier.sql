CREATE TABLE matters
(
	id SERIAL PRIMARY KEY,
	title VARCHAR
);

CREATE TABLE trainee_status
(
	id SERIAL PRIMARY KEY,
	title VARCHAR
);

CREATE TABLE study_levels
(
	id SERIAL PRIMARY KEY,
	title VARCHAR
);

CREATE TABLE family_status
(
	id SERIAL PRIMARY KEY,
	title VARCHAR
);

CREATE TABLE nationalities
(
	id SERIAL PRIMARY KEY,
	title VARCHAR
);

CREATE TABLE renumeration_types
(
	id SERIAL PRIMARY KEY,
	title VARCHAR
);

CREATE TABLE formation_sessions
(
	id SERIAL PRIMARY KEY,
	formations_id INT PRIMARY KEY,
	begin_date DATE NOT NULL, -- date début d'une session de formation
	ending_date DATE NOT NULL, -- date fin de sesion de formation
);