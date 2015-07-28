<?php

class Template
{
	private static $_instance;
	protected $_fileName = "index";
	protected $_datas = array();
	
	private function __construct(){
		
	}
	
	public static function getInstance()
	{
		if(!self::$_instance)
		{
			self::$_instance = new Template();
		}
		return self::$_instance;
	}
	
	public function setFilename($newFileName){
		$this->_fileName = $newFileName;
		return $this;
	}
	
	public function setDatas($newDatas){
		$this->_datas = $newDatas;
		return $this;
	}
	
	public function render(){
		
		//Permet d'accéder aux données contenues dans _datas avec des variables (ex: $id, $name, $info...)
		extract($this->_datas);
		
		if(file_exists(dirname(dirname(__FILE__)).'/Views/'.$this->_fileName.".phtml")){
			
			include_once(dirname(dirname(__FILE__)).'/Views/'.$this->_fileName.".phtml");
		
		}else{
		
			echo "Template introuvable";
		
		}
	}	
}

?>
	