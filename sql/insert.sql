-- Insertion pour les entreprises
INSERT INTO companies(name, status, company_name, address, postal_code, city, country, phone, mobile, manager, create_uid) VALUES ('Entreprise 0', 'SARL 0', 'Ma compagnie 0', '0 rue des fleuristes', '1500', 'Perpignan', 'France', '0234432120', '0404040400', '1', '1');

INSERT INTO companies(name, status, company_name, address, postal_code, city, country, phone, mobile, manager, create_uid) VALUES ('Entreprise 1', 'SARL 1', 'Ma compagnie 1', '1 rue des fleuristes', '1500', 'Perpignan', 'France', '0234432121', '0404040401', '1', '1');

INSERT INTO companies(name, status, company_name, address, postal_code, city, country, phone, mobile, manager, create_uid) VALUES ('Entreprise 2', 'SARL 2', 'Ma compagnie 2', '2 rue des fleuristes', '1500', 'Perpignan', 'France', '0234432122', '0404040402', '1', '1');

INSERT INTO companies(name, status, company_name, address, postal_code, city, country, phone, mobile, manager, create_uid) VALUES ('Entreprise 3', 'SARL 3', 'Ma compagnie 3', '3 rue des fleuristes', '1500', 'Perpignan', 'France', '0234432123', '0404040403', '1', '1');

INSERT INTO companies(name, status, company_name, address, postal_code, city, country, phone, mobile, manager, create_uid) VALUES ('Entreprise 4', 'SARL 4', 'Ma compagnie 4', '4 rue des fleuristes', '1500', 'Perpignan', 'France', '0234432124', '0404040404', '1', '1');

-- pas de champ TIME pour un chiffre bordel de merde !!!!
ALTER TABLE formations DROP convention_hour_center;
ALTER TABLE formations DROP convention_hour_compagny;
ALTER TABLE formations ADD COLUMN convention_hour_center INT NOT NULL;
ALTER TABLE formations ADD COLUMN convention_hour_company  INT NOT NULL;

-- insertion pour les formations
INSERT INTO formations(title, average_effective, convention_hour_center, convention_hour_company, deal_code, order_giver, deal_begin_date, deal_ending_date) VALUES ('Formation n° 1', '5', 500, 250, '#5433543353#', '1', '2015-02-22 04:52:02', '2015-02-22 04:52:02');

INSERT INTO formations(title, average_effective, convention_hour_center, convention_hour_company, deal_code, order_giver, deal_begin_date, deal_ending_date) VALUES ('Formation n° 2', '5', 500, 250, '#5433543353#', '1', '2015-02-22 04:52:02', '2015-02-22 04:52:02');

INSERT INTO formations(title, average_effective, convention_hour_center, convention_hour_company, deal_code, order_giver, deal_begin_date, deal_ending_date) VALUES ('Formation n° 3', '21', 500, 250, '#5433543353#', '1', '2015-02-22 04:52:02', '2015-02-22 04:52:02');

INSERT INTO formations(title, average_effective, convention_hour_center, convention_hour_company, deal_code, order_giver, deal_begin_date, deal_ending_date) VALUES ('Formation n° 4', '14', 500, 250, '#5433543353#', '1', '2015-02-22 04:52:02', '2015-02-22 04:52:02');

INSERT INTO formations(title, average_effective, convention_hour_center, convention_hour_company, deal_code, order_giver, deal_begin_date, deal_ending_date) VALUES ('Formation n° 5', '3', 500, 250, '#5433543353#', '1', '2015-02-22 04:52:02', '2015-02-22 04:52:02');

-- insertion pour les matières
INSERT INTO matters(title) VALUES ('Matière 0');

INSERT INTO matters(title) VALUES ('Matière 1');

INSERT INTO matters(title) VALUES ('Matière 2');

INSERT INTO matters(title) VALUES ('Matière 3');

INSERT INTO matters(title) VALUES ('Matière 4');

-- insertion pour les status d'entrainement
INSERT INTO trainee_status(title) VALUES ('Statut 0');

INSERT INTO trainee_status(title) VALUES ('Statut 1');

INSERT INTO trainee_status(title) VALUES ('Statut 2');

INSERT INTO trainee_status(title) VALUES ('Statut 3');

INSERT INTO trainee_status(title) VALUES ('Statut 4');

-- insertion pour les niveau d'études
INSERT INTO study_levels(wording) VALUES ('Niveau 0');

