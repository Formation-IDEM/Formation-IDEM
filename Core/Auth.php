<?php

class Auth
{
	protected $firewall;

	private static $_instance;

	// Fonction pour récupérer une seule et unique instance de App
	public static function getInstance()
	{
		if(!self::$_instance)
		{
			self::$_instance = new Auth();
		}
		return self::$_instance;
		self::$_instance->initFirewall();
	}

	public function initFirewall()
	{
		include_once('./config.php');
		$this->firewall = $firewall;
	}

	public function hasPermission()
	{
		if(isset($_GET['c']))
		{
			$controller = $_GET['c'];
		}
		else
		{
			$controller = 'Front';
		}
		if(isset($_GET['a']))
		{
			$action = $_GET['a'];
		}
		else
		{
			$action = 'index';
		}
		$profile = App::profile();
		if(isset($this->firewall[$profile->getRole()->level][$controller]))
		{
			$permissionsArray = $this->firewall[$profile->getRole()->level][$controller];
			if(in_array($action, $permissionsArray))
			{
				return true;
			}
		}
		return false;
	}
}