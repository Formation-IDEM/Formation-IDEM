<?php
    class Formation extends Model{
    	
		protected $_refPedago = null;
		protected $_formation_session = null;
		protected $_matters = array();
		
		protected $_table = "formations";
		protected $_fields = array(
									'id' 							=> 0,
									'title' 						=> '',
									'average_effective' 			=> 0,
									'convention_hour_center'		=> 0,
									'convention_hour_company' 		=> 0,
									'deal_code' 					=> '',
									'order_giver' 					=> ''
		
		);
        
        public function __construct()
        {
            $this->_fields['deal_begin_date'] = date('Y-m-d', time());
            $this->_fields['deal_ending_date'] = date('Y-m-d', time());
        }
		
		public function getTable(){
			
			return $this -> _table;
		}
		
		//permet de récuperé la collection des reférence pédagogique
		public function getRefPedago()
		{
			if(!$this->_refPedago)
			{
				$this->_refPedago = App::getCollection('refPedago')->where('formations_id', $this->getData('id'))->all();
			}
			return $this->_refPedago;
		}

		public function getMatters()
		{
			if(!$this->_matters)
			{
				foreach($this->getRefPedago() as $refPedago)
				{
					$this->_matters[] = $refPedago->getMatter();
				}
			}
			return $this->_matters;
		}

		public function setRefPedago($a){
			
			$this -> _ref_pedago = $a;
			
			return $this;
			
		}
		//permet de récuperé la collection des formations session------
		public function getFormationSessions(){
			
			if($this->_formation_session){
				
				return $this -> _formation_session;
			}
			
		}
		public function setFormationSessions($a){
			
			$this -> _formation_session = $a;
			
			return $this;
			
		}
    }
    
?>