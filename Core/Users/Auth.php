<?php
namespace Core\Users;
/**
 * Auth.php
 */
use \Core\Session;

class Auth
{
	private $isLogged = false;

	public function __construct()
	{
		if( Session::keyExists('is_logged') && Session::get('is_logged') )
		{
			$this->isLogged = true;
		}
	}

	public function attempt($email, $password)
	{
		if( $this->isLogged() )
		{
			App::getInstance()->response()->redirect('index.php');
		}
	}

	public function logout()
	{
		if( $this->isLogged )
		{
			Session::destroy();
			App::getInstance()->response()->redirect('index.php');
		}
	}

	public function register($email, $password)
	{
		if( $this->isLogged() )
		{
			App::getInstance()->response()->redirect('index.php');
		}
	}
}