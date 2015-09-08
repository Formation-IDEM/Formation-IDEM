<?php
namespace App\Controllers;

use App\App;
use \Core\Controller;
use \Core\Template;

class AjaxController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middlewares = ['auth'];
    }

    /**
     * Retourne la liste des pays pour l'autocompletion
     */
    public function nationalitiesAction()
    {
        $countries = collection('nationality')
            ->select('title')
            ->where('title', 'LIKE', ucfirst(request()->getData('country')))
            ->all();

        $json = [];
        foreach( $countries as $country )
        {
            $json[] = $country->title;
        }
        echo json_encode($json);
    }

    /**
     * Retourne la liste des stages pour une entreprise
     *
     * @param $id
     * @return mixed
     */
    public function internshipsAction($id)
    {
        $items = collection('internship')->where('company_id', '=', $id)->all();
        return Template::only('ajax/internships', compact('items'));
    }

    public function listMatterAction($id)
    {
        $collection = App::getCollection('Matter');
        $coll_matter = $collection->getAllItems();

        return Template::getInstance()->only('ajax/list_matter', [
            'coll_matter'       =>  $coll_matter,
            'id_formation'      =>  $id
        ]);
    }

    public function listRefpedagoAction()
    {
        $collection = App::getCollection('RefPedago');
        $collection->where('formations_id', '=', request()->getData('id'))->all();
        $coll_refpedago = $collection->getAllItems();

        return Template::getInstance()->only('ajax/list_refpedago', [
            'coll_refpedago'    =>  $coll_refpedago,
            'id_formation'      =>  intval(request()->getData('id'))
        ]);
    }

    public function addRefPedagoAction()
    {
        if( $_POST )
        {
            $refpedago = App::getModel('RefPedago');
            $refpedago->store( array(
                'formations_id' =>  request()->getPost('formation'),
                'matters_id'    =>  request()->getPost('matter')
            ));
            $refpedago->save();

            return Template::getInstance()->only('ajax/add_single_refpedago', compact('refpedago'));
        }
    }

    public function deleteRefPedagoAction($id)
    {
        $ref = App::getModel('RefPedago')->load($id);
        $ref->delete();
    }

    public function listTrainerAction()
    {
        if($_POST['firstname'] != null)
        {
            $trainers = App::getCollection('Trainer')
                ->where('firstname', 'LIKE', request()->getPost('firstname')->all());
        }
        else
        {
            $trainers = App::getCollection('Trainer')->all();
        }

        return Template::getInstance()->only('ajax/trainer-list', compact('trainers'));
    }

    public function autoCompleteTrainerAction()
    {
        $trainers = App::getCollection('Trainer')
            ->select('firstname')
            ->where('firstname','LIKE',$_GET['q'])->get();

        foreach($trainers as $trainer)
        {
            $json[] = $trainer->firstname;
        }
        echo json_encode($json);
    }

    public function editLevelFormAction()
    {
        $level = App::getModel('Level')->load(request()->getPost('id'));
        return Template::getInstance()->only('ajax/edit-level', [
            'level'     =>  $level,
            'trainer'   =>  $level->getTrainer()
        ]);
    }

    public function editLevelAction()
    {
        $level = App::getModel('Level')->load(request()->getPost('id'))
            ->store(request()->all('POST'))->save();
        return Template::getInstance()->only('ajax/levels', [
            'trainer'   =>  $level->getTrainer()
        ]);
    }
}