<?php

/**
 * Company.php
 */
class Company extends Model
{
	protected $table = 'companies';

	public $id;
	private $_name;				// Nom de l'entreprise
	private $_status;				//	Statut juridique
	private $_companyName;		//	Raison sociale
	private $_adress;
	private $_city;
	private $_country;
	private $_postalCode;
	private $_phone;
	private $_fax;
	private $_email;
	private $_managerId;			//	Dirigeant de l'entreprise
	private $_dateVisited;
	private $_siret;

	public $data = [];

	public function __construct()
	{

	}
}
