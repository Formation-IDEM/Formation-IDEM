<?php  

class FormationController{
	
	public function __contruct(){
	}
	
	public function indexAction(){
				
		//appel la méthode getItems de la class Collection avec la parametre qui va bien
		$collection = App::getModel('Collection');			
		//on initialise les attributs de la collection
		$collection->setAttribut('formations','Formation');
		
		//On récupere le tableau d'object via la méthode pour récuperé une collection
		$coll_formation = $collection->getItems();
		
		//On transmet via setDatas() la collection de formation dans un tableau associatif
		Template::getInstance()->setFileName("Formation/list_formations")->setDatas(array(
			'coll_formation' => $coll_formation
		))->render();
	
	}
	
	public function editAction(){
		
		//on charge le model de formation
		$maFormation = App::getModel("Formation");
		
		if( isset($_POST['edit']) ){
			
			$maFormation->load($_POST['id']);
			
		}
		
		if( isset($_POST['submit']) ) {
			//Si id existe et n'est pas vide, on modifie
			if( isset($_POST['id']) && !empty($_POST['id']) ){
				
				$maFormation->store( array(	'id'=> $_POST['id']	));
				
			}else{//sinon c'est une création
				
				$maFormation->store( array(	'id'=> 0 ));			
				
			}
			
			$maFormation->store( array(
						'title' 						=> $_POST['title'],
						'average_effective' 			=> $_POST['average_effective'],
						'convention_hour_center'		=> $_POST['convention_hour_center'],
						'convention_hour_company' 		=> $_POST['convention_hour_company'],
						'deal_code' 					=> $_POST['deal_code'],
						'order_giver' 					=> $_POST['order_giver'],
						'deal_begin_date' 				=> $_POST['deal_begin_date'],
						'deal_ending_date' 				=> $_POST['deal_ending_date']							
			));
	
			

			//on appelle la méthode qui stock les infos dans l'objet crée
			$maFormation->save();
				
			header("Location: index.php?c=Formation");
		}	
			//On transmet via setDatas() la collection de formation dans un tableau associatif
			Template::getInstance()->setFileName("Formation/edit_formations")->setDatas(array(
				'maFormation' => $maFormation
			))->render();
		
	}
	
	public function deleteAction(){
		
		$maFormation = App::getModel("Formation");
		
		if( isset($_POST['delete']) ){
		
			$maFormation->load($_POST['id']);
			$maFormation->delete();
			header("Location: index.php?c=Formation");
			
		}
		
	}

}
