<?php 

/**
 * class singleton
 */


class Template {
	
	//initialisation de l'instance a null
	private static $_instance = null;
	protected $_filename = "index";
	protected $_datas = array();
	
	private function __construct() {
	
	}
	
	public function setDatas($newDatas){
		
		$this->_datas = $newDatas;
		return $this;
		
	}
	
	public function setFileName($newFilename){
		
		$this->_filename = $newFilename;
		return $this;
		
	}
	
	public function render(){
		
		extract($this->_datas);
		
		if( file_exists( dirname(dirname(__FILE__))."/Views/".$this->_filename.".phtml" ) ){
			include_once( dirname(dirname(__FILE__))."/Views/".$this->_filename.".phtml" );
			
		} else {
			
			echo "Gros nul";
			
		}
			
	}

	public static function getInstance(){
		
		//vérification si l'instance est set
		if(!self::$_instance){
		
			self:: $_instance = new Template();
		
		}
			
		return self:: $_instance;
		
	}
}

?>
