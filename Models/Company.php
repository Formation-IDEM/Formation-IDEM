<?php

	include once('model.php');

	class company extends Model	
	{
		protected $_internship = null;
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
		
		
		
		public function __construct()
		{
			parrent::__construct();
		}
		
		
		public function getIntenrship()	//recupere les instances de la classe intenship
		{
			if(!$this->_internship)
			{
				$this->_internship = App::getModel("Internship")->load($this->getData("internship"));
			}
			return $this->_Internship;
		}
		
	}

?>