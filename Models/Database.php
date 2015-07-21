<?php

    class Database {
        
        private static $_instance = null;
        private $_host = 'localhost';
        private $_port = '5432';
        private $_dbname = 'GestForm';
        private $_user = 'postgres';
        private $_password = 'postgres';      
        
        private function __construct($_host,$_port,) {
            
                $db = pg_connect("host->"'.$_host.'" port->"'.$_port.'" dbname->"'.$_dbname.'" user->"'.$_user.'" password->"'.$_password.'"")
                         or die('connection failed');
                
                return $db;
                    
        }
        
        private static function getInstance() {
                
            if (!self::$_instance) {
                
                self::$_instance = new Database();
                
            }
            
            return self:: $_instance;
                    
        }
        
    }
