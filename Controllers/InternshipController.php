<?php

class InternshipController
{
    /**
     * Liste des entreprises
     */
    public function indexAction()
    {
		$Internships = App::getCollection('Internship')->getAllItems();

		return Template::getInstance()->setFilename('Internship/index')->setDatas(['stages'	=>	$Internships])->render();

    }

    public function showAction()
    {
        if( isset($_GET['id']) )
        {

        }
    }

    /**
     * Formulaire de création/édition
     */
    public function editAction()
    {
        //  En cas d'édition
        if( isset($_GET['id']) )
        {
            App::getModel('Internships')->load($_GET['id']);
            Template::getInstance()->setFilename('Internship/editInternship')->render();
        }
        else    // En cas de création
        {
            Template::getInstance()->setFilename('Internship/createInternship')->render();
        }
    }

    /**
     * Suppression
     */
    public function deleteAction()
    {

    }
}

