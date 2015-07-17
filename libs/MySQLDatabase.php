<?php
/**
 * MySQLDatabase.php
 */
class MySQLDatabase extends Database
{
	protected $pdo;

	protected $db_name;
	protected $db_user;
	protected $db_pass;
	protected $db_host;

	public function __construct($db_host, $db_name, $db_user, $db_pass)
	{
		parent::__construct($db_host, $db_name, $db_user, $db_pass);
	}

	public function getConnexion()
	{
		if( is_null($this->pdo) )
		{
			$pdo = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host, $this->db_user, $this->db_pass);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo = $pdo;
		}
		return $this->pdo;
	}

	public function query($statement, $attributes = [], $one = false)
	{

	}

	public function fetch($statement, $one = false)
	{

	}
}