<?php

    class ControllerFactory {
        
        private static function __contruct(){
            
        }

        public static function createController(){

        // -----------------------------------------------------------------------------------------------------
        // 1 - Vérification des paramètres dans l'URL pour la variable $_GET['c']
        
            if( isset ($_GET['c']) ) {
                
                $c = $_GET['c'].'Controller';
                
        // -----------------------------------------------------------------------------------------------------
        // 2 - En cas de paramètre vide ou erronée on définit une valeur par défaut à $c
        
                if ( !file_exists('Controllers/'.$c.'.php') ) {
                    
                    $c = "FrontController";
                    
                }
                    
            }else{
                
                $c = "FrontController";
            }
        // -----------------------------------------------------------------------------------------------------
        // 3 - Inclusion du fichier du Controller
        
            include_once ('Controllers/'.$c.'.php');

        // -----------------------------------------------------------------------------------------------------
        // 4 - On instancie l'objet du Controller
        
            $controller = new $c();
            
            return $controller;
            
        }
               
    }

?>