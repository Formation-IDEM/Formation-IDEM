<?php

class TraineeSession {
	
	private $_id;
	private $_lesson_study_hours; // Nombre d'heure cumulée du stagiaire pendant la session
	private $_stage_study_hours; // Nombre d'heure cumulée du stagiaire pendant le stage
	private $_formation_session_id;	// identifiant formation session
	private $_trainee_id; // identifiant stagiaire	

	
	public function __construct (
		$id = 0 ,
		$lesson_study_hours = 0 ,
		$stage_study_hours = 0 ,
		$formation_session_id = 0 ,
		$trainee_id = 0) {
		
	}
				
	public function getTrainee(){
		// Recherche le stagiaire par rapport à l'identifiant stagiaire
		// $trainee = new trainee();
		// $trainee -> load($this -> trainee_id);
		// return $trainee
	}	

	public function getFormationSession(){
		// Recherche le stagiaire par rapport à l'identifiant stagiaire
		// $formationsession = new formationsession();
		// $formationsession -> load($this -> formation_session_id);
		// return $formationsession
	}	
	
	public function getLessonStudyHours(){
		return $this -> _lesson_study_hours;
	}	
	
	public function setLessonStudyHours($lesson_study_hours) {
		$this -> _lesson_study_hours = $lesson_study_hours;
		return $this;
	}
	
	public function getStageStudyHours(){
		return $this -> _stage_study_hours;
	}	
	
	public function setStageStudyHours($stage_study_hours) {
		$this -> _stage_study_hours = $stage_study_hours;
		return $this;
	}
}

?>