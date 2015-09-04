<?php
namespace App\Controllers;

use Core\Controller;

class AjaxController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function traineesAction($query)
    {
        $students = collection('trainees')->select('id', 'name')->where('name', 'like', $query)->get();
        $trainees = [];
        foreach( $students as $student )
        {
            $trainees[] = $student->getFields();
        }

        echo json_encode($trainees);
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