<?php  

class AjaxController{	

    public function listMatterAction(){

        //récupere la collection des matières            
        $collection = App::getCollection('Matter');
        
        //On récupere les matières lié a l'id de la formation passé dans l'URL
        $collection->select();            
        $coll_matter = $collection->getItems();   
        
   
        Template::getInstance()->setFileName("Ajax/list_matter")->setDatas(
            array(
                'coll_matter'      =>  $coll_matter 
            )
        )->render("ajax");
        
    }

    public function listRefpedagoAction(){
        //récupere la collection des matières            
        $collection = App::getCollection('RefPedago');
        
        //On récupere les matières lié a l'id de la formation passé dans l'URL
        $collection->select()->where()->condition("formations_id","=",$_GET['id']);            
        $coll_refpedago = $collection->getItems();   
        
   
        Template::getInstance()->setFileName("Ajax/list_refpedago")->setDatas(
            array(
                'coll_refpedago'      =>  $coll_refpedago 
            )
        )->render("ajax");
        
    }
    
    public function addRefPedagoAction(){

        
        
    }
}

?>