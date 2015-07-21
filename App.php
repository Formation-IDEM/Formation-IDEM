<?php

    class App {
        
        private static $_instance = null; // = null set au départ
        
        // ----------------------------------------------------------------------------------------------------
        // Contructeur en private pour éviter l'appel depuis l'extérieur de la classe et éviter les répétitions
            
        private function __construct() {
                
        }
       
        public function run() {
 
            include_once ('Controllers/ControllerFactory.php');
            
            //-------------------------------------------------------------------------------------------------
            // Récupération d'une instance du controleur createController depuis ControllerFactory
            // dans la variable $controller
            
            $controller = ControllerFactory::createController();
            
            
            // ------------------------------------------------------------------------------------------------
            // On appelle la methode getActionName sur l'instance de App
            
            $a = self::getInstance() -> getActionName($controller);
            
            $controller -> $a();
            
        }

        private function getActionName($controller) {
            
            if( isset ($_GET['a']) ) {
            
                $a = $_GET['a'].'Action';
                    
                if ( !method_exists( $controller, $a) ) {
                    
                    $a = "indexAction";     // si elle existe pas on bascule sur la méthode par défaut
                    
                    return $a;
                    
                }
                
                return $a;
                    
            }else{
                
                $a = "indexAction";         // si elle existe pas dans l'URL on bascule sur la méthode par défaut
                
                return $a;
            }

        }                    
        // ----------------------------------------------------------------------------------------------------
        // Appel de l'instance dans index.php App:: getInstance();
        
        public static function getInstance() {
                
            if (!self::$_instance) {
                
                self::$_instance = new App();
                
            }
            
        // ----------------------------------------------------------------------------------------------------
        // dans index.php $nomApp = App::getInstance();
            
            return self:: $_instance;
            
        }
        
    }

?>