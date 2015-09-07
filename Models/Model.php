<?php

/**
 * Class Model
 */
class Model
{
	protected $_table = '';
	protected $_fields = array();

	public function __construct()
	{

	}

	/**
	 * Permet de charger les champs de l'objet
	 *
	 * @param null $id
	 * @return $this
	 */
	public function load($id = null)
	{
		if($id != null)
		{
			$query = 'SELECT * FROM '.$this->_table.' WHERE id = '.$id;
			$results = Database::getInstance()->getResults($query);
			if($results != null)
			{
				foreach($results[0] as $field => $value)
				{
					if(array_key_exists($field, $this->_fields))
					{
						$this->_fields[$field] = $value;
					}
				}
			}
		}
		return $this;
	}

	/**
	 * Associe un retour de formulaire à l'objet
	 *
	 * @param $array
	 * @return $this
	 */
	public function store($array)
	{
		foreach($array as $field => $value)
		{
			if(array_key_exists($field, $this->_fields))
			{
				$this->_fields[$field] = $value;
			}
		}
		return $this;
	}

	/**
	 * Permet d'enregistrer l'objet en base de donnée
	 *
	 * @return $this
	 */
	public function save()
	{
		if( $this->_fields['id'] != null || $this->_fields['id'] != 0 ) // -> UPDATE (déjà stocké)
		{
			$set = null;
			foreach($this->_fields as $field => $value)
			{
				if($value != null) // Si l'attribut a une valeur null
				{
					$set .= $field.' = :'.$field.', ';
					$attributes[':'.$field] = $value;
				}
			}
			// On retire la virgule et l'espace du dernier field et value
			$set = substr($set,0,-2);
			
			// On crée la query finale
			$query = 
			$query = 'UPDATE '.$this->_table.' SET '.$set.' WHERE id = '.$this->_fields['id'].';';
			
			// Execution de la requête
			$db = Database::getInstance();
			//$db->getResults($query);
			$db->prepare($query, $attributes);
			var_dump($db->getErrors());
			echo $query;
		}
		else // -> INSERT (pas encore stocké)
		{
			$fields = $values = null;
			foreach($this->_fields as $field => $value)
			{
				if($field != 'id') // car il est auto-incrémenté
				{
					if($value != null) // Si l'attribut a une valeur null
					{
						$fields .= $field.', ';
						$values .= ':'.$field.', ';
						$attributes[':'.$field] = $value;
					}
				}
			}
			// On retire la virgule et l'espace du dernier field et value
			$fields = substr($fields,0,-2);
			$values = substr($values,0,-2);
			
			// On crée la query finale
			$query = 'INSERT INTO '.$this->_table.' ('.$fields.') VALUES ('.$values.');';
			echo $query;
			
			// Execution de la requête
			$db = Database::getInstance();
			//$db->getResults($query);
			$db->prepare($query, $attributes);
			var_dump($db->getErrors());
			$errors = $db->getErrors();
			if($errors[2] == null)
			{
				// Récupération de l'id inséré
				$lastInsertId = $db->getLastInsertId($this->_table);
				$this->_fields['id'] = $lastInsertId;
			}
			
		}
		return $this;
	}

	/**
	 * Permet de supprimer un objet en base de donnée
	 *
	 * @return array
	 */
	public function delete() // supprime un objet en bdd
	{
		$query = 'DELETE FROM '.$this->_table.' WHERE id = '.$this->_fields['id'];
		
		// Execution de la requête
		$db = Database::getInstance();
		return $db->getResults($query);
	}


	/**
	 * Permet de récupérer l'élément de l'objet
	 *
	 * @param $field
	 * @return string
	 */
	public function getData($field)
	{
		if(array_key_exists($field, $this->_fields))
		{
			return $this->_fields[$field];			
		}
		else
		{
			return '';
		}
	}

	/**
	 * Permet de setter un élément dans les champs
	 *
	 * @param $field
	 * @param $data
	 * @return $this
	 */
	public function setData($field, $data)
	{
		if(array_key_exists($field, $this->_fields))
		{
			$this->_fields[$field] = $data;
		}
		return $this;
	}

	/**
	 * Setter
	 *
	 * @param $key
	 * @param $value
	 * @return $this
	 */
	public function __set($key, $value)
	{
		return $this->setData($key, $value);
	}

	/**
	 * Getter
	 *
	 * @param $key
	 * @return mixed
	 */
	public function __get($key)
	{
		return $this->getData($key);
	}

	public function getDate( $code ) 
	{
        if( isset($this->_fields[$code]) )
        {    
            $date = strtotime( $this->_fields[$code] );
            return date("d/m/Y",$date);
        }
        return;
    }
}