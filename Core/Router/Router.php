<?php
/**
 * Router.php
 */
namespace Core\Router;

use \App\App;
use \App\Exceptions\RouterException;

class Router
{
	private $url;
	private $routes = [];
	private $namedRoutes = [];

	public function __construct($url)
	{
		$this->url = $url;
	}

	public function get($path, $callable, $name = null)
	{
		return $this->add($path, $callable, $name, 'GET');
	}

	public function post($path, $callable, $name = null)
	{
		return $this->add($path, $callable, $name, 'POST');
	}

	private function add($path, $callable, $name, $method)
	{
		$route = new Route($path, $callable);
		$this->routes[$method][] = $route;

		if( is_string($callable) && $name === null )
		{
			$name = $callable;
		}

		if( $name )
		{
			$this->namedRoutes[$name] = $route;
		}
		return $route;
	}

	public function run()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if( !isset($this->routes[$method]) )
		{
			throw new RouterException('La méthode n\'existe pas');
		}

		foreach( $this->routes[$method] as $route )
		{
			if( $route->match($this->url) )
			{
				return $route->call();
			}
		}
		throw new RouterException('Aucune route correspondante');
	}

	public function url($name, $params = [])
	{
		if( !isset($this->namedRoutes[$name]) )
		{
			throw new RouterException('Aucune route ne correspond à ce nom');
		}
		return $this->namedRoutes[$name]->getUrl($params);
	}
}