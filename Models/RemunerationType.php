<?php

include_once('Models/Model.php');

class RemunerationType extends Model
{	
	protected $_table;
	
	protected $_fields;
	
	public function __construct () 
	{
		$this->_fields['id'] = '0';
		
		$this->_fields['wording'] = 'none';
		
		$this->_table = 'remuneration_type';
	}
}

?>