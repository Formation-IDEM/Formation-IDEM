<?php

	class Template {

		private static $_instance = null;
		protected $_fileName = 'index';
		protected $_datas = array();

		private function __construct() {

		}


		public function getInstance(){
			if (!self::$_instance) {

				self::$_instance = new Template();

			}

			return self::$_instance;
		}

		public function getTemplate(){
			return $this->_fileName;
		}

		public function setTemplate($fileName){

			$this->_fileName = $fileName;
			return $this;

		}

		public function setDatas($datas){
			$this->_datas = $datas;
			return $this;
		}

		public function render(){

			extract($this->_datas);

			if(file_exists("Views/".$this->_fileName.".phtml")){

				include_once("Views/".$this->_fileName.".phtml");

			}else if(file_exists("Views/Company/".$this->_fileName.".phtml")){

				include_once("Views/Company/".$this->_fileName.".phtml");

			}
			else{
				echo "Template introuvable";
			}
		}
	}

?>	