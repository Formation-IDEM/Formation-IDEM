<?php


class InternshipController{

    /**
     * Liste des entreprises
     */
	public function indexAction(){

		$internships = App::getCollection('Internship')->getAllItems();
		Template::getInstance()->setFileName('Internship/internshipindex')->setDatas(array('internships' => $internships))->render();
    }

    public function showAction(){

       if( isset($_GET['id']) && $_GET['id'] != 0 ){
			
		$internship = App::getModel('Internship')->load($_GET['id']);
		Template::getInstance()->setFileName('Internship/show')->setDatas(array('internship' => $internship))->render();
			
        }
    }

    /**
     * Formulaire de création/édition
     */
    public function editAction(){

        //  En cas d'édition
        if( isset($_GET['id']) ){

        }
        else    // En cas de création
        {

        }
    }

    /**
     * Suppression
     */
    public function deleteAction()
    {

    }
}
