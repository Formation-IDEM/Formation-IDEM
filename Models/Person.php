<?php

/**
 * 
 */
abstract class Personne {
	
	private $nom;
	private $prenom;
	private $age;
	private $code_postal;
	private $ville;
	
	function __construct($n, $p, $a, $cd, $v) {
	
	$this->nom = $n;
	$this->prenom = $p;
	$this->age = $a;
	$this->code_postal = $cd;
	$this->ville=$v;
		
	}
}
