<?php

include_once('Controllers/Database.php');

abstract class Model
{
	public function __construct(){}
	
	public function load($id = null) // charge un objet depuis la bdd
	{
		if($id != null)
		{
			$query = 'SELECT * FROM '.$this->_table.' WHERE id = '.$id;
			$results = Database::getInstance()->getResults($query);
			if($results != null)
			{
				foreach($results[0] as $columnName => $value)
				{
					if(array_key_exists($columnName, $this->_fields))
					{
						$this->_fields[$columnName] = $value;
					}
				}				
			}
		}
		return $this;
	}
	
	function store($array) // associe un retour de form (post) sur un objet
	{
		foreach($array as $key => $value)
		{
			if(array_key_exists($key, $this->_fields))
			{
				$this->_fields[$key] = $value;
			}
		}
	}
	
	function save() // enregistre l'objet en bdd
	{
		if($this->_fields['id'] != null) // -> UPDATE (déjà stocké)
		{
			$set = null;
			foreach($this->_fields as $field => $value)
			{
				if($value != null) // Si l'attribut a une valeur null
				{
					$set .= $field.' = \''.$value.'\', ';
				}
				else
				{
					$set .= $field.' = NULL, ';
				}
			}
			// On retire la virgule et l'espace du dernier field et value
			$set = substr($set,0,-2);
			
			// On crée la query finale
			$query = 'UPDATE '.$this->_table.' SET '.$set.' WHERE id = '.$this->_fields['id'].';';
			
			// Execution de la requête
			$db = Database::getInstance();
			$db->getResults($query);
		}
		else // -> INSERT (pas encore stocké)
		{
			$fields = $values = null;
			foreach($this->_fields as $field => $value)
			{
				if($field != 'id') // car il est auto-incrémenté
				{
					$fields .= $field.', ';
					if($value != null) // Si l'attribut a une valeur null
					{
						$values .= '\''.$value.'\', ';
					}
					else
					{
						$values .= 'NULL, ';
					}
				}
			}
			// On retire la virgule et l'espace du dernier field et value
			$fields = substr($fields,0,-2);
			$values = substr($values,0,-2);
			
			// On crée la query finale
			$query = 'INSERT INTO '.$this->_table.' ('.$fields.') VALUES ('.$values.');';
			
			// Execution de la requête
			$db = Database::getInstance();
			$db->getResults($query);
			
			// Récupération de l'id inséré
			$lastInsertId = $db->getConnection()->lastInsertId($this->_table.'_id_seq');
			$this->_fields['id'] = $lastInsertId;
		}
		return $this;
	}
	
	function delete() // supprime un objet en bdd
	{
		$query = 'DELETE FROM '.$this->_table.' WHERE id = '.$this->_fields['id'];
		
		// Execution de la requête
		$db = Database::getInstance();
		return $db->getResults($query);
	}
	
	
	// Getter pour tous les objets
	public function getData($key)
	{
		if(key_array_exists($this->_fields,$key))
		{
			return $this->_fields[$key];			
		}
		else
		{
			return '';
		}
	}
	
	// Setter pour tous les objets
	public function setData($key, $data)
	{
		if(key_array_exists($this->_fields,$key))
		{
			$this->_fields[$key] = $data;
		}
		return $this;
	}
}

?>