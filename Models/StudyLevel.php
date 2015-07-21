<?php

include_once('Models/Model.php');

class StudyLevel extends Model
{
	
	private $_id;
	private $_wording;	
	
	public function __construct (
		$id = 0 ,
		$wording = "" ) {
			
	}
				
	
	public function getStudyLevel(){
		return $this -> _wording;
	}	
	
	public function setStudyLevel($wording) {
		$this -> _wording = $wording;
		return $this;
	}
}

?>