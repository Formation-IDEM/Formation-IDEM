<?php 

class AjaxController{

	public function autoCompleteAction()
	{
		$trainers = App::getCollection('Trainer')->getFilteredItems('firstname', 'LIKE', $_GET['q'].'%');
		foreach ($trainers as $trainer)
		{
			$tab[] = $trainer->getData('firstname');
		}

		echo json_encode($tab); 
	}

	public function filterTrainerAction()
	{
		$trainers = App::getCollection('Trainer')->getFilteredItems('id', '=', $_GET['id']);

		Template::getInstance()
		->setFilename('Ajax/filter-trainer')
		->setDatas(array(
			'trainers'	=>	$trainers
			))
		->setAjax()
		->render();
	}

 

  

    public function listMatterAction(){

        //récupere la collection des matières            
        $collection = App::getCollection('Matter');        
             
        $coll_matter = $collection->getAllItems();
        
        //récupere la collection des refPedago lié a la formation 
        $collection = App::getCollection('RefPedago');
        $coll_refpedago = $collection->getFilteredItems("formations_id","=",$_GET['id']);      

        //On récupere l'ID de la formation        
        $id_formation = $_GET['id'];       
    
        Template::getInstance()->setFileName("Ajax/list_matter")->setDatas(
            array(
                'coll_matter'       =>  $coll_matter,
                'id_formation'      =>  $id_formation,
                'coll_refpedago'    =>  $coll_refpedago
            )
        )->setAjax()
        ->render();
        
    }

    public function listRefpedagoAction(){
        //récupere la collection des matières            
        $collection = App::getCollection('RefPedago');
        
         $coll_refpedago = $collection->getFilteredItems("formations_id","=",$_GET['id']);

         //var_dump($coll_refpedago);
              
        
        $id_formation = $_GET['id'];        
   
        Template::getInstance()->setFileName("Ajax/list_refpedago")->setDatas(
            array(
                'coll_refpedago'      =>  $coll_refpedago,
                'id_formation'        => $id_formation 
            )
        )
        ->setAjax()->render();
        
    }
    
    public function addRefPedagoAction(){

        if($_POST){
            
            $refpedago = App::getModel("RefPedago");        
            $refpedago->store( array(
                    'formations_id' =>  intval($_POST['formation']),
                    'matters_id'    =>  intval($_POST['matter'])
            ));
            $refpedago->save();
            
            Template::getInstance()->setFileName("Ajax/add_single_refpedago")->setDatas(
            array(
                'refpedago'      =>  $refpedago
                )
            )->setAjax()
            ->render();
                    
        }
        
    }
     
    public function deleteRefPedagoAction(){
        
        $refpedago = App::getModel('RefPedago');
        $refpedago->load($_GET['id']);
        
        $matter = App::getModel('Matter');
        $matter->load( $refpedago->getData('matters_id') );      
        
        $refpedago->delete();
        
        Template::getInstance()->setFileName("Ajax/add_single_matter")->setDatas(
        array(
            'matter'      =>  $matter
            )
        )
        ->setAjax()->render();        
        
    }
}



?>