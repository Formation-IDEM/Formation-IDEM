<?php
namespace App\Controllers;

use App\App;
use \Core\Controller;
use Core\Factories\ModelFactory;
use \Core\Html\Form;
use Core\Validator;

/**
 * Class CompanyController
 *
 * @package App\Controllers
 */
class FormationController extends Controller
{
    protected $middlewares = ['auth'];

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->middlewares = ['auth'];
    }

    public function indexAction()
    {
        $title = 'Liste des formations';
        $formations = collection('formation')->all();
        return view('formations/index', compact('title', 'formations'));
    }

    public function editAction($id = null)
    {
        //on charge le model de formation
        $maFormation = App::getModel('Formation');
        $title = 'Ajouter une formation';
        //crée la liste des matières via une collection
        $coll_matter = App::getCollection('Matter')->getAllItems();

        if( !is_null($id) )
        {
            $maFormation->load(intval(request()->getData('id')));
            $title = 'Modifier '.$maFormation->title;
        }

        if( isset($_POST['submit']))
        {
            if( isset($_POST['id']) && !empty($_POST['id']) )
            {
                $maFormation->store(array('id' => intval(request()->getPost('id'))));
            }
            else
            {
                $maFormation->store(array('id' => 0));
            }
            $maFormation->store(array(
                'title' 						=> request()->getPost('title'),
                'average_effective' 			=> request()->getPost('average_effective'),
                'convention_hour_center'		=> request()->getPost('convention_hour_center'),
                'convention_hour_company' 		=> request()->getPost('convention_hour_company'),
                'deal_code' 					=> request()->getPost('deal_code'),
                'order_giver' 					=> request()->getPost('order_giver'),
                'deal_begin_date' 				=> request()->getPost('deal_begin_date'),
                'deal_ending_date' 				=> request()->getPost('deal_ending_date'),
            ));
            //on appelle la méthode qui stock les infos dans l'objet crée
            $maFormation->save();
            //On prépare la sauvegardes des references pedagogique lié a la formation
            for( $i = 0; $i < count($_POST['matters']) ; $i++)
            {
                //on crée un model de refpedago
                $ref = App::getModel('RefPedago');
                //on store l'ID de la formation qui vien d'être crée et l'ID de la matière courante
                $ref->store( array(
                    'formations_id' =>  $maFormation->getData('id'),
                    'matters_id'    =>  htmlspecialchars($_POST['matters'][$i])
                ));
                //On sauvegarde dans la bdd la réf pedago une fois initialisé
                $ref->save();

            }

            return redirect(url('formations'))->flash('success', 'La formation a correctement été sauvegardé');
        }

        return view('formations/form', compact('maFormation', 'coll_matter', 'title'));
    }

    public function deleteAction($id)
    {
        $maFormation = App::getModel("Formation")->loadOrFail($id);
        $maFormation->delete();
        return redirect(url('formations'))->flash('success', 'La formation a correctement été supprimée.');
    }
}