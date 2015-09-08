<?php
namespace Core\Auth;

use \AuthDatabase;
use Core\Factories\DatabaseFactory;
use Core\Html\Form;
use Core\Validator;

class Auth
{
	private static $_instance;

	private $authDB;

	protected $userController = 'User';

	public function __construct()
	{
		$this->authDB = new \Core\Auth\AuthDatabase(DatabaseFactory::initDB());
	}

	public static function getInstance()
	{
		if( is_null(self::$_instance) )
		{
			self::$_instance = new Auth();
		}
		return self::$_instance;
	}

	/**
	 * Récupère l'id de l'utilisateur
	 *
	 * @return string|null
	 */
	public function getId()
	{
		if( $this->check() )
		{
			return session()->get('auth');
		}
		return false;
	}

	/**
	 * Tentative de connexion
	 *
	 * @param $email
	 * @param $password
	 * @return mixed
	 */
	public function attempt($email, $password)
	{
		if( $this->check() )
		{
			return redirect('/');
		}

		$validator = new Validator([
			'name'		=>	'required|min:3',
			'email'		=>	'required|email',
			'password'	=>	'required'
		]);
		if( $validator->run() )
		{
			if( $this->authDB->login($email, $password) )
			{
				return redirect(url('/'))->with('success', 'Vous voilà maintenant connecté.');
			}
			$validator->setError('login', 'Nous n\'avons trouvé aucun résultat avec ces identifiants');
		}
		response()->posts()->errors($validator->getErrors());
		return $this->getLogin();
	}

	/**
	 * Déconnexion
	 *
	 * @return $this
	 */
	public function logout()
	{
		if( $this->check() )
		{
			session()->destroy();
		}
		return redirect('/')->flash('success', 'Vous êtes maintenant déconnecté.');
	}

	/**
	 * Tentative d'enregistrement
	 *
	 * @return mixed
	 */
	public function postRegister()
	{
		if( $this->check() )
		{
			return redirect('/');
		}

		$validator = new Validator([
			'name'		=>	'required|min:3',
			'email'		=>	'required|email',
			'password'	=>	'required|confirmed'
		]);
		if( $validator->run() )
		{
			if( $this->authDB->register(request()->all('POST')) )
			{
				return redirect(url('/'))->with('success', 'Vous voilà maintenant enregistré.');
			}
		}
		response()->posts()->errors($validator->getErrors());
		return $this->getRegister();
	}

	/**
	 * Formulaire de connexion
	 *
	 * @return mixed
	 */
	public function getLogin()
	{
		$form = new Form($_POST);
		return view('auth/login', compact('form'));
	}

	/**
	 * Formulaire d'inscription
	 *
	 * @return mixed
	 */
	public function getRegister()
	{
		$form = new Form($_POST);
		return view('auth/register', compact('form'));
	}

	/**
	 * Traitement de la connexion
	 *
	 * @return mixed
	 */
	public function postLogin()
	{
		return $this->attempt(request()->getPost('email'), request()->getPost('password'));
	}

	/**
	 * Permet de vérifier si un utilisateur est connecté ou non
	 *
	 * @return bool
	 */
	public function check()
	{
		if( session()->has('logged') && session()->get('logged') )
		{
			return true;
		}
		return false;
	}

	/**
	 * Retourne une clé utilisateur
	 *
	 * @param $key
	 * @return null
	 */
	public function get($key)
	{
		if( session()->has($key) )
		{
			return session()->get($key);
		}
		return $this->authDB->get($key);
	}
}