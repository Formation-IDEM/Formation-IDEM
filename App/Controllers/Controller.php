<?php
namespace App\Controllers;

use Core\Layout;
class Controller
{
	protected $data = [];

	public function __construct()
	{
		if( empty($this->data['title']) || is_null($this->data['title']) )
		{
			$methods = get_class_methods(get_called_class());
			$this->data['title'] = ucfirst($methods[1]);
		}

		$this->layout = Layout::getInstance();
	}

	/**
	 * @return \Core\Layout
	 */
	public function layout()
	{
		return $this->layout;
	}

	/**
	 * Détermine le titre de la méthode appelée
	 *
	 * @param $title
	 */
	public function setTitle($title)
	{
		$this->data['title'] = $title;
	}

	/**
	 * Récupère le titre de la méthode
	 *
	 * @return mixed
	 */
	public function getTitle()
	{
		return $this->data['title'];
	}
}