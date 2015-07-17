<?php

abstract class Person{
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
		return $this->_name = $newName;
	}
	
// ############################ FIRSTNAME ###############################
	
	public function getFirstName(){
		return $this->_firstName;
	}
	
	public function setFirstName($newFirstName){
		return $this->_firthName = $newFirstName;
	}

// ############################ PHONE ###############################

	public function getPhone(){
		return $this->_phone;
	}
	
	public function setPhone($newPhone){
		return $this->_phone = $newPhone;
	}

// ############################ CELLPHONE ###############################

	public function getCellphone(){
		return $this->_cellphone;
	}
	
	public function setCellphone($newCellphone){
		return $this->_cellphone = $newCellphone;
	}

// ############################ MAIL ###############################
	
	public function getMail(){
		return $this->_mail;
	}
	
	public function setMail($newMail){
		return $this->_mail = $newMail;
	}

// ############################ BIRTHDAY ###############################
	
	public function getBirthday(){
		return $this->_birthday;
	}
	
	public function setBirthday($newBirthday){
		return $this->_birthday = $newBirthday;
	}

// ############################ BIRTHPLACE ###############################
	
	public function getBirthPlace(){
		return $this->_birthPlace;
	}
	
	public function setBirthPlace($newBirthPlace){
		return $this->_birthPlace = $newBirthPlace;
	}

// ############################ GENDER ###############################
	
	public function getGender(){
		return $this->_gender;
	}
	
	public function setGender($newGender){
		return $this->_gender = $newGender;
	}
	
// ############################ ADDRESS OFF STREET ###############################	
	
	public function getAddressOffStreet(){
		return $this->_address_off_street;
	}
	
	public function setAddressOffStreet($newAddressOffStreet){
		return $this->_address_off_street = $newAddressOffStreet;
	}

// ############################ ADDRESS OFF COMPLEMENT ###############################	
	
	public function getAddressOffComplement(){
		return $this->_address_off_complement;
	}
	
	public function setAddressOfComplement($newAddressOffComplement){
		return $this->_address_off_complement = $newAddressOffComplement;
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
		return $this->_address_off_city = $newAddressOffCity;
	}

// ############################ ADDRESS FORM STREET ###############################	
	
	public function getAddressFormStreet(){
		return $this->_address_form_street;
	}
	
	public function setAddressFormStreet($newAddressFormStreet){
		return $this->_address_form_street = $newAddressFormStreet;
	}

// ############################ ADDRESS FORM COMPLEMENT ###############################	
	
	public function getAddressFormComplement(){
		return $this->_address_form_complement;
	}
	
	public function setAddressFormComplement($newAddressFormComplement){
		return $this->_address_form_complement = $newAddressFormComplement;
	}

// ############################ ADDRESS FORM CODPOST ###############################	

	public function getAddressFormCodpost(){
		return $this->_address_form_codpost;
	}
	
	public function setAddressFormCodpost($newAddressFormCodpost){
		return $this->_address_form_codpost = $newAddressFormCodpost;
	}

// ############################ ADDRESS FORM CITY ###############################	
	
	public function getAddressFormCity(){
		return $this->_address_form_city;
	}
	
	public function setAddressFormCity($newAddressFormCity){
		return $this->_address_form_city = $newAddressFormCity;
	}

// ############################ SOCIAL SECURITY NUMBER ###############################	
	
	public function getSocialSecurityNumber(){
		return $this->_social_security_number;
	}
	
	public function setSocialSecurityNumber($newSocialSecurityNumber){
		return $this->_social_security_number = $newSocialSecurityNumber;
	}

// ############################ PHOTO ###############################	
	
	public function getPhoto(){
		return $this->_photo;
	}
	
	public function setPhoto($newPhoto){
		return $this->_photo = $newPhoto;
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