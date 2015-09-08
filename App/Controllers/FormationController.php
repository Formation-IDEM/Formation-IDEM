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
}