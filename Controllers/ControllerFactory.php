<?php

    class ControllerFactory{
        
        public function __construct(){
            
        }
        
        public static function createController(){

            if( isset($_GET['c']) ) {
                
                $type = $_GET['c'];
                    
            } else {
                
                $type = "Front";
                
            }           
               
            $c = $type."Controller";
            
            //Si le chemin est incorrecte ou que le controlleur n'existe pas
            if( !file_exists('Controllers/'.$c.'.php') ){
                
                $c = "FrontController";
                
            }
           
            //Une fois que le controlleur est test, on le crée
            include_once ('Controllers/'.$c.'.php');             
                  
            $controller = new $c();
            
            return $controller;
        }
        
    }
