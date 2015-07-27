<?php

    class Template{        
        
        //attribut du singleton
        private static $_instance = null;
        
        protected $_filename = "index";
        
        protected $_datas = array();
        
        private function __construct(){            
            
        }
        
        public function render(){
            
            
            
        } 

        //singleton
        public static function getInstance(){
        
            if(!self::$_instance){
                
                self::$_instance = new Template();
                                
            }
            
            return self::$_instance;
            
        }
        
        //Prend en parametre un string
        public function setFileName($a){
            
            $this -> _filename = $a;
            
            return $this -> _filename;
            
        }
        
        //Prend un parametre un array()
        public function setDatas($a){
            
            $this -> _Datas = $a;
            
            return $this -> _Datas;
            
        }
    }
