<?php

<<<<<<< HEAD
/**
 * 
 */
class InternshipController {
	
	function __construct() {
		
	}
	
	
	
}


?>
=======
class InternshipController
{
    /**
     * Liste des entreprises
     */
    public function indexAction()
    {

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

>>>>>>> entreprises
