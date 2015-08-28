<?php 
	
include_once('Trainer.php');

class TrainerExtern extends Trainer
{
		
	public function __construct()
	{
		parent:: __construct();
		$this->_table = 'trainers_externs';
		
		$this->_fields['id'] = 0;
		
		$this->_fields['hourly_rate'] = 9.61;
	}
	
}

?>