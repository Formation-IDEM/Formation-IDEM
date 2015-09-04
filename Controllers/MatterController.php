<?php

    class MatterController{
        
        public function __construct(){
            
        }
        
        public function indexAction(){
                
            //appel la méthode getItems de la class Collection avec la parametre qui va bien
            $collection = App::getModel('Matter');
            
            //On récupere le tableau d'object via la méthode pour récuperé une collection
            $coll_matters = $collection->getItems();
            
            //On transmet via setDatas() la collection de formation dans un tableau associatif
            Template::getInstance()->setFileName("Formation/list_matters")->setDatas(array(
                'coll_matters' => $coll_matters
            ))->render();
            
        }
        
        public function editAction(){
            
            echo "Edit matière";
            
        }
        
        public function deleteAction(){
 
            echo "Suppression matière"; 
            
        }
        
    }
