<?php
namespace Core;

use Core\Factories\CollectionFactory;
use \Core\Layout;
use \Core\Factories\ModelFactory;
use \Core\Factories\MiddlewareFactory;

/**
 * Class Controller
 *
 * @package App\Controllers
 */
class Controller
{
	protected $model;
	protected $data = [];
	protected $middlewares = [];

	public function __construct()
	{
		//	On charge les middlewares si il y en a
		MiddlewareFactory::loadMiddlewares($this->middlewares);

		//	On charge le layout
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
	 * Attribue un modèle au controller
	 *
	 * @param $model
	 */
	public function loadModel($model)
	{
		if( is_null($this->$model) )
		{
			$this->$model = ModelFactory::loadModel($model);
		}
	}

	/**
	 * Attribue une collection au controller
	 *
	 * @param $collection
	 */
	public function loadCollection($collection)
	{
		if( is_null($this->{$collection . 'Collection'}) )
		{
			$this->{$collection . 'Collection'} = CollectionFactory::loadCollection($collection);
		}
	}
}