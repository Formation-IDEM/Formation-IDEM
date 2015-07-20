<?php

//================================= Include class person ============================

include_once ('Person.php');

//================================= Class trainee fille de class person =============

class Trainee extends Person {

	CONST TYPE = "student";//une constante qui est liée à la class mais non spécifique à une instance

	private static $_trainee_number = 0;//initialisation de la variable
	private $_pole_emploi_number; 
	private $_correspondant; 
	private $_remuneration_type_id;
	private $_study_level_id;
	private $_trainee_status_id;
	
	
	// Fonction construction de la classe trainee
	
	public function __construct (
		$id = 0 ,
		$name = "" ,
		$firstname = "" ,
		$phone = 0 ,
		$cellphone = 0 ,
		$mail = "" ,
		$birthday = "" ,
		$birthplace = "" ,
		$gender = "" ,
		$adress_off_street = "" ,
		$adress_off_complement = "" ,
		$adress_off_codpost = 0 ,
		$adress_off_city = "" ,
		$adress_form_street = "" ,
		$adress_form_complement = "" ,
		$adress_form_codpost = 0 ,
		$adress_form_city = "" ,
		$social_security_number = 0 ,
		$photo = "" ,
		$numero_pole_emploi = "" ,
		$correspondant = "" ) {
			
		$this -> _pole_emploi_number = $pole_emploi_number;
		$this -> _correspondant = $correspondant;
		
		parent::__construct ($id,
		$name,
		$firstname,
		mail,
		$birthday,
		$phone,
		$cellphone,
		$birthplace,
		$gender,
		$adress_off_street,
		$adress_off_complement,
		$adress_off_codpost,
		$adress_off_city,
		$adress_form_street,
		$adress_form_complement,
		$adress_form_codpost,
		$adress_form_city,
		$social_security_number,
		$photo);
		
		self::$_trainee_number++;  //incrementation du nombre de stagiaire
	}

//================================= Fonctions de la class ===========================
	
	public function load($id) {
		
	}

	public function store() {
		
	}
	
//================================= Pole emploi number ===============================
 	
	public function getPoleEmploiNumber(){
		return $this ->_pole_emploi_number;
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