INSERT INTO study_levels(wording) VALUES ('Niveau 1');

INSERT INTO study_levels(wording) VALUES ('Niveau 2');

INSERT INTO study_levels(wording) VALUES ('Niveau 3');

INSERT INTO study_levels(wording) VALUES ('Niveau 4');

-- insertion pour les status des familles
INSERT INTO family_status(title) VALUES ('Status n°0');

INSERT INTO family_status(title) VALUES ('Status n°1');

INSERT INTO family_status(title) VALUES ('Status n°2');

INSERT INTO family_status(title) VALUES ('Status n°3');

INSERT INTO family_status(title) VALUES ('Status n°4');

-- insertion pour les nationalités
INSERT INTO nationalities(title) VALUES ('Nationalité n°0');

INSERT INTO nationalities(title) VALUES ('Nationalité n°1');

INSERT INTO nationalities(title) VALUES ('Nationalité n°2');

INSERT INTO nationalities(title) VALUES ('Nationalité n°3');

INSERT INTO nationalities(title) VALUES ('Nationalité n°4');

-- insertion pour les types de rémunération
INSERT INTO remuneration_types(title) VALUES ('Type de rémunération n°0');

INSERT INTO remuneration_types(title) VALUES ('Type de rémunération n°1');

INSERT INTO remuneration_types(title) VALUES ('Type de rémunération n°2');

INSERT INTO remuneration_types(title) VALUES ('Type de rémunération n°3');

INSERT INTO remuneration_types(title) VALUES ('Type de rémunération n°4');

-- insertion pour les sessions de formation
INSERT INTO formation_sessions(formations_id, begin_date, ending_date) VALUES ('1', '2015-02-22 5:00:35', '2015-02-22 5:00:35');

INSERT INTO formation_sessions(formations_id, begin_date, ending_date) VALUES ('1', '2015-02-22 5:00:35', '2015-02-22 5:00:35');

INSERT INTO formation_sessions(formations_id, begin_date, ending_date) VALUES ('1', '2015-02-22 5:00:35', '2015-02-22 5:00:35');

INSERT INTO formation_sessions(formations_id, begin_date, ending_date) VALUES ('1', '2015-02-22 5:00:35', '2015-02-22 5:00:35');

INSERT INTO formation_sessions(formations_id, begin_date, ending_date) VALUES ('1', '2015-02-22 5:00:35', '2015-02-22 5:00:35');

-- insertion pour les reférences pédagogiques
INSERT INTO ref_pedagos(formations_id, matters_id) VALUES ('1', '1');

INSERT INTO ref_pedagos(formations_id, matters_id) VALUES ('1', '2');

INSERT INTO ref_pedagos(formations_id, matters_id) VALUES ('1', '3');

INSERT INTO ref_pedagos(formations_id, matters_id) VALUES ('1', '4');

INSERT INTO ref_pedagos(formations_id, matters_id) VALUES ('1', '5');

-- insertion pour les stages
INSERT INTO internships(title, explain, company_id, formation_id, referent, create_uid, update_uid, active) VALUES ('Stage n°1', 'Présentation du stage n° 0', '1', '1', '1', '1', '0', '1');

INSERT INTO internships(title, explain, company_id, formation_id, referent, create_uid, update_uid, active) VALUES ('Stage n°2', 'Présentation du stage n° 1', '2', '2', '2', '1', '0', '1');

INSERT INTO internships(title, explain, company_id, formation_id, referent, create_uid, update_uid, active) VALUES ('Stage n°3', 'Présentation du stage n° 2', '3', '3', '3', '1', '0', '1');

INSERT INTO internships(title, explain, company_id, formation_id, referent, create_uid, update_uid, active) VALUES ('Stage n°4', 'Présentation du stage n° 3', '3', '3', '3', '1', '0', '1');

INSERT INTO internships(title, explain, company_id, formation_id, referent, create_uid, update_uid, active) VALUES ('Stage n°5', 'Présentation du stage n° 4', '5', '5', '5', '1', '0', '1');

-- insertion pour les étudiants
ALTER TABLE trainees DROP COLUMN social_security_number;
ALTER TABLE trainees ADD COLUMN social_security_number VARCHAR NOT NULL;

