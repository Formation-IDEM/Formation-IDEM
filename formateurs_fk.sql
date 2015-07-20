/* Mise en place des clées étrangères */
/* ATTENTION : La table matiere, formation, session_formation doivent êtres créées d'abord ! */
ALTER TABLE trainer_extern ADD CONSTRAINT fk_trainer_extern FOREIGN KEY (trainer_id) REFERENCES trainer(id);
ALTER TABLE level ADD CONSTRAINT fk_matter_level FOREIGN KEY (matter_id) REFERENCES matter(id);
ALTER TABLE level ADD CONSTRAINT fk_trainer_level FOREIGN KEY (trainer_id) REFERENCES trainer(id);
ALTER TABLE timesheet ADD CONSTRAINT fk_formation_session_timesheet FOREIGN KEY (formation_session_id) REFERENCES formation_session(id);
