<?php
namespace App\Controllers;

use \App\App;
use \Core\Controller;
use Core\Validator;

/**
 * Class CompanyController
 *
 * @package App\Controllers
 */
class TrainerController extends Controller
{
    protected $middlewares = ['auth'];

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('trainer');
    }

    /**
     * Liste tous les formateurs
     *
     * @return mixed
     */
    public function indexAction()
    {
        $trainers = collection('trainer')->all();
        return view('trainers/index', compact('trainers'));
    }

    public function showAction($id)
    {
        $trainer = App::getModel('trainer')->loadOrFail($id);
        return view('trainers/show', compact('trainer'));
    }

    /**
     * Retourne le formulaire null pour enregistrer un nouveau formateur
     *
     * @return mixed
     */
    public function createAction()
    {
        return $this->formAction();
    }

    /**
     * Retourne le formulaire rempli pour éditer un formateur
     *
     * @param $id
     * @return mixed
     */
    public function editAction($id)
    {
        return $this->formAction($id);
    }

    /**
     * Affiche le formulaire
     *
     * @param string $id
     * @return mixed
     */
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
            'nationalities' =>  collection('nationality')->orderBy('title', 'ASC')->all(),
            'familyStatuss' =>  collection('familyStatus')->orderBy('title', 'ASC')->all(),
            'studyLevels' 	=>  collection('studyLevel')->orderBy('title', 'ASC')->all()
        ));
    }

    /**
     * Supprime un formateur
     *
     * @param $id
     * @return mixed
     */
    public function deleteAction($id)
    {
        $levels = model('trainer')->load($id)->getLevels();
        $timesheets = model('trainer')->load($id)->getTimesheets();
        $trainer = model('trainer')->load($id);
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
        return redirect(url('trainers'))->flash('success', 'Le formateur a correctement été supprimé.');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function mattersAction($id)
    {
        $trainer = model('trainer')->loadOrFail($id);
        $matters = collection('matter')->getAllItems();

        if(isset($_POST) && $_POST != null)
        {
            if(isset($_POST['delete']) && $_POST['delete'])
            {
                $level = App::getModel('Level')->load($_POST['level']);
                $level->delete();
            }
            else
            {

                $levels = App::getCollection('Level')
                    ->where('matter_id', '=', $_POST['matter_id'])
                    ->where('trainer_id', '=', $id)
                    ->all();

                if(!$levels) // Prévention doublon matière / formateur
                {
                    $level = App::getModel('Level');
                    $level->store([
                        'matter_id'     =>  (int) request()->getPost('matter_id'),
                        'trainer_id'    =>  $id,
                    ])->save();
                }
            }
        }
        return view('trainers/matters', compact('trainer', 'matters'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function saveMatterAction($id)
    {
        $trainer = App::getModel('trainer')->loadOrFail($id);
        $validator = new Validator([
            'matter_id'     =>  'required',
            'trainer_id'    =>  'required'
        ]);
        if( $validator->run() )
        {
            $levels = App::getCollection('level')
                ->where('matter_id', '=', request()->getPost('matter_id'))
                ->where('trainer_id', '=', request()->getPost('trainer_id'))
                ->all();
            if( !$levels )
            {
                $level = App::getModel('level');
                $level->setData('matter_id', request()->getPost('matter_id'))
                    ->setData('trainer_id', '=', request()->getPost('trainer_id'))
                    ->save();
            }
        }

        var_dump($trainer);
        var_dump($level);
        exit;

        //return redirect(url('trainers/' . $trainer->id . '/matters'))->flash('success', 'La mise à jour a correctement été effectuée');
    }

    /**
     * @param $id
     * @param $level
     * @return mixed
     */
    public function deleteMatterAction($id, $level)
    {
        $level = App::getModel('level')->loadOrFail($level);
        $level->delete();
        return redirect(url('trainers/' . $id . 'matter'))->flash('success', 'La matière a corretement été supprimée');
    }

    /**
     * Enregistre le formulaire
     *
     * @return mixed
     */
    public function saveAction()
    {
        $validator = new Validator([
            'name'  =>  'required'
        ]);
        if( $validator->run() )
        {
            $this->trainer->store(request()->all('POST'))->save();
            return redirect(url('trainers'))->flash('success', 'Le formateur a correctement été sauvegardé.');
        }
        response()->posts()->getErrors($validator->getErrors());
        $this->formAction(request()->getPost('id'));
    }

    public function timesheetAction($id)
    {
        $formationSession = App::getCollection('formationSession')->all();
        $trainer = App::getModel('trainer')->loadOrFail($id);
        return view('trainers/timesheet', compact('formationSession', 'trainer'));
    }
}