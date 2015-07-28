<?php

include_once( 'Database.php' );

abstract class Model{
	
	public function __construct(){
		
	}
	
	public function load( $id ){ // charge un objet depuis la bdd
		
		$donnees = Database::getInstance()->getResultats( 'SELECT * FROM ' .$this->_table. ' WHERE id='.$id );
		
		foreach ( $donnees as $key => $value ) {
			
			if( array_key_exists( $key, $this->fields ) ){
				
				$this->_fields[$key] = $value;
				
			}
			
		}
		
		return $this;
	}
	
	public function store( $table ){// associe un retour de form (post) sur un objet
		
		foreach ( $table as $key => $value ) {
			
			if ( array_key_exists( $key, $this->_fields ) ){
			
				$this->_fields = $table;
			}
		}
		
		return $this;
			
	} 
	public function save(){// enregistre l'objet (soit en tant que nouveau soit en tant que mise a jour) en bdd
	
		if( $this->getData('id')){
			
			$requeteUpdate =  'UPDATE ';
			$requeteUpdate.= $this->_table;
			$requeteUpdate.= ' SET ';
			$i = 1;
			foreach ($this->_fields as $key => $value) {
				$requeteUpdate.= $key ." = ";
				
				if( is_string($value) ){
					$requeteUpdate.= "'" . $value . "'";	
				} else {
					$requeteUpdate.= $value;
				}
				
				if ( $i < sizeof( $this->_fields ) ) {
					$requeteUpdate.= ", ";
				}
				$i ++;
			}
			$requeteUpdate.= ' WHERE id=' .$this->getData('id');
			
			if( Database::getInstance()->getResultats($requeteUpdate) ){
				return $this;
			} else {
				return false;
			}		
		
		} else {
			
			$requeteInsert = 'INSERT INTO '.$this->_table.'';
			
			$j = 1;
			$columns = "";
			$valeurs = "";
			foreach ($this->_fields as $key => $value) {
				$columns.= $key;
				if( is_string( $value ) ){
					$valeurs.= "'".$value."'";
				} else {
					$valeurs.= $value;
				}
				if ( $j < sizeof( $this->_fields ) ) {
					$columns.= ", ";
					$valeurs.= ", ";
				}
				$j ++;
			}
			
			$requeteInsert .= ' ( '.$columns.' ) VALUES ( '.$valeurs.' );';
			var_dump($requeteInsert) ;
			echo "coucou";
			
			if(Database::getInstance()->execute($requeteInsert))
			{
				$this->_fields['id'] = Database::getInstance()->getLastInsertId($this->_table);
				var_dump($this->_fields['id']) ;
				return $this;
			} else {
				return false;
			}
			 			
		}
	} 
	
	public function delete(){// supprime un objet en bdd
		
		$result = Database::getInstance()->getResultats( 'DELETE FROM ' .$this->_table. ' WHERE id='.$this->_fields['id'] );
		
		return $result;
		

	} 
	
	public function getData( $cle ){
		if( isset( $this->_fields[$cle] ) ){
			return $this->_fields[$cle];
		} else {
			return "";
		}
	}
	
}


?>
