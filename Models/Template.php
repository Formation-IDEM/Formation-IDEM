<?php

// Inlus par App.php

class Template
{
	private static $_instance;
	private $_filename;
	private $_datas;	
	
	public function __construct()
	{
		$this->_filename = 'index';
		$this->_datas = array();
	}

	/**
	 * Singleton
	 *
	 * @return Template
	 */
	public static function getInstance()
	{
		if(!self::$_instance)
		{
			self::$_instance = new Template();
		}
		return self::$_instance;
	}

	/**
	 * Détermine le nom du fichier à appeler
	 *
	 * @param $filename
	 * @return $this
	 */
	public function setFilename($filename)
	{
		$filename = str_replace('.', '/', $filename);
		$this->_filename = $filename;
		
		return $this;
	}

	/**
	 * Associe un tableau de valeur au template
	 *
	 * @param $datas
	 * @return $this
	 */
	public function setDatas($datas)
	{
		$this->_datas = $datas;
		return $this;
	}

	/**
	 * Génère le template
	 */
	public function render()
	{
		extract($this->_datas);
<<<<<<< HEAD
		if(file_exists('Views/' . $this->_filename . '.phtml')){
=======
		if(file_exists('Views/' . ucfirst($this->_filename) . '.phtml')){
>>>>>>> 305bc1bcc96c8095a1564632f3c5d56523c74bc4
			include_once('Views/Layouts/header.phtml');			
			include_once('Views/' . ucfirst($this->_filename) . '.phtml');
			include_once('Views/Layouts/footer.phtml');			
		}
		else
		{
			echo 'Le template ' . $this->_filename . ' est introuvable';
		}
	}
}
