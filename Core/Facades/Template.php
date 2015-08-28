<?php
namespace Core\Facades;

/**
 * Class Template
 * @package Core\Facades
 */
class Template extends Facade
{
    public static function getFacadeAccessor()
    {
        return \Core\Template::getInstance();
    }
}
