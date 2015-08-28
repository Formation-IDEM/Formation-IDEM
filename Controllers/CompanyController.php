<?php

<<<<<<< HEAD
class CompanyController {

	function __construct() {


	}

	public function indexAction(){
		echo "Entreprises";
		App::getModel('TraineeCompany')->load($_GET['id'])->getInternship();
		
		Template::getInstance()->setFileName('editcompany')->render();
	}

	public function editAction(){

		App::getInstance()->getModel('Company')->load($_GET['id']);
		
		
		//var_dump(App::getInstance()->getModel('Company')->getFields());
		
		//Database::getInstance()->getItems(1);
		Template::getInstance()->setTemplate('editcompany')->render();

	}
}


?>
=======
class CompanyController{
    /**
     * Liste des entreprises
     */
    public function indexAction(){
    	
		$companies = App::getCollection('Company')->getAllItems();
		Template::getInstance()->setFileName('Company/HomeCompany')->setDatas(array('companies' => $companies))->render();
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
		
		Template::getInstance()->setFileName('Company/Editcompany')->render();
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
>>>>>>> entreprises
