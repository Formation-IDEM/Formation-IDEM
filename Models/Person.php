<?php

abstract class Person {
	private $_name;
	private $_firstName;
	private $_phone;
	private $_cellphone;
	private $_mail;
	private $_birthday;
	private $_birthPlace;
	private $_gender;
	private $_address_off_street;
	private $_address_off_complement;
	private $_address_off_codpost;
	private $_address_off_city;
	private $_address_form_street;
	private $_address_form_complement;
	private $_address_form_codpost;
	private $_address_form_city;
	private $_social_security_number;
	private $_photo;
	private $_nationality_id;
	private $_family_status_id;

	public function __construct(){

	}
	
// ############################ NAME ###############################

	public function getName(){
		return $this->_name;
	}
	
	public function setName($newName){
		$this->_name = $newName;
		return $this;
	}
	
// ############################ FIRSTNAME ###############################
	
	public function getFirstName(){
		return $this->_firstName;
	}
	
	public function setFirstName($newFirstName){
		$this->_firthName = $newFirstName;
		return $this;
	}

// ############################ PHONE ###############################

	public function getPhone(){
		return $this->_phone;
	}
	
	public function setPhone($newPhone){
		$this->_phone = $newPhone;
		return $this;
	}

// ############################ CELLPHONE ###############################

	public function getCellphone(){
		return $this->_cellphone;
	}
	
	public function setCellphone($newCellphone){
		$this->_cellphone = $newCellphone;
		return $this;
	}

// ############################ MAIL ###############################
	
	public function getMail(){
		return $this->_mail;
	}
	
	public function setMail($newMail){
		$this->_mail = $newMail;
		return $this;
	}

// ############################ BIRTHDAY ###############################
	
	public function getBirthday(){
		return $this->_birthday;
	}
	
	public function setBirthday($newBirthday){
		$this->_birthday = $newBirthday;
		return $this;
	}

// ############################ BIRTHPLACE ###############################
	
	public function getBirthPlace(){
		return $this->_birthPlace;
	}
	
	public function setBirthPlace($newBirthPlace){
		$this->_birthPlace = $newBirthPlace;
		return $this;
	}

// ############################ GENDER ###############################
	
	public function getGender(){
		return $this->_gender;
	}
	
	public function setGender($newGender){
		$this->_gender = $newGender;
		return $this;
	}
	
// ############################ ADDRESS OFF STREET ###############################	
	
	public function getAddressOffStreet(){
		return $this->_address_off_street;
	}
	
	public function setAddressOffStreet($newAddressOffStreet){
		$this->_address_off_street = $newAddressOffStreet;
		return $this;
	}

// ############################ ADDRESS OFF COMPLEMENT ###############################	
	
	public function getAddressOffComplement(){
		return $this->_address_off_complement;
	}
	
	public function setAddressOfComplement($newAddressOffComplement){
		$this->_address_off_complement = $newAddressOffComplement;
		return $this;
	}

// ############################ ADDRESS OFF CODPOST ###############################	
	
	public function getAddressOffCodpost(){
		return $this->_address_off_codpost;
	}
	
	public function setAddressOfCodpost($newAddressOffCodpost){
		return $this->_address_off_codpost = $newAddressOffCodpost;
	}

// ############################ ADDRESS OFF CITY ###############################	
	
	public function getAddressOffCity(){
		return $this->_address_off_city;
	}
	
	public function setAddressOfCity($newAddressOffCity){
		$this->_address_off_city = $newAddressOffCity;
		return $this;
	}

// ############################ ADDRESS FORM STREET ###############################	
	
	public function getAddressFormStreet(){
		return $this->_address_form_street;
	}
	
	public function setAddressFormStreet($newAddressFormStreet){
		$this->_address_form_street = $newAddressFormStreet;
		return $this;
	}

// ############################ ADDRESS FORM COMPLEMENT ###############################	
	
	public function getAddressFormComplement(){
		return $this->_address_form_complement;
	}
	
	public function setAddressFormComplement($newAddressFormComplement){
		$this->_address_form_complement = $newAddressFormComplement;
		return $this;
	}

// ############################ ADDRESS FORM CODPOST ###############################	

	public function getAddressFormCodpost(){
		return $this->_address_form_codpost;
	}
	
	public function setAddressFormCodpost($newAddressFormCodpost){
		$this->_address_form_codpost = $newAddressFormCodpost;
		return $this;
	}

// ############################ ADDRESS FORM CITY ###############################	
	
	public function getAddressFormCity(){
		return $this->_address_form_city;
	}
	
	public function setAddressFormCity($newAddressFormCity){
		$this->_address_form_city = $newAddressFormCity;
		return $this;
	}

// ############################ SOCIAL SECURITY NUMBER ###############################	
	
	public function getSocialSecurityNumber(){
		return $this->_social_security_number;
	}
	
	public function setSocialSecurityNumber($newSocialSecurityNumber){
		$this->_social_security_number = $newSocialSecurityNumber;
		return $this;
	}

// ############################ PHOTO ###############################	
	
	public function getPhoto(){
		return $this->_photo;
	}
	
	public function setPhoto($newPhoto){
		$this->_photo = $newPhoto;
		return $this;
	}
	
// ############################ NATIONALITY ID ###############################	
	
	public function getNationality(){
		$nationality = new Nationality();
		$nationality->load($this->_nationality_id);
		return $nationality;
	}
	
	public function setNationality($nationality_id){
		$this->_nationality_id = $nationality_id;
		return $this;
	}
	
	
// ############################ FAMILY STATUS ID ###############################	
	
	public function getFamilyStatus(){
		$family_status = new $FamilyStatus();
		$family_status->load($this->_family_status_id);
		return $family_status;
	}
	
	public function setFamilyStatus($family_status_id){
		$this->_family_status_id = $family_status_id;
		return $this;
	}
	
}

?>