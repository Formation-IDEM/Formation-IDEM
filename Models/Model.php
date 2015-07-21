
<?php

abstract class Model{
	
	public function __construct(){
		
	}
	
	public function load($id){ // charge un objet depuis la bdd
		var_dump($id);
		$query = 'SELECT * FROM ' .$this->_table. 'WHERE id='.$id;
		return $query;
	}
	
	public function store($table){// associe un retour de form (post) sur un objet
		
	
	} 
	public function save(){// enregistre l'objet en bdd
		
	} 
	
	public function delete(){// supprime un objet en bdd
		
	} 
	
}


?>
