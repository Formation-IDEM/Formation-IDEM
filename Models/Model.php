<?php

abstract class Model
{
	protected $_table = '';
	protected $_fields = array();
	
	public function __construct()
	{
		
	}
	
	public function load($id)
	{
		include_once('Database.php');
		
		$query = Database::getInstance()->getResults('SELECT * FROM '.$this->_table.' WHERE id='.$id);
		
		foreach($query as $key => $value){
			if(array_key_exists($key, $this->_fields)){
				$this->_fields[$key] = $value;
			}
		}
		
		return $this;
	}
	
	public function store($donnees)
	//Renseigne le model
	{
		foreach($donnees as $key => $value){
			if(array_key_exists($key, $this->_fields)){
				$this->_fields[$key] = $value;
			}
		}
		
		return $this;
	}
	
	public function save()
	//Renseigne la BDD
	{
		
		include_once('Database.php');
		Database::getInstance()->getLastInsertId($this->_table);
		
		
		//Si n'existe pas : --------------------------->   INSERT   <--------------------------------------
		if($this->_fields['id'] == 0){

			$query = 'INSERT INTO '.$this->_table.' (';
			
			$i = 1;
			
			foreach($this->_fields as $key => $value){
				
				if($i != count($this->_fields)){
				
					$query .= $key.', ';
				}else{
					
					$query .= $key;
				}
			
				$i++;
			}
			
			$query .= ') VALUES (';
			
			$i = 1;
			
			foreach($this->_fields as $key => $value){
				
				//Si int
				if(!is_string($value)){
					//Si n'est pas le dernier
					if($i != count($this->_fields)){
					
						$query .= $value.', ';
					}else{
						
						$query .= $value;
					}
					
				//Si string
				}else{
					if($i != count($this->_fields)){
					
						$query .= '`'.$value.'`, ';
					}else{
						
						$query .= '`'.$value.'`';
					}	
				}
				
				$i++;
				
			}
			
			$query .= ')';
			
			echo "</br></br>".$query;
			
			if(Database::getInstance()->getResults($query)){
				$this->_fields['id'] = Database::getInstance()->getLastInsertId($this->_table);
				return $this;
			}else{
				return false;
			}
		
		//Si existe : --------------------------->   UPDATE   <--------------------------------------
		}else{
			
			$query = 'UPDATE '.$this->_table.' SET ';
			
			$i = 1;
			
			foreach($this->_fields as $key => $value){
				
				//Si int
				if(!is_string($value)){
						
					//Si n'est pas le dernier	
					if($i != count($this->_fields)){
					
						$query .= $key.' = '.$value.', ';
					}else{
						
						$query .= $key.' = '.$value;
					}
				}
				//Si string
				else{
					//Si n'est pas le dernier	
					if($i != count($this->_fields)){
					
						$query .= $key.' = `'.$value.'`, ';
					}else{
						
						$query .= $key.' = `'.$value.'`';
					}
					
				$i++;
					
				}	
			}
			
			$query .= 'WHERE id='.$this->_fields['id'];
			
			if(Database::getInstance()->getResults($query)){
				return $this;
			}else{
				return false;
			}	
		}
	}
	
	public function delete()
	{
		include_once('Database.php');
		
		$query = Database::getInstance()->getResults('DELETE FROM '.$this->_table.' WHERE id='.$this->_fields['id']);
		
		return $query;
	}
	
	public function getData($key)
	{
		if(array_key_exists($key, $this->_fields)){
			return $this->_fields[$key];
		}else{
			return '';
		}
	}
}

?>