<?php
namespace App\Controllers;

use \Core\Layout;
use \Core\Factories\ModelFactory;
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

		//	Si le modèle n'est pas défini on tente d'en attribuer un
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
		return ModelFactory::loadModel($this->model);
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