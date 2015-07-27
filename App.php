<?php
    class App{
        
        private static $_instance = null;
        
        private function __construct(){            
            
        }
        
        public static function getModel($type){
            
            if( file_exists('Models/'.$type.'.php') ){
                
                include_once ('Models/'.$type.'.php');
            
                return new $type();            
                
            }else{
                
                return null;
                
            }
           
            

        }
        
        public static function getInstance(){
            
            // !!!!!!!!!!!!! l'instance d'App est un singleton
            //Il est donc unique !!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            if(!self::$_instance){
                
                self::$_instance = new App();
                                
            }
            
            return self::$_instance;
            
        }
        
        private function getActionName($controller){
            
            if( isset( $_GET['a']) ){
                         
                $a = $_GET['a'].'Action';                

                if( !method_exists($controller,$a) ){
                    
                    $a = "indexAction";
                    
                    return $a;
                    
                } 
                
                return $a;             

            }else{
                
                $a = "indexAction";
                return $a;
                
            }
            
        }
        
        public function run(){
            
            //Création de controlleur----------------------------     
            include_once ('Controllers/ControllerFactory.php');            
            $controller = ControllerFactory::createController();
            
            //On lance l'action
            $action = self::getInstance() -> getActionName($controller);
            $controller -> $action();
            
        }
                
        
    }