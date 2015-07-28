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
				'postal_Code'=> '',
				'city'=> '',
				'country'=> '',
				'phone'=> '',
				'mobile'=> '',
				'fax'=> '',
				'manager'=>'',
				'create_date'=> '',
				'update_date'=> '',
				'create_uid'=> 0,
				'update_uid'=> 0,
				'visit_date'=>'',
				'active'=> false,
		
		);
		
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