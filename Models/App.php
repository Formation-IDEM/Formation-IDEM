<?php
    class App{
        
        private static $_instance = null;
        private $_c;
        
        private function __construct(){            
            
        }
        
        public static function getInstance(){
            
            if(!self::$_instance){
                
                self::$_instance = new App();
                                
            }
            
            return self::$_instance;
            
        }
        
        public function run(){
            
            //Check le parametre c, et l'initialise-------------------------------
            if( isset($_GET['c']) ){
                
                $c = $_GET['c']."Controller";
                
                //Si le chemin est incorrecte ou que le controlleur n'existe pas
                if( !file_exists('Controllers/'.$c.'.php') ){
                    
                    $c = "FrontController";
                    
                }
                //----------------------------------              
            }else{
                
                $c = "FrontController";
                
            }
            //----------------------------------------------------------------------
            
            //Une fois que le controlleur est test, on le crée----------------------
            include_once ('Controllers/'.$c.'.php');            
            $controller = new $c();
            //----------------------------------------------------------------------
            
            
            //Check le parametre a, et l'initialise---------------------------------
            if( isset( $_GET['a']) ){
                
                $a = $_GET['a'].'Action';
                
                //on check si la methode existe pas-------------------
                if( !method_exists($controller,$a) ){
                    
                    $a = "indexAction";
                    
                }              
                //----------------------------------------------------
            }else{
                
                $a = "indexAction";
                
            }
            //-----------------------------------------------------------------------
            
            //Une fois que l'action est check on la lance
            $controller -> $a();
            
        }
                
        
    }