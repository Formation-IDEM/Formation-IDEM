<?php
namespace Core;

use \Core\Factories\ModelFactory;
use \Core\Factories\MiddlewareFactory;

/**
 * Class Controller
 *
 * @package App\Controllers
 */
class Controller
{
	protected $middlewares = [];

	public function __construct()
	{
		$this->layout = Layout::getInstance();
		MiddlewareFactory::loadMiddlewares($this->middlewares);
	}

	/**
	 * @return \Core\Layout
	 */
	public function layout()
	{
		return $this->layout;
	}

	/**
	 * Permet de charger un modèle
	 *
	 * @param $model
	 */
	public function loadModel($model)
	{
		$model = strtolower($model);
		$this->$model = ModelFactory::loadModel($model);
	}
}