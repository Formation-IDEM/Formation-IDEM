-- création tables

CREATE TABLE family_status (
	id SERIAL PRIMARY KEY,
	libelle VARCHAR
);

CREATE TABLE nationality (
	id SERIAL PRIMARY KEY,
	libelle VARCHAR
);

CREATE TABLE remuneration_type (
	id SERIAL PRIMARY KEY,
	libelle VARCHAR
);


CREATE TABLE trainee (
	id SERIAL PRIMARY KEY,
	name VARCHAR NOT NULL,
	firstname VARCHAR NOT NULL,
	birthday DATE NOT NULL,
	birthdayplace VARCHAR NOT NULL,
	gender VARCHAR NOT NULL,
	adress_off_street VARCHAR NOT NULL,
	adress_off_complement VARCHAR NOT NULL,
	adress_off_codpost VARCHAR NOT NULL,
	adress_off_city VARCHAR NOT NULL,
	adress_form_street VARCHAR NOT NULL,
	adress_form_complement VARCHAR NOT NULL,
	adress_form_codpost VARCHAR NOT NULL,
	adress_form_city VARCHAR NOT NULL,
	phone VARCHAR NOT NULL,
	mail VARCHAR NOT NULL,cours
	cellphone VARCHAR NOT NULL,
	social_security_number INTEGER NOT NULL,
	photo VARCHAR NOT NULL,
	id_remuneration_type INTEGER NOT NULL,
	FOREIGN KEY (id_remuneration_type) REFERENCES remuneration_type(id),
	id_status_stagiaire INTEGER NOT NULL,
	FOREIGN KEY (id_trainee_status) REFERENCES trainee_status(id),
	id_niveau_etude INTEGER NOT NULL,
	FOREIGN KEY (id_study_level) REFERENCES study_level(id),
	id_family_status INTEGER NOT NULL,
	FOREIGN KEY (id_family_status) REFERENCES family_status(id),
	id_nationality INTEGER NOT NULL,
	FOREIGN KEY (id_nationality) REFERENCES nationality(id)
); 

CREATE TABLE session_trainee (
	id_session INTEGER NOT NULL,
	id_trainee INTEGER NOT NULL,
	PRIMARY KEY (id_session,id_trainee),
	nb_hour_present_school INTEGER NOT NULL,
	nb_hour_present_trainer INTEGER NOT NULL	
);




