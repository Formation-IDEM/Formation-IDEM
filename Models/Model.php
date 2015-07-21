<?php  

include_once('Database.php');

abstract class Model{
		
		
	
	public function load($id){
		
		$table = $this -> _table;
	
	
		$connexion = Database::getInstance() -> getConnexion();
		
		//$resultats = $connexion -> query("SELECT * FROM".$table."WHERE id=".$id);
		
		$result = Database::getInstance() -> getResultats("SELECT * FROM " .$table." WHERE id=".$id);
		
		
		foreach($result as $key => $value){
			
			if(array_key_exists($key,$this -> fields)){
				
				$this -> fields[$key] = $value;
			}
			
		}
		
		return $this;
		
		
		
	}
	
	protected function store($table){
		
		
	}
	
	protected function save(){
		
		
	}
	
	public function delete(){
		
		$result = Database::getInstance() -> getResulats("DELETE FROM " .$this->table." WHERE id=".$this->_fields['id']);
		
		return $result;
		
		
	}
	
	
	
} 