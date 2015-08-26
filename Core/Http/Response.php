<?php
namespace Core\Http;

/**
 * Class Response
 *
 * @package Core\Http
 */
class Response
{
	private static $_instance;
	private $errors = [];

	public static function getInstance()
	{
		if( is_null(self::$_instance) )
		{
			self::$_instance = new Response();
		}
		return self::$_instance;
	}

	/**
	 * Définit un nouveau header
	 *
	 * @param $header
	 */
	public function setHeader($header)
	{
		header($header);
	}

	/**
	 * Etablit une redirection
	 * 
	 * @param $location
	 * @return $this
	 */
	public function redirect($location)
	{
		header('Location:' . $location);
		return $this;
	}

	/**
	 * Récupère les messages
	 *
	 * @return $this
	 */
	public function posts()
	{
		foreach($_POST as $key => $value)
		{
			$_POST[$key] = htmlspecialchars(trim($value));
		}
		return $this;
	}

	/**
	 * Définit les erreurs
	 *
	 * @param $errors
	 * @return $this
	 */
	public function errors($errors)
	{
		$this->errors = $errors;
		return $this;
	}

	public function flash($type, $message)
	{
		session()->setFlash($type, $message);
		return $this;
	}

	public function error($key)
	{
		if( $this->hasError($key) )
		{
			return $this->errors[$key];
		}
		return null;
	}

	public function hasError($key)
	{
		if( array_key_exists($key, $this->errors) )
		{
			return true;
		}
		return false;
	}

	public function getErrors()
	{
		return $this->errors;
	}

	/**
	 * Crée un nouveau cookie
	 *
	 * @param            $name
	 * @param string     $value
	 * @param int        $expire
	 * @param null       $path
	 * @param null       $domain
	 * @param bool|FALSE $secure
	 * @param bool|TRUE  $httpOnly
	 */
	public function setCookie($name, $value = '', $expire = 0, $path = null, $domain = null, $secure = false, $httpOnly = true)
	{
		secookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
	}

	/**
	 * Retourne une page d'erreur spécifique
	 *
	 * @param $code
	 * @return Response
	 */
	public function abort($code)
	{
		switch( $code )
		{
			case '404':
				$this->setHeader('HTTP/1.0 404 Not Found');
				return $this->redirect(ROOT . $code);
			break;

			case '403':
				$this->setHeader('HTTP/1.O 403 Forbidden');
				return $this->redirect(ROOT . $code);

			default:
				return $this->redirect(ROOT . 'index.php');
		}
	}
}