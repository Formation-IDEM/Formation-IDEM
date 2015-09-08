<?php
namespace Core\Auth;

use Core\Config;
use \Core\Factories\ModelFactory;
use \Core\Database\Database;

/**
 * Class AuthDatabase
 * @package Core\Auth
 */
class AuthDatabase extends Auth
{
	private $db;
	private $user;

	public function __construct(Database $db)
	{
		$this->db = $db;
	}

	/**
	 * Crée une session utilisateur si les logins correspodent
	 *
	 * @param $email
	 * @param $password
	 * @return bool
	 */
	public function login($email, $password)
	{
		$cfg = Config::getInstance('config');
		$user = ModelFactory::loadModel('user')->query(
			'SELECT * FROM users
			WHERE email = :email AND password = :password'
			, [':email' => $email, ':password' => sha1($cfg->get('secret_key') . $password . $cfg->get('secret_key'))], true);

		if( $user )
		{
			session()->set('auth', $user->id);
			session()->set('username', $user->name . ' ' . $user->firstname);
			session()->set('logged', true);
			return true;
		}
		return false;
	}

	/**
	 * Enregistre un utilisateur
	 *
	 * @return bool
	 */
	public function register()
	{
		$cfg = Config::getInstance('config');
		$data = [
			'name'		=>	request()->getPost('name'),
			'firstname'	=>	request()->getPost('firstname'),
			'password'	=>	sha1($cfg->get('secret_key') . request()->getPost('password') . $cfg->get('secret_key')),
			'email'		=>	request()->getPost('email')
		];
		if( ModelFactory::loadModel('user')->store($data)->save() )
		{
			return true;
		}
		return false;
	}

	/**
	 * Détermine si l'utilisateur est connecté
	 *
	 * @return bool
	 */
	public function logged()
	{
		return session()->has('auth');
	}

	/**
	 * Retourne une clé utilisateur
	 *
	 * @param $key
	 * @return mixed
	 */
	public function get($key)
	{
		if( is_null($this->user) )
		{
			$this->user = ModelFactory::loadModel('user')->loadOrFail($this->getID());
		}
		return $this->user->$key;
	}
}