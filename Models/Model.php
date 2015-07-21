<?php

<<<<<<< HEAD
class Model{
		
	public function __construct(){
		
	}
=======
abstract class Model
{
	public function __construct(){}
	
	public function load($object) // charge un objet depuis la bdd
	{
		$query = 'SELECT * FROM ';
		foreach($results as $result)
		{
			
		}
	}
	
	function store() // associe un retour de form (post) sur un objet
	
	function save() // enregistre l'objet en bdd
	
	function delete() // supprime un objet en bdd
	
>>>>>>> 459d5f36845054875cd6af5310157fd8db4d92e7
}

?>