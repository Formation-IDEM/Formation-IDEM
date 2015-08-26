<?php
namespace Core;

/**
 * Class Session
 *
 * @package Core
 */
class Session
{
	private static $_instance;

	public function __construct()
	{

	}

	public static function getInstance()
	{
		if( is_null(self::$_instance) )
		{
			self::$_instance = new Session();
		}
		return self::$_instance;
	}

	/**
	 * Définit une valeur à une clé de session
	 *
	 * @param $key
	 * @param $value
	 */
	public function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	/**
	 * Récupère une clé de session
	 *
	 * @param $key
	 * @return null
	 */
	public function get($key)
	{
		return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
	}

	/**
	 * Détermine si une clé de session existe
	 *
	 * @param $key
	 * @return bool
	 */
	public function has($key)
	{
		return isset($_SESSION[$key]);
	}

	/**
	 * Supprime une clé de session
	 *
	 * @param $key
	 */
	public function void($key)
	{
		unset($_SESSION[$key]);
	}

	/**
	 * Termine la session
	 *
	 * @return bool
	 */
	public function destroy()
	{
		return session_destroy();
	}

	/**
	 * Crée une variable flash avec un type spécifique
	 *
	 * @param $key
	 * @param $value
	 */
	public function setFlash($key, $value)
	{
		$_SESSION['flash'][$key] = $value;
	}

	/**
	 * Récupère une variable flash
	 *
	 * @param string $type
	 * @return string
	 */
	public function getFlashMessage($type)
	{
		if( isset($_SESSION['flash'][$type]) )
		{
			$return = $_SESSION['flash'][$type];
			unset($_SESSION['flash']);
			return $return;
		}
		return null;
	}

	public function getFlashType()
	{
		$type = array_keys($_SESSION['flash']);
		return $type[0];
	}
}