<?php 

include_once ('personne.php');

/**
 * 
 */
class Entreprise extends personne {
	
	private $statut;
	private $pays;
	private $fax;
	private $telephone;
	private $email;
	private $raison_sociale;
	private $dirigeant;
	private $date_visite;
	private $siret;
	
	public function __construct($n, $p, $a, $cd, $v) {
		
		parent :: __construct($n, $p, $a, $cd, $v);
		
	}
}


