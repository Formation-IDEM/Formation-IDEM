<?php
class Autoloader
{

    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    /**
     * Inclut le fichier correspondant à notre classe
     * @param $class string : le nom de la classe à charger
     */
    public static function autoload($class)
    {
        if( file_exists('Core/' . ucfirst($class) . '.php') )
        {
            include_once('Core/' . ucfirst($class) . '.php');
        }
        else if( file_exists('./Models/' . ucfirst($class) . '.php') )
        {
            include_once('./Models/' . ucfirst($class) . '.php');
        }
        else if( file_exists('./Controllers/' . ucfirst($class) . '.php') )
        {
            include_once('./Controllers/' . ucfirst($class) . '.php');
        }
    }
}
