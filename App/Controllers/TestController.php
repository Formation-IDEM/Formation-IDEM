<?php
namespace App\Controllers;

use \Core\Controller;
use Core\Factories\ModelFactory;
use \Core\Html\Form;
use Core\Validator;

/**
 * Class CompanyController
 *
 * @package App\Controllers
 */
class TestController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction()
    {
        $items = collection('company')->all();
        return view('test/index', compact('items'));
    }
}