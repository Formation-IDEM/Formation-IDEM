<?php

/**
 * Internship.php
 */
class Internship extends Model
{
	protected $table = 'internships';

	private $id;
	private $name;
	private $companyId;
	private $level;
	private $trainer;
	private $available;
	private $validity;
	private $pay;
	private $wage;

	public function __construct()
	{
		parent::__construct();
	}
}