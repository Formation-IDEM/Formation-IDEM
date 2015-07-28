<?php

class Nationality {
	
	private $_id;
	private $_wording;	
	
	public function __construct (
		$id = 0 ,
		$wording = "" ) {
			
	}
				
	
	public function getNationality(){
		return $this -> _wording;
	}	
	
	public function setNationality($wording) {
		$this -> _wording = $wording;
		return $this;
	}
}

?>