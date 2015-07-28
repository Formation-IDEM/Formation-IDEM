<?php

	include once('model.php');

	class internship extends Model
	{
		protected $_company = null;
		private $_id;
		private	$_entitle;
		private	$_description;
		private	$_stageLevel;
		private	$_stageReferent;
		private	$_availability;
		private	$_validity;
		private	$_pay;				//remunération bool
		private	$_wage;
		private	$companyId;				//salaire
		
		public function	__construct()
		{
			parent::__construct();
		}
		
				
		public function getCompany()	//recupere les instances de la classe company
		{
			if(!$this->_company)
			{
				$this->_company = App::getModel("Company")->load($this->getData("Company"));
			}
			return $this->_company;
		}
		
	}

?>