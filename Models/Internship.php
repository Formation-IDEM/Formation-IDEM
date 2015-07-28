<?php

	include once('model.php');

	class internship extends Model
	{
		protected $_company = null;
		protected $_fields = array(
			'id'=> 0,
			'title'=> '',
			'explain'=>'',
			
		
		);
		
		
		public function	__construct()
		{
			parent::__construct();
		}
		
				
		public function getCompany()	//recupere les instances de la classe company
		{
			if(!$this_company)
			{
				$this->_company = App::getModel("company")->load($this->getData("company"));
			}
			return $this->_company;
		}
		
	}



?>

			