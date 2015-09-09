<?php

include_once('Models/Database.php');

abstract class Model {


	protected $_table = '';
	protected $_fields = array();

	public function __construct(){

	}

	public function load($id) { // charge un objet depuis la bdd

		if($id != null){

			$query = 'SELECT * FROM '.$this->_table.' WHERE id = '.$id;
			$results = Database::getInstance()->getResultats($query);
			if($results != null){

				foreach($results[0] as $field => $value){

					if(array_key_exists($field, $this->_fields)){

						$this->_fields[$field] = $value;
					}
				}
			}
		}
		return $this;
	}

	/*
	 * $fields = array( 'intership_id' => 1, 'trainee_id' => 23, 'company_id' => 14 ); 
	 */
	public function loadByIds($fields = array()) { // charge un objet depuis la bdd

		if( sizeof($ids) ){

			$query = 'SELECT * FROM '.$this->_table.' WHERE ';
			$i = 1;
			foreach ($fields as $fieldName => $fieldValue ) {
				$query .= $fieldName.' = '.$fieldValue;
				if( $i < sizeof($fields) ) {
					$query .= ' AND ';
				}
				$i++;
			}

			$result = Database::getInstance()->getResult($query);

			if($result != null){

				foreach($result as $field => $value){

					if(array_key_exists($field, $this->_fields)){

						$this->_fields[$field] = $value;
					}
				}
			}
		}
		return $this;
	}

	public function store($array) { // associe un retour de form (post) sur un objet

		foreach($array as $field => $value){

			if(array_key_exists($field, $this->_fields)){

				$this->_fields[$field] = $value;
			}
		}
		
		
		return $this;
	}

	public function save(){ // enregistre l'objet en bdd

		if($this->_fields['id'] != null && $this->_fields['id'] != 0) {// -> UPDATE (déjà stocké)

			$set = null;
			foreach($this->_fields as $field => $value){

				if($value != null){ // Si l'attribut a une valeur null

					$set .= $field.' = \''.$value.'\', ';
				}else{

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
			var_dump($db->getErrors());
			echo $query;
		}else { // -> INSERT (pas encore stocké)

			$fields = $values = null;
			foreach($this->_fields as $field => $value){

				if($field != 'id'){ // car il est auto-incrémenté

					$fields .= $field.', ';

					if($value != null) { // Si l'attribut a une valeur null

						$values .= '\''.$value.'\', ';
					}else{

						$values .= 'NULL, ';
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
			$db->getResults($query);
			//var_dump($db->getErrors());
			$errors = $db->getErrors();
			if($errors[2] == null){

				// Récupération de l'id inséré
				$lastInsertId = $db->getLastInsertId($this->_table);
				$this->_fields['id'] = $lastInsertId;
			}

		}
		return $this;
	}

	public function delete() { // supprime un objet en bdd

		$query = 'DELETE FROM '.$this->_table.' WHERE id = '.$this->_fields['id'];

		// Execution de la requête
		$db = Database::getInstance();
		return $db->getResults($query);
	}


	// Getter pour tous les objets
	public function getData($field){

		if(array_key_exists($field, $this->_fields)){

			return $this->_fields[$field];			
		}else{

			return '';
		}
	}

	// Setter pour tous les objets
	public function setData($field, $data){

		if(array_key_exists($field, $this->_fields)){

			$this->_fields[$field] = $data;
		}
		return $this;
	}


}