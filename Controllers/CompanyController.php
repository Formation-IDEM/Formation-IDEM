<?php

class CompanyController
{
    /**
     * Liste des entreprises
     */
    public function indexAction()
    {
		die('salut jean luc');
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
