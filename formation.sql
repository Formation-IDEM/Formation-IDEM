CREATE TABLE formations	(
	id SERIAL PRIMARY KEY, 
	title VARCHAR NOT NULL,
	average_effective INT, -- nombre d'élève par formation
	convention_hour_center TIME NOT NULL, -- nombre d'heures conventionnées en centre
	convention_hour_compagny TIME NOT NULL, --nombre d'heures conventionnées en entreprise 
	deal_code VARCHAR NOT NULL, -- code de marché 
	order_giver VARCHAR, -- donneur d'ordre
	deal_begin_date DATE NOT NULL, -- date début du marché
	deal_ending_date DATE NOT NULL -- date fin de marché
);

CREATE TABLE formation_sessions 	(
	formations_id INT PRIMARY KEY,
	begin_date DATE NOT NULL, -- date début d'une session de formation
	ending_date DATE NOT NULL, -- date fin de sesion de formation
	FOREIGN KEY (formations_id) REFERENCES formations(id)
);

CREATE TABLE ref_pedago(
	formations_id INT,
	matters_id INT,  -- code matiere
	PRIMARY KEY (formations_id, matters_id),
	FOREIGN KEY (formations_id) REFERENCES formations(id),
	FOREIGN KEY (matters_id) REFERENCES matters(id)
);
