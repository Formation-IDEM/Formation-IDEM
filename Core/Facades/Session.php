<?php
namespace Core\Facades;

/**
 * Class Session
 * @package Core\Session
 */
class Session extends Facade
{
    public static function getFacadeAccessor()
    {
        return session();
    }
}
