<?php

class InternshipController
{
    /**
     * Liste des entreprises
     */
    public function indexAction()
    {
		$Internships = App::getCollection('Internship')->getAllItems();
		
		return Template::getInstance()->setFilename('Internship/index')->setDatas([
			'stages'	=>	$Internships
		])->render();
		
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

