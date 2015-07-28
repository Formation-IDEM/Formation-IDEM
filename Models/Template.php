<?php

	/**
	 * Template 
	 */
	// include_once ('Model.php');
	class Template /*extends Model*/{
		
		private static $_instance = null;
		protected $_fileName = 'index';
		protected $_datas = array();
		
		private function __construct() {
			
		}
		
		public function render(){
			
			extract($this->_datas);
			
			if (file_exists( dirname(dirname(__FILE__)).'/Views/'.$this->_fileName.'.phtml')) {
				include_once(dirname(dirname(__FILE__)).'/Views/'.$this->_fileName.'.phtml');
			}else{
				echo "Template introuvable";
			}
			
		}
		
		public function setTemplate($fileName){
			
			$this->_fileName = $fileName;
			return $this;
			
		}
		
		public function getTemplate(){
			return $this->_fileName;
		}
		
		public function setDatas($datas){
			$this->_datas = $datas;
			return $this;
		}
		
		public function getInstance(){
			if (!self::$_instance) {
					
				self::$_instance = new Template();
		
			}
		
			return self::$_instance;
		}
	}
	
?>	