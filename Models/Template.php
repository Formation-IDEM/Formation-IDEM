<?php


class Template
{
	private static $_instance;
	private $_filename = "index";
	private $_datas = array();
	
	public function __construct()
	{
		
	}
	
	public static function getInstance()
	{
		if(!self::$_instance)
		{
			self::$_instance = new Template();
		}
		return self::$_instance;
	}
	
	public function getTemplate()
	{
		return $this->$_filename;
	}
	
	public function setTemplate($filename)
	{
		$this->_filename = $filename;
		return $this;
	}
	
	public function setDatas($donnees)
	{
		$this->_datas = $donnees;
		return $this;
	}
	
	public function render()
	{
		extract($this->_datas);
		if(file_exists(dirname(dirname(__FILE__))."/Views/" .$this->_filename. ".phtml"))
		{
			include_once(dirname(dirname(__FILE__))."/Views/" .$this->_filename. ".phtml");
		} else {
			echo "erreur";
		}
	}
	
}
