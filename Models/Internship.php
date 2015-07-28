<?php

	include once('model.php');

	class Internship extends Model
	{
		
		
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