<?php 

class Level{
	
	private $_note;
	private $_appreciation;
	private $_trainer_id;
	private $_matter_id;
	
	public function __construct(){
		
	}
	
// ############################ NOTE ###############################	
	
	public function getNote(){
		
		return $this->_note;
		
	}
	
	public function setNote($note){
		
		$this->_note = $note;
		return $this;
		
	}

// ############################ APPRECIATION ###############################
	
// ############################ APPRECIATION ###############################	
	
	public function getAppreciation(){
		
		return $this->_appreciation;
		
	}
	
	public function setAppreciation($appreciation){
		
		$this->_appreciation = $appreciation;
		return $this;
		
	}

// ############################ TRAINER ###############################
	
	public function getTainer(){
		$trainer = new Trainer();
		$trainer->load($this->_trainer_id);
		return $trainer;
	}
	
	public function setTrainer($trainer_id){
		$this->_trainer_id = $trainer_id;
		return $this;
	}
	
// ############################ MATTER ###############################

	public function getMatter(){
		$matter = new Matter();
		$matter->load($this->_matter_id);
		return $matter;
	}
	
	public function setMatter($matter_id){
		$this->load($this->_matter_id);
		return $this;
	}
}
?>