INSERT INTO trainees(name, civility,firstname, birthday, birthdayplace, gender, adress_off_street, adress_off_complement, adress_off_codpost, adress_off_city, adress_form_street, adress_form_complement, adress_form_codpost, adress_form_city, phone, mail, cellphone, social_security_number, photo, remuneration_type_id, status_trainee_id, study_levels_id, family_status_id, nationality_id) VALUES ('Mr','Etudiant n° 1', 'Toto', '1440-04-20', 'Perpignan', 'M', '0 rue des nounours', 'Etage n° 1', '1500', 'Perpignan', '0 rue des nounours', 'Etage n° 1', '1500', 'Perpignan', '052030401', 'etudiant1@email.com', '052030401', '0520305203', 'http://auto.img.v4.skyrock.net/3330/53323330/pics/2355024543_1.jpg', '1', '1', '1', '1', '1');

INSERT INTO trainees(name, firstname, birthday, birthdayplace, gender, adress_off_street, adress_off_complement, adress_off_codpost, adress_off_city, adress_form_street, adress_form_complement, adress_form_codpost, adress_form_city, phone, mail, cellphone, social_security_number, photo, remuneration_type_id, status_trainee_id, study_levels_id, family_status_id, nationality_id) VALUES ('Etudiant n° 2', 'Toto', '1440-04-20', 'Perpignan', 'M', '1 rue des nounours', 'Etage n° 2', '1500', 'Perpignan', '1 rue des nounours', 'Etage n° 2', '1500', 'Perpignan', '052030402', 'etudiant2@email.com', '052030402', '0520305203', 'http://auto.img.v4.skyrock.net/3330/53323330/pics/2355024543_1.jpg', '2', '2', '2', '2', '2');

INSERT INTO trainees(name, firstname, birthday, birthdayplace, gender, adress_off_street, adress_off_complement, adress_off_codpost, adress_off_city, adress_form_street, adress_form_complement, adress_form_codpost, adress_form_city, phone, mail, cellphone, social_security_number, photo, remuneration_type_id, status_trainee_id, study_levels_id, family_status_id, nationality_id) VALUES ('Etudiant n° 3', 'Toto', '1440-04-20', 'Perpignan', 'M', '2 rue des nounours', 'Etage n° 3', '1500', 'Perpignan', '2 rue des nounours', 'Etage n° 3', '1500', 'Perpignan', '052030403', 'etudiant3@email.com', '052030403', '0520305203', 'http://auto.img.v4.skyrock.net/3330/53323330/pics/2355024543_1.jpg', '3', '3', '3', '3', '3');

INSERT INTO trainees(name, firstname, birthday, birthdayplace, gender, adress_off_street, adress_off_complement, adress_off_codpost, adress_off_city, adress_form_street, adress_form_complement, adress_form_codpost, adress_form_city, phone, mail, cellphone, social_security_number, photo, remuneration_type_id, status_trainee_id, study_levels_id, family_status_id, nationality_id) VALUES ('Etudiant n° 4', 'Toto', '1440-04-20', 'Perpignan', 'M', '3 rue des nounours', 'Etage n° 4', '1500', 'Perpignan', '3 rue des nounours', 'Etage n° 4', '1500', 'Perpignan', '052030404', 'etudiant4@email.com', '052030404', '0520305203', 'http://auto.img.v4.skyrock.net/3330/53323330/pics/2355024543_1.jpg', '4', '4', '4', '4', '4');

INSERT INTO trainees(name, firstname, birthday, birthdayplace, gender, adress_off_street, adress_off_complement, adress_off_codpost, adress_off_city, adress_form_street, adress_form_complement, adress_form_codpost, adress_form_city, phone, mail, cellphone, social_security_number, photo, remuneration_type_id, status_trainee_id, study_levels_id, family_status_id, nationality_id) VALUES ('Etudiant n° 5', 'Toto', '1440-04-20', 'Perpignan', 'M', '4 rue des nounours', 'Etage n° 5', '1500', 'Perpignan', '4 rue des nounours', 'Etage n° 5', '1500', 'Perpignan', '052030405', 'etudiant5@email.com', '052030405', '0520305203', 'http://auto.img.v4.skyrock.net/3330/53323330/pics/2355024543_1.jpg', '5', '5', '5', '5', '5');

-- insertion pour les sessions de formations
INSERT INTO sessions_trainee(session_id, trainee_id, nb_hour_present_school, nb_hour_present_trainer) VALUES ('1', '3', '500', '500');

INSERT INTO sessions_trainee(session_id, trainee_id, nb_hour_present_school, nb_hour_present_trainer) VALUES ('2', '2', '500', '500');

