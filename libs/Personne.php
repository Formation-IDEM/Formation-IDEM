<?php
/**
 * Personne.php
 */

abstract class Personne
{
	public $id;
	private $nom;
	private $prenom;
	private $email;

	public function __construct($nom, $prenom, $email)
	{
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->email = $email;
	}
}
