<?php

class FeuillePresence{
	
	private $_month;
	
	private $_year;
	
	private $_totalHours;
	
	public function __construct($_mois, $_annee, $_totalHeures){
		
	}

// ############################ MONTH ###############################

	public function getMonth(){
		return $this->_month;
	}
	
	public function setMonth($newMonth){
		return $this->_month = $newMonth;
	}

// ############################ YEAR ###############################
	
	public function getYear(){
		return $this->_year;
	}
	
	public function setYear($newYear){
		return $this->_year = $newYear;
	}

// ############################ TOTAL HOURS ###############################
	
	public function getTotalHours(){
		return $this->_totalHours;
	}
	
	public function setTotalHours($newTotalHours){
		return $this->_totalHours = $newTotalHours;
	}
}

?>