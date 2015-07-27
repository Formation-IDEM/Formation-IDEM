<?php

    class FormationController{
        
        public function __construct(){
            
        }
        
        public function indexAction(){
            
            $a = App::getModel('Formation');
            
            $b = $a -> save();
            
        }
        
        public function editAction(){
            
            echo "Edit formation";
            
        }
        
        public function deleteAction(){
 
            echo "Suppression formation"; 
            
        }
        
    }
