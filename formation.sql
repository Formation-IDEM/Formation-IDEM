CREATE TABLE formation	(
	id SERIAL PRIMARY KEY, 
	title VARCHAR,
	average_effective INT,
	convention_hour_center TIME,
	convention_hour_compagny TIME,
	deal_code VARCHAR,
	order_giver VARCHAR,
	deal_begin_date DATE,
	deal_ending_date DATE
);

CREATE TABLE session_formation 	(
	formation_id INT PRIMARY KEY,
	begin_date DATE,
	ending_date DATE,
	FOREIGN KEY (formation_id) REFERENCES formation(id)
);

CREATE TABLE ref_pedago(
	formation_id INT,
	matter_id INT,
	PRIMARY KEY (formation_id, matiere_id),
	FOREIGN KEY (formation_id) REFERENCES formation(id),
	FOREIGN KEY (matiere_id) REFERENCES matiere(id)
);
