<?php
namespace App\Controllers;

use Core\Controller;

class AjaxController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function companiesAction()
    {
        $items = collection('company')->all();
        //return view('ajax/companies', compact('items'));


        $array = [];
        foreach( $items as $company )
        {
            $array[] = $company->getFields();
        }
        echo json_encode($array);

    }

    public function internshipsAction($id)
    {
        $items = collection('internship')->where('company_id', '=', $id)->all();
        return view('ajax/internships', compact('items'));
    }
}