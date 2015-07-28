<?php

	include once('model.php');

	class company extends Model	
	{
		protected $_fields = array(
				'id' => 0,
				'name'=> '',
				'status'=> '',
				'company_name',
				'address' => '',
				'postalCode'=> '',
				'city'=> '',
				'country'=> '',
				'phone'=> '',
				'mobile'=> '',
				'fax'=> '',
				'siret'=> '',
				'mobile'=> '',
		
		);
		
		

		private	$_town;
		private	$_country;
		private	$_fax;
		private	$_phone;
		private	$_mail;
		private	$_companyName;		//raison sociale
		private	$_managerID;
		private	$_siret;
		private $_stageId;
		
		public function __construct()
		{
			parrent::__construct();
		}
		
		/*
		public function getIntenrship()	//recupere les instances de la classe intenship
		{
			$intenrship = new Intenrship();
			$intenrship->load($this->stageId);
			return $intenrship;
		}
		*/
	}

?>