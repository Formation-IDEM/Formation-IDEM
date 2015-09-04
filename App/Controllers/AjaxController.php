<?php
namespace App\Controllers;

use Core\Controller;
use \Core\Facades\Template;

class AjaxController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function internshipsAction($id)
    {
        $items = collection('internship')->where('company_id', '=', $id)->all();
        return Template::only('ajax/internships', compact('items'));
    }
}