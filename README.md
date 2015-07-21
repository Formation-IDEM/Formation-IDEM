# Formation-IDEM
Repository for the IDEM group

Structure de l'application :

	Models/
	
	Views/
	
	Controllers/
	
	Design/
		
		css/
		
		images/
			
		js/

#Le noms des tables, en Anglais, au pluriel
exemple : formation_sessions

#Les foreign key doivent être construites avec le nom de la table, puis l'ID
pour une plus grande lisibilité via le REFERENCES
exemple : FOREIGN KEY (formations_id) REFERENCES formations(id)
