<?php

/**
 * Manager.php
 */
class Manager extends Person
{
	private $company_id;

	public function __construct()
	{
		parent::__construct();
	}

	public function fullName()
	{
		return $this->name;
	}
}