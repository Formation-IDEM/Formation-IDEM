<?php
namespace Core;

/**
 * Class Middleware
 *
 * @package Core
 */
class Middleware
{
	private $middlewares;

	public function __construct()
	{
		$cfg = Config::getInstance('middlewares');
		$this->middlewares = $cfg->getSettings();
	}



}