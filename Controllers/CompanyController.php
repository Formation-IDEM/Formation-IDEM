<?php

class CompanyController{
    /**
     * Liste des entreprises
     */
    public function indexAction(){
    	
		App::getCollection('Company')->getAllItems();
    }

    public function showAction(){

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
        if( isset($_GET['id']) ){

		App::getModel('Company')->load($_GET['id']);
		
		Template::getInstance()->setFileName('Editcompany')->render();
        }
        else {   // En cas de création

        }
    }

    /**
     * Suppression
     */
    public function deleteAction(){


    }
}
