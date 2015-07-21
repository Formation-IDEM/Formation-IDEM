CREATE TABLE matters
(
	id SERIAL PRIMARY KEY,
	title VARCHAR
);

<<<<<<< HEAD
=======
CREATE TABLE formation_sessions
(
	id SERIAL PRIMARY KEY,
	formations_id INT PRIMARY KEY,
	begin_date DATE NOT NULL, -- date début d'une session de formation
	ending_date DATE NOT NULL -- date fin de sesion de formation
);

>>>>>>> master
/* 2 tables, et c'est tout !, si vous avez un problème voyez ça avec Thierry ;) */