<?php


class Model {

	protected $_table = '';
	
	protected $_fields = array();

	public function __construct() {
		
	}

	
	
	public function getData( $code ) {
		if( isset($this->_fields[$code]) ) {
			return $this->_fields[$code];
		}
		return '';
	}

	/*
	 * charge un objet depuis la bdd
	 */
	public function load($id) {
		$results = Database::getInstance()->getResults( "SELECT * FROM " . $this->_table . " WHERE id = " . $id );
		foreach( $results as $columName => $data ) {
			if( array_key_exists($columName, $this->_fields) ) {
				$this->_fields[$columName] = $data;
			}
		}
		return $this;
	}
	
	/*
	 * associe un retour de form (post) sur un objet
	 */
	function store($donnes) {
		foreach( $donnes as $columName => $data ) {
			if( array_key_exists($columName, $this->_fields) ) {
				$this->_fields[$columName] = $data;
			}
		}
		return $this;
	}
	
	/*
	 * enregistre l'objet en bdd
	 */
	function save() {
		if( $this->getData('id') ) { // Mise à jour
			$request = "UPDATE " . $this->_table . " SET ";
			$i = 1;
			foreach( $this->_fields as $columnName => $value ) {
				$request .= $columnName . " = ";
				if( is_string($value) ) {
					$request .= "'" . $value . "'";
				} else {
					$request .= $value;
				}
				if( $i != sizeof($this->_fields) ) {
					$request .= ', ';
				}
				$i++;
			}
			$request .= " WHERE id = " . $this->getData('id');
			return Database::getInstance()->getResults( $request );
			
		} else { // Création
			$request = "INSERT INTO " . $this->_table . " ";
			$i = 1;
			$columns = '';
			$values = '';
			foreach( $this->_fields as $columnName => $value ) {
				$columns .= $columnName;
				if( is_string($value) ) {
					$values .= "'" . $value . "'";
				} else {
					$values .= $value;
				}
				if( $i != sizeof($this->_fields) ) {
					$columns .= ', ';
					$values .= ', ';
				}
				$i++;
			}
			$request .= "(" . $columns . ") VALUES (" . $values . ")"; 
			return Database::getInstance()->getResults( $request );
		}
	}
	
	/*
	 * supprime un objet en bdd
	 */
	function delete() {
		if( $this->getData('id') ) {
			return Database::getInstance()->getResults( "DELETE FROM " . $this->_table . " WHERE id = " . $this->getData('id') );
		}
		return false;
	}


}

?>