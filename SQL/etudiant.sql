CREATE TABLE trainees (
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
	mail VARCHAR NOT NULL,
	cellphone VARCHAR NOT NULL,
	social_security_number INTEGER NOT NULL,
	photo VARCHAR NOT NULL,
	remuneration_type_id INTEGER NOT NULL,
	FOREIGN KEY (remuneration_type_id) REFERENCES remuneration_types(id),
	status_trainee_id INTEGER NOT NULL,
	FOREIGN KEY (status_trainee_id) REFERENCES trainee_status(id),
	study_levels_id INTEGER NOT NULL,
	FOREIGN KEY (study_level_id) REFERENCES study_levels(id),
	family_status_id INTEGER NOT NULL,
	FOREIGN KEY (family_status_id) REFERENCES family_status(id),
	nationality_id INTEGER NOT NULL,
	FOREIGN KEY (nationality_id) REFERENCES nationalities(id)
); 

CREATE TABLE sessions_trainee (
	id SERIAL PRIMARY KEY,
	session_id INTEGER NOT NULL,
	FOREIGN KEY (session_id) REFERENCES session(id),
	trainee_id INTEGER NOT NULL,
	FOREIGN KEY (trainee_id) REFERENCES trainees(id),
	nb_hour_present_school INTEGER NOT NULL,
	nb_hour_present_trainer INTEGER NOT NULL	
);



