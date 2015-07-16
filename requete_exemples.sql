SELECT * FROM lecteur;
SELECT nom FROM lecteur WHERE idole='Stendhal';
SELECT nom_auteur FROM auteur WHERE auteur.nom_auteur NOT IN (SELECT idole FROM lecteur);
SELECT nom FROM lecteur WHERE idole NOT IN (SELECT nom_auteur FROM auteur);
SELECT * FROM auteur 
INNER JOIN lecteur ON lecteur.idole= auteur.nom_auteur;
SELECT * FROM lecteur
INNER JOIN auteur ON auteur.nom_auteur=lecteur.idole;
SELECT * FROM lecteur
LEFT OUTER JOIN auteur ON auteur.nom_auteur=lecteur.idole;
SELECT * FROM auteur 
RIGHT OUTER JOIN lecteur ON lecteur.idole= auteur.nom_auteur;

UPDATE lecteur SET idole ='Baudelaire' WHERE idole ='Stendhal';


SELECT  oeuvre FROM auteur WHERE nom_auteur LIKE 'S%' OR nom_auteur LIKE 's%';
ALTER TABLE lecteur ADD COLUMN prenom VARCHAR (50);
ALTER TABLE auteur ADD COLUMN date DATE;
DELETE TABLE lecteur;
DROP TABLE lecteur;
DROP DATABASE courBdd;
ALTER TABLE oeuvre ADD COLUMN titre VARCHAR (120);

ALTER TABLE oeuvre ADD COLUMN id SERIAL PRIMARY KEY;
ALTER TABLE lecteur ADD COLUMN id SERIAL PRIMARY KEY;

ALTER TABLE lecteur ADD COLUMN fk_oeuvre INT; 
ALTER TABLE lecteur ADD FOREIGN KEY (fk_oeuvre) REFERENCES oeuvre;

INSERT INTO oeuvre (auteur, titre)
VALUES ('sartre', 'les mots'),
('sartre', 'l''être et le néant'),
('stendhal', 'le rouge et le noir'),
('baudelaire', 'les fleurs du mal');

INSERT INTO lecteur (age, idole, prenom, fk_oeuvre)
VALUES (15, 'stendhal', 'corinne', 3),
(17, 'stendhal', 'germaine', 3),
(19, 'hugo', 'justine',NULL),
(21, 'sartre', 'anne', 2);
ALTER TABLE lecteur ADD CHECK (prenom <> '');
ALTER TABLE oeuvre ADD CHECK (titre <> '');

ALTER TABLE lecteur ADD COLUMN nom VARCHAR (50);

CREATE UNIQUE INDEX nom ON lecteur (nom);

ALTER TABLE lecteur ADD CONSTRAINT prenom_inf_15 CHECK (char_lenght(prenom)<15);




