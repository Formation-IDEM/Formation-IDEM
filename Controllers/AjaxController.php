<?php

class AjaxController{
    
    public function __construct(){

    }
    
    public function refpedagoAction(){

        //appel la méthode getItems de la class Collection avec la parametre qui va bien
        $collection = App::getCollection('RefPedago');
        
        //On crée la requete via les méthode de création de requete
        $collection->select()->where()->condition('formations_id','=',$_GET['id']);  
        
        //requete construite, on recupe le resultat
        $coll_ref = $collection->getItems();

        //On transmet via setDatas() la collection de formation dans un tableau associatif
        Template::getInstance()->setFileName("Ajax/manage_formations")->setDatas(array(
            'coll_ref' => $coll_ref
        ))->render("ajax");
        
    }
    
    public function removeRefpedagoAction(){
        
        $myRefPedago = App::getModel("RefPedago");
        
        if( isset($_GET['id']) ){
        
            $myRefPedago->load($_GET['id']);
            $myRefPedago->delete();
        
        }
        
    }

}

?>