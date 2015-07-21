<?php

include_once('Models/Model.php');

class FeuillePresence extends Model
{
	
	private $_month;
	
	private $_year;
	
	private $_totalHours;
	
	private $_trainer_id;
	
	private $_formation_session_id;
	
	public function __construct($_mois, $_annee, $_totalHeures){
		
	}

// ############################ MONTH ###############################

	public function getMonth(){
		return $this->_month;
	}
	
	public function setMonth($newMonth){
		$this->_month = $newMonth;
		return $this;
	}

// ############################ YEAR ###############################
	
	public function getYear(){
		return $this->_year;
	}
	
	public function setYear($newYear){
		$this->_year = $newYear;
		return $this;
	}

// ############################ TOTAL HOURS ###############################
	
	public function getTotalHours(){
		return $this->_totalHours;
	}
	
	public function setTotalHours($newTotalHours){
		$this->_totalHours = $newTotalHours;
		return $this;
	}
	
// ############################ TRAINER ID ###############################	
	
	public function getTrainer(){
		$trainer = new Trainer();
		$trainer->load($this->_trainer_id);
		return $trainer;
	}
	
	public function setTrainer($trainer_id){
		$this->_trainer_id = $trainer_id;
		return $this;
	}

// ############################ FORMATION SESSION ID ###############################	
	
	public function getFormationSession(){
		$formation_session = new FormationSession();
		$formation_session->load($this->_formation_session_id);
		return $formation_session;
	}
	
	public function setFormationSession($formation_session_id){
		$this->_formation_session_id = $formation_session_id;
		return $this;
	}
		

}

?>