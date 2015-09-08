<?php
namespace App\Controllers;

use Core\Config;
use Core\Controller;
use Core\Html\Form;
use Core\Validator;

class AdminController extends Controller
{
    protected $middlewares = ['auth'];

    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction()
    {
        $admins = collection('user')->all();
        return view('admins/index', compact('admins'));
    }

    public function createAction()
    {
        return view('admins/form', [
            'title'     =>  'Ajouter un administrateur',
            'form'      =>  new Form($_POST),
            'user'      =>  model('user'),
            'url'       =>  url('admins/create')
        ]);
    }

    public function editAction($id)
    {
        if( $id != auth()->getId() )
        {
            return redirect(url('admins'))->flash('danger', 'Vous ne pouvez pas modifier le profil des autres administrateurs');
        }

        $user = model('user')->loadOrFail($id);
        return view('admins/form', [
            'title'     =>  'Modifier un administrateur',
            'form'      =>  new Form($user),
            'user'      =>  $user,
            'url'       =>  url('admins/' . $user->id . '/edit')
        ]);
    }

    public function saveAction()
    {
        $rules = [
            'name'          =>  'required',
            'firstname'     =>  'required',
            'email'         =>  'required',
        ];

        if( request()->getPost('id') != 0 )
        {
            if( !empty(request()->getPost('password')) || !empty(request()->getPost('password_confirmation')) )
            {
                $rules = array_merge($rules, [
                    'password'  =>  'required|confirmed',
                ]);
            }
        }
        else
        {
            $rules = array_merge($rules, [
                'password'  =>  'required|confirmed',
            ]);
        }

        $validator = new Validator($rules);
        if( $validator->run() )
        {
            $cfg = Config::getInstance('config');
            $_POST['password'] = sha1($cfg->get('secret_key') . $_POST['password'] . $cfg->get('secret_key'));
            model('user')->store(request()->all())->save();
            return redirect(url('admins'))->flash('success', 'L\'administrateur a correctement été sauvegardée.');
        }
        response()->posts()->errors($validator->getErrors());
        return $this->createAction();
    }
}