<?php
namespace App\Controllers;

use Core\Controller;
use Core\Factories\DatabaseFactory;
use Core\Template;

/**
 * Class StatsController
 * @package App\Controllers
 */
class StatsController extends Controller
{
    protected $middlewares = ['auth'];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Menu des Statistiques
     *
     * @return Template::getInstance->render()
     */
    public function indexAction()
    {
        return view('stats/index');
    }

    /**
     * Retourne les status par étudiants
     *
     * @return mixed
     */
    public function statusTraineeAction()
    {
        $status = collection('traineeStatus')->all();

        $count = 0;
        $data = [];
        foreach( $status as $statut )
        {
            $sql = 'SELECT COUNT(t.id) AS total, SUM(st.nb_hour_present_school) AS total_hours
                  FROM trainees t
                  INNER JOIN sessions_trainee st
                    ON st.trainee_id = t.id
                  INNER JOIN trainee_status ts
                    ON ts.id = t.status_trainee_id
                  WHERE t.family_status_id = \'' . $statut->id . '\'';
            $result = DatabaseFactory::db()->query($sql, true);

            if( !empty( $result) )
            {
                $data[$count]['statut'] = $statut->title;
                $data[$count]['total'] = $result->total;
                $data[$count]['total_hours'] = $result->total_hours;
                $count++;
            }
            else
            {
                $data[$count]['statut'] = $statut->title;
                $data[$count]['total'] = 0;
                $data[$count]['total_hours'] = 0;
            }
            $count++;
        }

        return view('stats/status-trainees', [
            'title'     =>  'Statuts des étudiants',
            'field'     =>  'Statut',
            'data'      => $data,
        ]);
    }

    public function TraineeStudyLevelAction()
    {
        $status = collection('StudyLevel')->orderBy('title', 'ASC')->all();

        $count = 0;
        $data = [];
        foreach( $status as $statut )
        {
            $sql = 'SELECT COUNT(t.id) AS total, SUM(st.nb_hour_present_school) AS total_hours
                  FROM trainees t
                  INNER JOIN sessions_trainee st
                    ON st.trainee_id = t.id
                  INNER JOIN trainee_status ts
                    ON ts.id = t.status_trainee_id
                  WHERE t.study_levels_id = \'' . $statut->id . '\'';
            $result = DatabaseFactory::db()->query($sql, true);

            if( !empty( $result) )
            {
                $data[$count]['statut'] = $statut->title;
                $data[$count]['total'] = $result->total;
                $data[$count]['total_hours'] = $result->total_hours;
                $count++;
            }
            else
            {
                $data[$count]['statut'] = $statut->title;
                $data[$count]['total'] = 0;
                $data[$count]['total_hours'] = 0;
            }
            $count++;

        }

        return view('stats/status-trainees', [
            'title'     =>  'Niveaux d\'études des étudiants',
            'field'     =>  'Niveau',
            'data'      => $data
        ]);
    }
}