<?php

/*class CompanyController {

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
}*/


class CompanyController{
    /**
     * Liste des entreprises
     */
    public function indexAction(){

		$companies = App::getCollection('Company')->getAllItems();
		Template::getInstance()->setFileName('Company/homeCompany')->setDatas(array('companies' => $companies))->render();
    }

    public function showAction(){

		if( isset($_GET['id']) && $_GET['id'] != 0 ){

			$company = App::getModel('Company')->load($_GET['id']);
			Template::getInstance()->setFileName('Company/show')->setDatas(array('company' => $company))->render();

        }
    }

    /**
     * Formulaire de création/édition
     */
    public function editAction()
    {
        //  En cas d'édition
        if( isset($_GET['id']) && $_GET['id'] != 0 ){

			$company = App::getModel('Company')->load($_GET['id']);

        }else {   // En cas de création

        	$company = App::getModel('Company');

        }
		
		Template::getInstance()->setFileName('Company.editCompany')->setDatas([
			'company'				=>	$company	,
		])->render();
    }

    /**
     * Suppression
     */
    public function deleteAction(){
		if(isset($_GET['id'])){
			
			$ads = App::getModel('Company')->load($_GET['id'])->delete();

				header('Location: '.$_SERVER["HTTP_REFERER"]);
			
		}
    }
	
	public function formAction(){

		if (isset($_POST)) {

			$error = false;

			if ( empty($_POST['name']) || !isset($_POST['name']) ) {

				$error = true;
			}

			if (empty($_POST['status']) || !isset($_POST['status'])) {

				$error = true;
			}

			if ( empty($_POST['address']) || !isset($_POST['address']) ) {

				$error = true;
			}

			if ( empty($_POST['postal_code']) || !isset($_POST['postal_code']) ) {

				$error = true;
			}

			if ( empty($_POST['city']) || !isset($_POST['city']) ) {

				$error = true;
			}

			if ( empty($_POST['country']) || !isset($_POST['country']) ) {

				$error = true;
			}

			if ( empty($_POST['phone']) || !isset($_POST['phone']) ) {

				$error = true;
			}

			if ( empty($_POST['manager']) || !isset($_POST['manager']) ) {

				$error = true;
			}

			if ($error==false) {

				App::getModel('Company')->store($_POST)->save();
				header('Location: index.php?c=company&a=index');

			}

		}
		
	}
	
}
