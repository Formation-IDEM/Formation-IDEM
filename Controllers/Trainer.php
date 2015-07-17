<?php

include_once('Person.php');

class Trainer extends Person
{
	// Constructeur
	public function __construct()
	{
		$this->_furtherInformations = 'Vide';
	}
	
	// Attributs
	private $_furtherInformations;
	
	// Getters & Setters
	public function getFurtherInformations()
	{
		return $this->_furtherInformations;
	}
	
	public function setFurtherInformations($furtherInformations)
	{
		$this->_furtherInformations = $furtherInformations;
		return $this;
	}
}

?>