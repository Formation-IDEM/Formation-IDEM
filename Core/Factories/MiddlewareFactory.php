<?php
namespace Core\Factories;

use \Core\Config;

class MiddlewareFactory
{
    /**
     * Charge un middleware
     *
     * @param $middleware
     * @return mixed
     */
    public static function loadMiddleware($middleware)
    {
        $cfg = Config::getInstance('middlewares');
        $className = '\\App\\Middlewares\\' . ucfirst($cfg->get($middleware)) . 'Middleware';
        return new $className();
    }

    /**
     * Charge un tableau de middlewares
     *
     * @param $middlewares
     * @return bool
     */
    public static function loadMiddlewares($middlewares)
    {
        if( !empty($middlewares) )
        {
            $cfg = Config::getInstance('middlewares');
            foreach( $middlewares as $middleware )
            {
                $middlewareName = '\\App\\Middlewares\\' . ucfirst($cfg->get($middleware)) . 'Middleware';
                $middlewareName->handle();
            }
        }

        return true;
    }

}
