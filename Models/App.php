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
		$url = isset($_GET['c']) ? htmlspecialchars($_GET['c']) : 'front';
		$action = isset($_GET['a']) ? htmlspecialchars($_GET['a']) : 'index';

		//	On récupère le controller
		$controller = ucfirst($url) . 'Controller';
		require_once( ROOT . 'Controllers/ErrorController.php');
		if( file_exists(ROOT . 'Controllers/' . $controller . '.php') )
		{
			require_once(ROOT . 'Controllers/' . $controller . '.php');
		}

		//	On vérifie que la classe existe
		if( !class_exists($controller) )
		{
			$controller = new ErrorController();
		}
		$controller = new $controller();

		//	On vérifie que la méthode existe
		if( !method_exists($controller, $action) )
		{
			$error = new ErrorController();
			return $error->show404();
		}
		return $controller->$action();
	}
}