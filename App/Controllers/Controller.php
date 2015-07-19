<?php
namespace App\Controllers;

class Controller
{
	private $title;

	public function __construct()
	{
		if( empty($this->title) || is_null($this->title) )
		{
			$methods = get_class_methods(get_called_class());
			$this->title = $methods[0];
		}
	}

	public function render($file)
	{
		ob_start();
		require_once(dirname(__DIR__) . '/Views/' . $file . '.php');
		$content = ob_get_clean();

		$title = $this->getTitle();
		require_once(dirname(__DIR__) . '/Views/tpl/default.php');
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function getTitle()
	{
		return $this->title;
	}
}