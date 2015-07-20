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

	public function run()
	{
		echo 'hello world';
	}
}