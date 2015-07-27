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
}