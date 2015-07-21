<?php

class FamilyStatus {
	
	private $_id;
	private $_wording;	
	
	public function __construct (
		$id = 0 ,
		$wording = "" ) {
			
	}
				
	
	public function getFamilyStatus(){
		return $this -> _wording;
	}	
	
	public function setFamilyStatus($wording) {
		$this -> _wording = $wording;
		return $this;
	}
}

?>