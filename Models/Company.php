<?php

/**
 * Company.php
 */
class Company
{
	private	$_id;
	private $_name;				//nom de l'entreprise
	private	$_status;			//statut legal de l'entreprise
	private	$_adress;
	private	$_codePost;
	private	$_town;
	private	$_country;
	private	$_fax;
	private	$_phone;
	private	$_mail;
	private	$_companyName;		//raison sociale
	private	$_managerID;
	private	$_siret;
	private 	$_stageId;

	public function __construct()
	{

	}

	public function __set($key, $value)
	{
		$this->{$key} = $value;
		return $this;
	}

	public function __get($key)
	{
		return $this->{$key};
	}
}