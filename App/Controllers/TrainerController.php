<?php
namespace App\Controllers;

use \Core\Controller;
use Core\Validator;

/**
 * Class CompanyController
 *
 * @package App\Controllers
 */
class TrainerController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('trainer');
    }

    public function indexAction()
    {
        if(isset($_POST['delete']) && $_POST['delete'])
        {
            $levels = model('trainer')->load($_POST['trainer'])->getLevels();
            $timesheets = model('trainer')->load($_POST['trainer'])->getTimesheets();
            $trainer = model('trainer')->load($_POST['trainer']);
            if($levels || $timesheets)
            {
                foreach($levels as $level)
                {
                    $level->setData('active', false)->save();
                }
                foreach($timesheets as $timesheet)
                {
                    $timesheet->setData('active', false)->save();
                }
                $trainer->setData('active', false)->save();
            }
            else
            {
                $trainer->delete();
            }
        }

        $trainers = collection('trainer')->all();
        return view('trainers/index', compact('trainers'));
    }

    public function createAction()
    {
        return $this->formAction();
    }

    public function editAction($id)
    {
        return $this->formAction($id);
    }

    public function formAction($id = '')
    {
        if( !empty($id) && $id != 0 )
        {
            $title = 'Modifier un formateur';
            $trainer = model('trainer')->load(intval($id));
            $url = url('trainers/' . $trainer->id . '/edit');
        }
        else
        {
            $title = 'Ajouter un formateur';
            $trainer = model('trainer');
            $url = url('trainers/create');
        }

        return view('trainers/form', array(
            'title'         =>  $title,
            'url'           =>  $url,
            'trainer' 		=>  $trainer,
            'id'            =>  $trainer->id,
            'nationalities' =>  collection('nationality')->all(),
            'familyStatuss' =>  collection('familyStatus')->all(),
            'studyLevels' 	=>  collection('studyLevel')->all()
        ));
    }

    public function saveAction()
    {
        $validator = new Validator([
            'name'  =>  'required'
        ]);
        if( $validator->run() )
        {
            $this->trainer->store(request()->all('POST'));
            var_dump(request()->all('POST'));
            var_dump($this->trainer->save());
            exit;
            //return redirect(url('trainers'))->flash('success', 'Le formateur a correctement été ajouté.');
        }
        response()->posts()->getErrors($validator->getErrors());
        $this->formAction(request()->getPost('id'));
    }
}