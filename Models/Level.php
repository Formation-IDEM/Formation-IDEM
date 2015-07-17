<?php 

class Level{
	
	private $_note;
	private $_appreciation;
	
	public function __construct(){
		
	}
	
	public function getNote(){
		
		return $this->_note;
		
	}
	
	public function setNote($note){
		
		$this->_note = $note;
		return $this;
		
	}
	
	public function getAppreciation(){
		
		return $this->_appreciation;
		
	}
	
	public function setAppreciation($appreciation){
		
		$this->_appreciation = $appreciation;
		return $this;
		
	}
}



 ?>