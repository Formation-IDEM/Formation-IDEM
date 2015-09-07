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
}