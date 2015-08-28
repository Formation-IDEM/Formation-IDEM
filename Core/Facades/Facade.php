<?php
namespace Core\Facades;

/**
 * Class Facade
 * @package Core\Facades
 */
abstract class Facade
{
    //  Instance de la façade
    protected static $_instance;

    /**
     * Retourne notre façade testée
     *
     * @return mixed
     * @throws FacadeException
     */
    public static function getFacadeRoot()
    {
        return static::resolveFacadeInterface(static::getFacadeAccessor());
    }

    /**
     * Retourne la façade associée
     *
     * @throws FacadeException
     */
    protected static function getFacadeAccessor()
    {
        throw new FacadeException('La façade n\'implémente pas de méthode getFacadeAccessor');
    }

    /**
     * Teste la façade et retourne le bon élément
     *
     * @param $name
     * @return mixed
     */
    protected static function resolveFacadeInterface($name)
    {
        if( is_object($name) )
        {
            return $name;
        }

        return static::$_instance[$name];
    }

    /**
     * Nettoie une façade
     *
     * @param $name
     */
    public static function clearInstance($name)
    {
        unset(static::$_instance[$name]);
    }

    /**
     *  Nettoie toutes les façades
     */
    public static function clearInstances()
    {
        static::$_instance = [];
    }

    /**
     * Appelle les méthodes statiques
     *
     * @param $method
     * @param $args
     * @return mixed
     */
    public static function __callStatic($method, $args)
    {
        $instance = static::getFacadeRoot();

        switch( count($args) )
        {
            case 0:
                return $instance->$method();

            case 1:
                return $instance->$method($args[0]);

            case 2:
                return $instance->$method($args[0], $args[1]);

            case 3:
                return $instance->$method($args[0], $args[1], $args[2]);

            case 4:
                return $instance->$method($args[0], $args[1], $args[2], $args[3]);

            default:
                return call_user_func_array([$instance, $method], $args);
        }
    }
}
