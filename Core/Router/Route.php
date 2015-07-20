<?php
/**
 * Route.php
 */

namespace Core\Router;

use \Core\Factories\ControllerFactory;
use \App\Exceptions\RouterException;

class Route
{
	private $path;
	private $callable;
	private $matches;
	private $params = [];

	public function __construct($path, $callable)
	{
		$this->path = trim($path, '/');
		$this->callable = $callable;
	}

	/**
	 * Associe une condition à la route (regex)
	 *
	 * @param $param
	 * @param $regex
	 * @return $this
	 */
	public function with($param, $regex)
	{
		$this->params[$param] = str_replace('(', '(?:', $regex);
		return $this;
	}

	/**
	 * Vérifie que la route est en adéquation avec le(s) paramètre(s)
	 *
	 * @param $url
	 * @return bool
	 */
	public function match($url)
	{
		$url = trim($url, '/');
		$path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'], $this->path);
		$regex = "#^$path$#i";
		if( !preg_match($regex, $url, $matches) )
		{
			return false;
		}
		array_shift($matches);
		$this->matches = $matches;
		return true;
	}

	/**
	 * Applique les Regex pour le callback
	 *
	 * @param $match
	 * @return string
	 */
	private function paramMatch($match)
	{
		if( isset($this->params[$match[1]]) )
		{
			return '(' . $this->params[$match[1]] . ')';
		}
		return '([^/]+)';
	}

	/**
	 * Retourne l'action demandée
	 *
	 * @return mixed
	 * @throws \App\Exceptions\RouterException
	 */
	public function call()
	{
		if( is_string($this->callable) )
		{
			$params = explode('@', $this->callable);
			$controller = ControllerFactory::createController($params[0]);

			//	On vérifie que la méthode existe
			if( !method_exists($controller, $params[1]) )
			{
				throw new RouterException('La méthode ' . $params[1] . 'n\'existe pas.');
			}

			//	On retourne le controller avec ses paramètres
			return call_user_func_array([$controller, $params[1]], $this->matches);
		}
		else
		{
			//	On retourne la closure
			return call_user_func_array($this->callable, $this->matches);
		}
	}

	/**
	 * Retourne l'url formatée
	 *
	 * @param $params
	 * @return mixed|string
	 */
	public function getUrl($params)
	{
		$path = $this->path;
		foreach( $params as $k => $v )
		{
			$path = str_replace(":$k", $v, $path);
		}
		return $path;
	}
}