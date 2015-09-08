<?php
namespace Core;

/**
 * Class Lang
 * @package Core
 */
class Lang
{
    private $lang;
    private static $_instance;

    /**
     * Charge un fichier de langue
     * @param $file
     */
    public function __construct($file)
    {
        $this->lang = require(dirname(__DIR__) . '/App/Languages/fr/' . $file . '.php');
    }

    /**
     * Instanciation de la classe Lang
     *
     * @param $file
     * @return Lang
     */
    public static function getInstance($file)
    {
        if( is_null(self::$_instance) )
        {
            self::$_instance = new Lang($file);
        }
        return self::$_instance;
    }

    /**
     * Retourne une clé de langue
     *
     * @param $key
     * @return null
     */
    public function get($key)
    {
        if( array_key_exists($key, $this->lang) )
        {
            return $this->lang[$key];
        }
        return null;
    }
}
