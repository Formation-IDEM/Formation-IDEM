<?php

/**
 * Student.php
 */
class Student extends Person
{
	const TYPE = "student";
 	private static $total = 0;

	public function __construct()
	{
		parent::__construct();
		self::$total++;
	}

	public function fullName()
	{
		return $this->name . ' ' . $this->firstname;
	}

	public function getTotal()
	{
		return self::$total;
	}

}