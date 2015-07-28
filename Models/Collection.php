<?php

class Collection
{
	protected $_db;
	protected $_modelName;
	protected $_table;
	
	public function __construct()
	{
		$this->_db = Database::getInstance();
	}
	
}
