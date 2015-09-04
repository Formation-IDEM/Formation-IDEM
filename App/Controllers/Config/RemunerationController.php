<?php
namespace App\Controllers\Config;

use Core\Controller;
use Core\Html\Form;
use Core\Validator;

class RemunerationController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('RemunerationType');
    }

    public function index()
    {
        return redirect(url('config'));
    }

    public function CreateRemunerationAction()
    {
        return view('config/remunerations/form', [
            'url'		=>	url('remuneration/create'),
            'title'		=>	'Ajouter une nouvelle forme de rémunération',
            'form'		=>	new Form($_POST),
            'remun'	    =>	ModelFactory::loadModel('remuneration'),
        ]);
    }

    public function EditRemunerationAction($id)
    {
        $remuneration = model('remuneration')->loadOrFail($id);
        return view('config/remunerations/form', [
            'url'       =>  url('remuneration/' . $remuneration->id . '/edit'),
            'title'     =>  'Mettre à jour la rémunération',
            'form'      =>  new Form($remuneration),
            'remun'     =>  $remuneration
        ]);
    }

    public function SaveRemunerationAction()
    {
        $validator = new Validator($this->remunerationtype->_rules);
        if( $validator->run() )
        {
            $this->remunerationtype->store(request()->all('POST'))->save();
            return redirect(url('config/remunerations'))->flash('success', 'La rémunération a correctement été ajouté');
        }
    }

    public function DeleteRemunerationAction($id)
    {
        $remuneration = model('remunerationTYpe')->loadOrFail($id);
        $remuneration->delete();
        return redirect(url('config/remunerations'))->flash('success', 'La rémunération a correctement été supprimée');
    }
}