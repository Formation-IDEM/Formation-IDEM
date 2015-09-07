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
		Template::getInstance()->setFileName('Company/HomeCompany')->setDatas(array('companies' => $companies))->render();
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


    }
	
	public function formAction(){
		
		if (isset($_POST['name']) || isset($_POST['status']) || isset($_POST['address']) || isset($_POST['postal_code'])
		|| isset($_POST['city']) || isset($_POST['country']) || isset($_POST['phone']) || isset($_POST['manager'])) {

			$error = false;

			if ( empty($_POST['name']) || !isset($_POST['name']) ) {

				$error = true;
				echo "<div>Veuillez renseigner le nom de l'entrprise</div>";
			}

			if (empty($_POST['status']) || !isset($_POST['status'])) {

				$error = true;
				echo "<div>Veuillez renseigner la statut de l'entreprise</div>";
			}
			
			if ( empty($_POST['address']) || !isset($_POST['address']) ) {

				$error = true;
				echo "<div>Veuillez renseigner l'adresse de l'entreprise</div>";
			}
			
			if ( empty($_POST['postal_code']) || !isset($_POST['postal_code']) ) {

				$error = true;
				echo "<div>Veuillez renseigner le code potal de l'entreprise</div>";
			}
			if ( empty($_POST['city']) || !isset($_POST['city']) ) {

				$error = true;
				echo "<div>Veuillez renseigner la ville de l'entreprise</div>";
			}
			if ( empty($_POST['country']) || !isset($_POST['country']) ) {

				$error = true;
				echo "<div>Veuillez renseigner le pays de l'entreprise</div>";
			}
			if ( empty($_POST['phone']) || !isset($_POST['phone']) ) {

				$error = true;
				echo "<div>Veuillez renseigner le numéro de téléphone de l'entreprise</div>";
			}
			if ( empty($_POST['manager']) || !isset($_POST['manager']) ) {

				$error = true;
				echo "<div>Veuillez renseigner le nom du manager de l'entreprise</div>";
			}
			
			
			/*if ($_POST['user_id'] != App::getConnectedUser()->getData('id')) {
				$error = true;
				echo "<div>Bien tenté, tricheur</div>";
			}*/
			
			if ($error==true) {

				echo "Votre Modification n'a pas été prise en compte";
				
			} 
			
			if ($error==false && $_POST['id'] != 0) {

				App::getModel('Company')->store($_POST)->save();
				header('Location: index.php?c=company&a=index');

			}elseif( $error == false && $_POST['id'] == 0){
					
				App::getModel('Company')->store($_POST)->save();
				
				header('Location: index.php?c=company&a=index');
			}

		}
		
	}
	
}
