<?php

//================================= Include class person ============================

include_once ('Person.php');


//================================= Class trainee fille de class person =============

class Trainee extends Person {

	protected $_table = "trainees";
	protected $_fields = array (
			'id'=>0 ,
			'name' => "" ,
			'firstname' => "" ,
			'birthday' => "" ,
			'birthplace' => "" ,
			'gender' => "" ,
			'adress_off_street' => "" ,
			'adress_off_complement' => "" ,
			'adress_off_codpost' => 0 ,
			'adress_off_city' => "" ,
			'adress_form_street' => "" ,
			'adress_form_complement' => "" ,
			'adress_form_codpost' => 0 ,
			'adress_form_city' => "" ,
			'phone' => 0 ,
			'mail' => "" ,
			'cellphone' => 0 ,
			'social_security_number' => 0 ,
			'photo' => "" ,
			'remuneration_type_id' => 0,
			'status_trainee_id' => 0,
			'study_levels_id' => 0,
			'family_status_id' => 0,
			'nationality_id' => 0,
			'create_date' => "",
			'update_date' => "",
			'create_uid' => 0,
			'update_uid' => 0,
			'active' => 0
	);
	
	// Fonction construction de la classe trainee
	
	public function __construct ()
	{
		
		parent::__construct();
	}

//================================= Fonctions de la class ===========================
	
	public function load($id) {
		
	}

	public function store() {
		
	}
	
//================================= Pole emploi number ===============================
 	
	public function getPoleEmploiNumber(){
		return $this ->_fields['_pole_emploi_number'];
	}
	
	public function setPoleEmploiNumber($poleemploinumber){
		$this -> _pole_emploi_number = $poleEmploiNumber;
		return $this;
	}

//================================= Correspondant ==================================== 
	
	public function getCorrespondant(){
		return $this ->_correspondant;
	}
	
	public function setCorrespondant($correspondant){
		$this -> _correspondant = $correspondant;
		return $this;
	}

//================================= Fonction compteur ================================ 

	public function getCompteur(){
		return self::$_trainee_number;
	}
	
	public function inscription() {
		$a='hello';
		return $a;
	}

//==================================================================================== 
// Fonction chargement du niveau d'étude

	public function getStudyLevel() {
//		$StudyLevel = new StudyLevel();
//		$StudyLevel -> load ($this -> StudyLevel_id);
//		return $StudyLevel;
	}

//==================================================================================== 
// Fonction chargement du type de rémunération

	public function getRemunerationType() {
//		$remunerationtype = new RemunerationType();
//		$remunerationtype -> load ($this -> remunerationtype_id);
//		return $remunerationtype;
	}

//==================================================================================== 
// Fonction chargement du statut de l'étudiant

	public function getTraineeStatus() {
//		$traineestatus = new traineestatus();
//		$traineestatus -> load ($this -> traineestatus_id);
//		return $traineestatus;
	}

}
?>
