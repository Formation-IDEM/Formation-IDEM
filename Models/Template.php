<?php
	// Dispatcheur
	// URL -> index.php -> App -> Controller A -> Traitement
	// L'instance App est toujours unique -> donc on passe par le singleton (On ne veut qu'une et une seule instance)
	// Donc le construteur est en privÃ©
	

class Template {

	private static $_instance;

	private $_fileName='index';
	private $_datas;
	/*
	 *
	 */
	private function __construct() {
	}

	/* Fonction pour récupérer une seule et unique instance de App */
	
	public static function getInstance() {
		if( ! self::$_instance ) {
			self::$_instance = new Template();
		}
		return self::$_instance;
	}

	/* Fonction set nom du fichier */
	
	public function setFilename($filename) {
		$this -> _fileName = $filename;
		return $this;
	}
	
	public function setDatas($datas) {
		$this -> _datas = $datas;
		return $this;
	}
	
	public function render(){ // fait le lien entre le fichier filename 
		extract($this->_datas);    // converti un tableau en sous-variable
		if( file_exists( dirname(dirname(__FILE__)) . '/Views/' . $this->_fileName.'.phtml' )) {
			include_once (dirname(dirname(__FILE__)) . '/Views/' . $this->_fileName.'.phtml');
		}
	}
}
	

?>