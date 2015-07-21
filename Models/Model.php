
<?php



abstract class Model{
	
	public function __construct(){
		
	}
	
	public function load($id){ // charge un objet depuis la bdd
	
		include_once('Database.php');
		
		$donnees = Database::getInstance()->getResultats('SELECT * FROM ' .$this->_table. ' WHERE id='.$id);
		
		foreach ($donnees as $key => $value) {
			
			if(array_key_exists($key, $this->fields)){
				$this->_fields[$key] = $value;
			}
			
		}
		
		return $this;
	}
	
	public function store($table){// associe un retour de form (post) sur un objet
		
		
		
	} 
	public function save(){// enregistre l'objet en bdd
	
		//$this->_fields = Database::getInstance()->getResultats();
		
	} 
	
	public function delete(){// supprime un objet en bdd
	
		include_once('Database.php');
		
		$result = Database::getInstance()->getResultats('DELETE FROM ' .$this->_table. ' WHERE id='.$this->_fields['id']);
		
		return $result;
		

	} 
	
	public function getData($cle){
		if(isset($this->_fields[$cle])){
			return $this->_fields[$cle];
		} else {
			return "";
		}
	}
	
}


?>
