<?php
namespace Core\Facades;

/**
 * Class Route
 * @package Core\Facades
 */
class Route extends Facade
{
    protected static function getFacadeAccessor()
    {
        return route();
    }
}