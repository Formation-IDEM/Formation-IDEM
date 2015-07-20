<?php
namespace App\Controllers;

use \App\App;
use \Core\Layout;
class Controller
{
	protected $model;
	protected $data = [];

	public function __construct()
	{
		if( empty($this->data['title']) || is_null($this->data['title']) )
		{
			$methods = get_class_methods(get_called_class());
			$this->data['title'] = ucfirst($methods[1]);
		}

		if( empty($this->model) )
		{
			$model = get_called_class();
			$model = str_replace('Controller', '', $model);
			$this->model = $model;
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
	 * Retourne le modèle du controller
	 *
	 * @return mixed
	 */
	public function model()
	{
		$className = '\\App\\Models\\' . ucfirst($this->model) . 'Model';
		return new $className(App::getInstance()->getDB());
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