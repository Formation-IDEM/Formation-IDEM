<?php
namespace Core;

use Core\Factories\CollectionFactory;
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
		$this->layout = Template::getInstance();
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
		$this->$model = ModelFactory::loadModel($model);
	}

	/**
	 * Permet de charger une collection
	 *
	 * @param $collection
	 */
	public function loadCollection($collection)
	{
		$this->{$collection . 'Collection'} = CollectionFactory::loadCollection($collection);
	}
}