<?php

class RemunerationType {
	
	private $_id;
	private $_wording;	
	
	public function __construct (
		$id = 0 ,
		$wording = "" ) {
			
	}
				
	
	public function getRemunerationType(){
		return $this -> _wording;
	}	
	
	public function setRemunerationType($wording) {
		$this -> _wording = $wording;
		return $this;
	}
}

?>