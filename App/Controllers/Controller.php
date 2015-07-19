<?php
namespace App\Controllers;

class Controller
{
	public function __construct()
	{

	}

	public function render($file)
	{
		ob_start();
		require_once(dirname(__DIR__) . '/Views/' . $file . '.php');
		$content = ob_get_clean();

		require_once(dirname(__DIR__) . '/Views/tpl/default.php');
	}
}