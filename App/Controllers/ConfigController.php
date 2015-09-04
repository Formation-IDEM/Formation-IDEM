<?php
namespace App\Controllers;

use Core\Controller;
use Core\Html\Form;

class ConfigController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function CreateRemunerationAction()
    {
        return view('config/remuneration/form', [
            'url'		=>	url('remuneration/create'),
            'title'		=>	'Ajouter une nouvelle forme de rémunération',
            'form'		=>	new Form($_POST),
            'remun'	    =>	ModelFactory::loadModel('remuneration'),
        ]);
    }

    public function EditRemunerationAction($id)
    {
        $remuneration = model('remuneration')->loadOrFail($id);
        return view('config/remuneration/form', [
            'url'       =>  url('remuneration/' . $remuneration->id . '/edit'),
            'title'     =>  'Mettre à jour la rémunération',
            'form'      =>  new Form($remuneration),
            'remun'     =>  $remuneration
        ]);
    }

    public function SaveRemunerationAction()
    {

    }

    public function DeleteRemunerationAction()
    {

    }
}