<?php 
	
include_once('Trainer.php');

class TrainerExtern extends Trainer
{
	protected $_table;
	
	protected $_fields;
		
	public function __construct()
	{
		parent:: __construct();
		$this->_fields['id'] = '0';
		
		$this->_table = 'trainers_externs';
		
		$this->_fields['hourly_rate'] = 1;
	}
	
}

?>