<?php
    class Database{
        
        private static $_instance = null;
        
        private $_connexion;
        private $_dsn = "localhost";
        private $_db = "gestForm";
        private $_user = "postgre";
        private $_password = "postgre";

        
        public function __construct($dsn, $db, $user, $password) {
            
            self::$_connexion = new PDO('pgsql: host='.$dsn.' dbname='.$db.' user='.$user.' password='.$password);
            
        }
        
        public static function getDatabase(){
            
            if(!self::$_instance){
                
                self::$_instance = new Database();
                                
            }
            
            return self::$_instance;
            
        }
        
//Les méthodes get et set des attributs ci dessous----------------------------------------------------
        
        public function getDsn(){
            
            return $this -> _dsn;
            
        }
        
        public function setDsn($n){
            
            $this -> _dsn = $n;            
            
        }
        
        public function getDb(){

            return $this -> _db;
            
        }
        
        public function setDb($n){
            
            $this -> _db = $n;
            
        }
        
        public function getUser(){

            return $this -> _user;
            
        }
        
        public function setUser($n){
            
            $this -> _user = $n;
            
        }
        
         public function getPassword(){

            return $this -> _password;
            
        }
        
        public function setPassword($n){
            
            $this -> _password = $n;
            
        }
        
    }