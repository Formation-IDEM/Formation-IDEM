<?php


class InternshipController{

    /**
     * Liste des entreprises
     */
	public function indexAction() {

		$internships = App::getCollection('Internship')->getAllItems();
		Template::getInstance()->setFileName('Internship/internshipindex')->setDatas(array('internships' => $internships))->render();
    }

    public function showAction() {

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
        if( isset($_GET['id']) && $_GET['id'] != 0 ){

			$internship = App::getModel('Internship')->load($_GET['id']);

        }else {   // En cas de création

        	$internship = App::getModel('internship');

        }
		
		$companies = App::getCollection('Company')->getAllItems();
		$formations = App::getCollection('Formation')->getAllItems();
		
		Template::getInstance()->setFileName('Internship.editInternship')->setDatas([
			'internship'		=>	$internship	,
			'companies'			=>	$companies	,
			'formations'		=>  $formations
		])->render();

		
    }

	public function formAction(){

		if (isset($_POST['title']) || isset($_POST['explain']) || isset($_POST['company_id']) || isset($_POST['referent_id']) || isset($_POST['formation_id']) || isset($_POST['wage'])) {

			$error = false;

			if ( empty($_POST['title']) || !isset($_POST['title']) ) {

				$error = true;
				echo "<div>Veuillez renseigner l'intitulé du stage</div>";
			}

			if ( empty($_POST['company_id']) || !isset($_POST['company_id']) ) {

				$error = true;
				echo "<div>Veuillez renseigner l'entreprise</div>";
			}

			if ( empty($_POST['referent_id']) || !isset($_POST['referent_id']) ) {

				$error = true;
				echo "<div>Veuillez renseigner le référent</div>";
			}

			if ( empty($_POST['formation_id']) || !isset($_POST['formation_id']) ) {

				$error = true;
				echo "<div>Veuillez renseigner la formation requise</div>";
			}

			if ($error==true) {

				echo "Votre Modification n'a pas été prise en compte";

			} 

			if ($error==false) {

				App::getModel('Internship')->store($_POST)->save();
				header('Location: index.php?c=internship&a=index');

			}

		}
	}

    /**
     * Suppression
     */
    public function deleteAction() {
		if(isset($_GET['id'])){
			
			$ad = App::getModel('Internship')->load($_GET['id']);
			$ad->setData('active', 1)->save();
			var_dump($ad);
			exit;


				header('Location: index.php?c=internship');
			
		}
    }
}
