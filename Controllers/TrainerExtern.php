<?php 
	
include_once('Trainer.php');

class TrainerExtern extends Trainer{
	
	private $_hourlyRate;
	
	public function __construct(){
		
		parent:: __construct();
		
	}
	
	public function getHourlyRate(){
		
		return $this->_hourlyRate;
		
	}
	
	public function setHourlyRate($hourlyRate){
		
		$this->_hourlyRate = $hourlyRate;
		return $this;
		
	}
	
}


 ?>