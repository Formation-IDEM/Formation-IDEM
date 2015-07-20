<?php

/**
 * App.php
 */
class App
{
	private static $_instance;

	private function __construct()
	{

	}

	/**
	 *	Instanciation de la classe
	 *
	 * @return \App
	 */
	public static function getInstance()
	{
		if( !self::$_instance )
		{
			self::$_instance = new App();
		}
		return self::$_instance;
	}

	/**
	 * Routeur de l'application
	 */
	public function run()
	{
		require_once(ROOT . 'Libs/Autoloader.php');
		Autoloader::register();

		$url = isset($_GET['c']) ? htmlspecialchars($_GET['c']) : 'front';
		$action = isset($_GET['a']) ? htmlspecialchars($_GET['a']) : 'index';

		//	On récupère le controller
		$controller = ucfirst($url) . 'Controller';

		//	On vérifie que la classe existe
		if( !class_exists($controller) )
		{
			throw new AppException('Le controller ' . $controller . ' n\'existe pas.');
		}
		$getController = new $controller();

		//	On vérifie que la méthode existe
		if( !method_exists($controller, $action) )
		{
			throw new AppException('La méthode ' . $action . ' n\'est pas définie dans le controller ' . $controller);
		}
		return $getController->$action();
	}
}