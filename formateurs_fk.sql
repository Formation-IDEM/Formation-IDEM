/* Mise en place des clées étrangères */
/* ATTENTION : La table matiere, formation, session_formation doivent êtres créées d'abord ! */
ALTER TABLE trainers_externs ADD CONSTRAINT fk_trainers_externs FOREIGN KEY (trainer_id) REFERENCES trainers(id);
ALTER TABLE levels ADD CONSTRAINT fk_matters_levels FOREIGN KEY (matter_id) REFERENCES matters(id);
ALTER TABLE levels ADD CONSTRAINT fk_trainers_levels FOREIGN KEY (trainer_id) REFERENCES trainers(id);
ALTER TABLE timesheets ADD CONSTRAINT fk_formations_sessions_timesheets FOREIGN KEY (formation_session_id) REFERENCES formations_sessions(id);
