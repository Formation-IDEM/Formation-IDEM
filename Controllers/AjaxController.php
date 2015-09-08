<?php  

class AjaxController{	

    public function listMatterAction(){

        //récupere la collection des matières            
        $collection = App::getCollection('Matter');        
        $collection->select();        
        $coll_matter = $collection->getItems();
        
        //récupere la collection des refPedago lié a la formation 
        $collection = App::getCollection('RefPedago');        
        $collection->select()->where()->condition("formations_id","=",$_GET['id']);     
        $coll_refpedago = $collection->getItems();
        
        //On récupere l'ID de la formation        
        $id_formation = $_GET['id'];       
   
        Template::getInstance()->setFileName("Ajax/list_matter")->setDatas(
            array(
                'coll_matter'       =>  $coll_matter,
                'id_formation'      =>  $id_formation,
                'coll_refpedago'    =>  $coll_refpedago
            )
        )->render("ajax");
        
    }

    public function listRefpedagoAction(){
        //récupere la collection des matières            
        $collection = App::getCollection('RefPedago');
        
        $collection->select()->where()->condition("formations_id","=",$_GET['id']);
              
        $coll_refpedago = $collection->getItems();
        
        $id_formation = $_GET['id'];        
   
        Template::getInstance()->setFileName("Ajax/list_refpedago")->setDatas(
            array(
                'coll_refpedago'      =>  $coll_refpedago,
                'id_formation'        => $id_formation 
            )
        )->render("ajax");
        
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
            )->render("ajax");
                    
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
        )->render("ajax");        
        
    }
}

?>