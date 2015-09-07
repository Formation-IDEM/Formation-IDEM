<?php

class AjaxController
{
	public function listMatterAction(){

        //récupere la collection des matières            
        $collection = App::getCollection('Matter');
        
                   
        $coll_matter = $collection->getAllItems();
        
        $id_formation = $_GET['id'];       
   
        Template::getInstance()->setFileName("Ajax/list_matter")->setDatas(
            array(
                'coll_matter'       =>  $coll_matter,
                'id_formation'      =>  $id_formation
            )
        )
        ->isAjax()
        ->render();
        
    }

    public function listRefpedagoAction(){
        //récupere la collection des matières            
        $collection = App::getCollection('RefPedago');
        $collection->where('formations_id',$_GET['id'])->all();
        $coll_refpedago = $collection->getAllItems();
        
        $id_formation = $_GET['id'];        
   
        Template::getInstance()->setFileName("Ajax/list_refpedago")->setDatas(
            array(
                'coll_refpedago'      =>  $coll_refpedago,
                'id_formation'        => $id_formation 
            )
        )
        ->isAjax()
        ->render();
        
    }
    
    public function addRefPedagoAction(){

        if($_POST){
            
            $refpedago = App::getModel("RefPedago");        
            $refpedago->store( array(
                    'formations_id' =>  $_POST['formation'],
                    'matters_id'    =>  $_POST['matter']
            ));
            $refpedago->save();
            
            Template::getInstance()->setFileName("Ajax/add_single_refpedago")->setDatas(
            array(
                'refpedago'      =>  $refpedago
                )
            )
            ->isAjax()
            ->render();
                    
        }
        
    }
    
    public function deleteRefPedagoAction(){
        
        $refpedago = App::getModel("RefPedago");
        
        if( isset($_GET['id']) ){
        
            $refpedago->load($_GET['id']);
            $refpedago->delete();
            
        }
        
    }
    
	public function listTrainerAction()
	{
		if($_POST['firstname'] != null)
		{
			$trainers = App::getCollection('Trainer')->where('firstname','LIKE',$_POST['firstname'])->all();			
		}
		else
		{
			$trainers = App::getCollection('Trainer')->all();
		}
		Template::getInstance()
			->setDatas(array(
					'trainers' => $trainers
							))
			->setFilename('Ajax/trainer-list')
			->isAjax()
			->render();
	}

	public function autoCompleteAction()
	{
		$trainers = App::getCollection('Trainer')->select('firstname')->where('firstname','LIKE',$_GET['q'])->get();
		//var_dump($trainers);
		foreach($trainers as $trainer)
		{
			$json[] = $trainer->firstname;
		}
		echo json_encode($json);
	}

	public function editLevelFormAction()
	{
		$level = App::getModel('Level')->load($_POST['id']);
		Template::getInstance()
			->setDatas(array(
					'level' 	=> $level,
					'trainer'	=> $level->getTrainer()
					))
			->isAjax()
			->setFilename('Ajax/edit-level')
			->render();
	}

	public function editLevelAction()
	{
		$level = App::getModel('Level')->load($_POST['id'])->store($_POST)->save();
		Template::getInstance()
			->setDatas(array(
					'trainer'	=> $level->getTrainer()
					))
			->isAjax()
			->setFilename('Ajax/levels')
			->render();
	}
}