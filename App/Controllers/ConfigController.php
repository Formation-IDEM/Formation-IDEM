<?php
namespace App\Controllers;

use Core\Controller;
use Core\Factories\ModelFactory;
use Core\Html\Form;
use Core\Template;
use Core\Validator;

class ConfigController extends Controller
{
    protected $configType = [
        'remuneration'  =>  'remunerationType',
        'family'        =>  'familyStatus',
        'nationality'   =>  'nationality',
        'status'        =>  'traineeStatus'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Liste tous les status
     *
     * @return mixed
     */
    public function indexAction()
    {
        $remunerations = collection('remunerationType')->all();
        $familyStatus = collection('familyStatus')->all();
        $nationalities = collection('nationality')->all();
        $traineeStatus = collection('traineeStatus')->all();

        return view('config/index', compact('remunerations', 'familyStatus', 'nationalities', 'traineeStatus'));
    }

    /**
     * Enregistre un statut
     *
     * @param $config
     */
    public function saveAction($config)
    {
        $this->checkConfig($config);
        $item = model($this->configType[$config]);
        $validator = new Validator($item->_rules);
        if( $validator->run() )
        {
            $item->store(request()->all('POST'))->save();
            return redirect(url('config'))->flash('success', 'L\'élément a correctement été ajouté');
        }
        return redirect(url('config'))->flash('danger', $validator->getError('title'));
    }

    /**
     * Affiche le formulaire Ajax permettant d'enregistrer ou
     * d'éditer un statut
     *
     * @param $type
     * @param int $id
     * @return mixed
     */
    public function editAction($type, $id = null)
    {
        $this->checkConfig($type);

        if( !is_null($id) ) {
            $item = ModelFactory::loadModel($this->configType[$type])->load($id);
            $form = new Form($item);
            $field = lang('config.update_' . $type);
        } else {
            $item = ModelFactory::loadModel($this->configType[$type]);
            $form = new Form($_POST);
            $field = lang('config.create_' . $type);
        }

        return Template::getInstance()->only('config/form', [
            'url'       =>  url('config/' . $type . '/save'),
            'field'     =>  $field,
            'item'      =>  $item,
            'form'      =>  $form
        ]);

    }

    /**
     * Supprime un élément
     *
     * @param $config
     * @param $id
     * @return mixed
     */
    public function deleteAction($config, $id)
    {
        $this->checkConfig($config);
        $item = model($this->configType[$config])->load($id);
        $item->delete();
        return redirect(url('config'))->flash('success', 'L\'élément a correctement été supprimé');
    }

    /**
     * Permet de vérifier que l'élément est correct
     *
     * @param $config
     * @return $this
     */
    private function checkConfig($config)
    {
        if( !array_key_exists($config, $this->configType) )
        {
            return redirect(url('config'));
        }
    }


}
