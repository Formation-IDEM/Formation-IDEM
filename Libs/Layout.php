<?php

/**
 * Layout.php
 */
class Layout
{
	private $path;
	private static $_instance;

	public function __construct($path = 'Views')
	{
		$this->path = $path;
	}

	public static function getInstance()
	{
		if( is_null(self::$_instance) )
		{
			self::$_instance = new Layout();
		}
		return self::$_instance;
	}

	/**
	 * @param $file
	 * @throws \LayoutException
	 */
	public function render($file)
	{
		ob_start();
		if( !is_file(ROOT . 'Views/' . $file . '.php') )
		{
			throw new LayoutException('Le layout' . $file . 'n\'existe pas.');
		}
		require_once(ROOT . 'Views/' . $file . '.php');

		$content = ob_get_clean();
		require_once(ROOT . 'Views/layout.php');
	}
}