<?php

abstract class Model
{
	private $_bdd;
	protected $_table;
	protected $_fields = array();
	
	public function __construct()
	{
		
	}
	
	public function load($id) // charge un objet depuis la bdd
	{
		$Data = Database::getInstance()->getresult('SELECT * FROM '. $_table.' WHERE id = '.$id);
		$this->_fields = $Data;
	}
	
	
	//function store() // associe un retour de form (post) sur un objet
	
	//function save() // enregistre l'objet en bdd
	
	public function delete() // supprime un objet en bdd
	{
		
	}
}

?>