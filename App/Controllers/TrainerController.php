<?php
namespace App\Controllers;

use \Core\Controller;

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
        if( !empty($id) )
        {
            $trainer = model('trainer')->load(intval($id));
        }
        else
        {
            $trainer = model('trainer');
        }

        // Si retour de formulaire
        if(isset($_POST) && $_POST != null)
        {
            $trainer->store($_POST)->save();
        }

        return view('trainers/form', array(
            'trainer' 		=> $trainer,
            'nationalities' => collection('nationality')->all(),
            'familyStatuss' => collection('familyStatus')->all(),
            'studyLevels' 	=> collection('studyLevel')->all()
        ));
    }
}