INSERT INTO sessions_trainee(session_id, trainee_id, nb_hour_present_school, nb_hour_present_trainer) VALUES ('3', '3', '500', '500');

INSERT INTO sessions_trainee(session_id, trainee_id, nb_hour_present_school, nb_hour_present_trainer) VALUES ('4', '4', '500', '500');

INSERT INTO sessions_trainee(session_id, trainee_id, nb_hour_present_school, nb_hour_present_trainer) VALUES ('5', '5', '500', '500');

-- insertion pour les formateurs
INSERT INTO trainers(further_informations, create_date, create_uid) VALUES ('Des informations pour le formateur 0', '2015-02-22 5:24:52', '1');

INSERT INTO trainers(further_informations, create_date, create_uid) VALUES ('Des informations pour le formateur 1', '2015-02-22 5:24:52', '1');

INSERT INTO trainers(further_informations, create_date, create_uid) VALUES ('Des informations pour le formateur 2', '2015-02-22 5:24:52', '1');

INSERT INTO trainers(further_informations, create_date, create_uid) VALUES ('Des informations pour le formateur 3', '2015-02-22 5:24:52', '1');

INSERT INTO trainers(further_informations, create_date, create_uid) VALUES ('Des informations pour le formateur 4', '2015-02-22 5:24:52', '1');

-- insertion pour les formateurs externe
INSERT INTO trainers_externs(hourly_rate, trainer_id) VALUES ('5.2', '1');

INSERT INTO trainers_externs(hourly_rate, trainer_id) VALUES ('5.2', '2');

INSERT INTO trainers_externs(hourly_rate, trainer_id) VALUES ('5.2', '3');

INSERT INTO trainers_externs(hourly_rate, trainer_id) VALUES ('5.2', '4');

INSERT INTO trainers_externs(hourly_rate, trainer_id) VALUES ('5.2', '5');

-- insertion pour les niveaux
INSERT INTO levels(note, appreciation, matter_id, trainer_id) VALUES ('0', 'Un texte', '1', '1');

INSERT INTO levels(note, appreciation, matter_id, trainer_id) VALUES ('1', 'Un texte', '2', '2');

INSERT INTO levels(note, appreciation, matter_id, trainer_id) VALUES ('2', 'Un texte', '3', '3');

INSERT INTO levels(note, appreciation, matter_id, trainer_id) VALUES ('3', 'Un texte', '4', '4');

INSERT INTO levels(note, appreciation, matter_id, trainer_id) VALUES ('4', 'Un texte', '5', '5');

-- insertion pour les timesheets
INSERT INTO timesheets(month, year, total_hours, trainer_id, formation_session_id) VALUES ('4', '2015', '140', '1', '1');

INSERT INTO timesheets(month, year, total_hours, trainer_id, formation_session_id) VALUES ('4', '2015', '140', '2', '2');

INSERT INTO timesheets(month, year, total_hours, trainer_id, formation_session_id) VALUES ('4', '2015', '140', '3', '3');

INSERT INTO timesheets(month, year, total_hours, trainer_id, formation_session_id) VALUES ('4', '2015', '140', '4', '4');

INSERT INTO timesheets(month, year, total_hours, trainer_id, formation_session_id) VALUES ('4', '2015', '140', '5', '5');

-- insertion pour les stages d'entreprise
INSERT INTO company_internship(trainee_id, company_id, internship_id, active, total_hours, date_begin, date_end) VALUES ('1', '1', '1', '1', '122', '2015-02-22 11:21:50', '2015-03-21 11:21:50');

INSERT INTO company_internship(trainee_id, company_id, internship_id, active, total_hours, date_begin, date_end) VALUES ('2', '2', '2', '1', '141', '2015-02-22 11:21:50', '2015-03-21 11:21:50');

INSERT INTO company_internship(trainee_id, company_id, internship_id, active, total_hours, date_begin, date_end) VALUES ('3', '3', '3', '1', '134', '2015-02-22 11:21:50', '2015-03-21 11:21:50');

INSERT INTO company_internship(trainee_id, company_id, internship_id, active, total_hours, date_begin, date_end) VALUES ('4', '4', '4', '1', '122', '2015-02-22 11:21:50', '2015-03-21 11:21:50');

INSERT INTO company_internship(trainee_id, company_id, internship_id, active, total_hours, date_begin, date_end) VALUES ('5', '5', '5', '1', '120', '2015-02-22 11:21:50', '2015-03-21 11:21:50');
