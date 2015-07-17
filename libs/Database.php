<?php

/**
 * Database.php
 */
abstract class Database
{
	protected $db_name;
	protected $db_user;
	protected $db_pass;
	protected $db_host;

	public function __construct($db_host, $db_name, $db_user, $db_pass)
	{
		$this->db_host = $db_host;
		$this->db_name = $db_name;
		$this->db_user = $db_user;
		$this->db_pass = $db_pass;
	}

	abstract public function getConnexion();

	abstract public function query($statement, $attributes = [], $one = false);

	abstract public function fetch($statement, $one = false);
}