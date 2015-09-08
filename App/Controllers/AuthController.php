<?php
namespace App\Controllers;

use Core\Config;
use Core\Controller;
use Core\Html\Form;
use Core\Validator;

class AuthController extends Controller
{
    /**
     * Formulaire de connexion
     *
     * @return mixed
     */
    public function loginAction()
    {
        return auth()->getLogin();
    }

    /**
     * Connexion
     *
     * @return mixed
     */
    public function attemptAction()
    {
        return auth()->postLogin();
    }

    /**
     * Formulaire d'inscription
     *
     * @return mixed
     */
    public function registerAction()
    {
        return auth()->getRegister();
    }

    /**
     * Création d'un nouveau membre
     *
     * @return $this
     */
    public function createAction()
    {
        return auth()->postRegister();
    }

    /**
     * Edition du profil
     */
    public function profileAction()
    {
        $form = new Form(model('user')->load(auth()->getId()));
        return view('auth/profile', compact('form'));
    }

    /**
     * Sauvegarde du profil
     *
     * @return mixed
     */
    public function updateProfileAction()
    {
        $rules = [
            'username'      =>  'required|min:3',
            'email'         =>  'required|email',
        ];

        $data = [
            'username'  =>  request()->getPost('username'),
            'email'     =>  request()->getPost('email'),
        ];

        $cfg = Config::getInstance('config');
        if( !empty(request()->getPost('password')) )
        {
            var_dump(true);
            $rules = array_merge($rules, [
                'password'  =>  'required|min:8|confirmed',
            ]);

            $data = array_merge($data, [
                'password'  =>  sha1($cfg->get('secret_key') . request()->getPost('password') . $cfg->get('secret_key'))
            ]);
        }

        $validator = new Validator($rules);
        if( $validator->run() )
        {
            model('user')->load(auth()->getId())->store($data)->save();
            return redirect(url('/'))->flash('success', 'Votre profil a correctement été mis à jour.');
        }
        response()->posts()->errors($validator->getErrors());
        return $this->profileAction();
    }

    /**
     * Déconnexion
     *
     * @return $this
     */
    public function logoutAction()
    {
        return auth()->logout();
    }
}
