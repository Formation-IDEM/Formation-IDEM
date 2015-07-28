<?php
	// Dispatcheur
	// URL -> index.php -> App -> Controller A -> Traitement
	// L'instance App est toujours unique -> donc on passe par le singleton (On ne veut qu'une et une seule instance)
	// Donc le construteur est en prive

 include_once('database.php');  
    
    
    class Model  {
    	
		protected $_table = '';
		protected $_fields = array();
    	
    	private function __construct() {
    		
    	}
		
		public function getData($code) {
			if (isset($this->_fields[$code])) {
				return $this->_fields[$code];
			}
			return '';
		}
	
	/* 	Load : charge un enregistrement en fonction de l'id */
		
 		public function load($id) {
		
 			$results = Database::getInstance()->getResultat( "SELECT * FROM " . $this->_table . " WHERE id = " . $id );
			foreach( $results as $columName => $data ) {
				if( array_key_exists($columName, $this->_fields) ) {
					$this->_fields[$columName] = $data;
				}
			}
			return $this;
		}

	/* 	Delete : delete un enregistrement en fonction de l'id */
		
		public function delete() { // on delete sur un objet deja renseigne donc pas besoin de l'id
		
			if( $this->getData('id') ) {
				return Database::getInstance()->getResults( "DELETE FROM " . $this->_table . " WHERE id = " . $this->getData('id') );
			}
			return false;
		}
		
	/* 	Save : Enregistrement soit en modification soit en creation, fields contient tout ce dont a besoin */
		
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
				return Database::getInstance()->execute( $request );
			
			}else { // Création
				$request = "INSERT INTO " . $this->_table . " ";
				$i = 1;
				$columns = '';
				$values = '';
				foreach( $this->_fields as $columnName => $value ) {
					if ($columnName!='id'){
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
					}
					$i++;
				}
				$request .= "(" . $columns . ") VALUES (" . $values . ")"; 
				echo $request;
				return Database::getInstance()->execute( $request );
			}
		}
	
		
	/* 	Store : On charge les données dans les champs  */
		
		public function store($donnes)
		{
			foreach($donnes as $columnName=>$data){
				if (array_key_exists($columnName, $this->_fields)){
					$this->_fields[$columnName] = $data;
				}
			}
			return $this;
		}
	
    }
?>