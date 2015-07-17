<?php
    class SessionFormation extends Formation{
        
        private $_id;
        private $_date_debut;
        private $_date_fin;
        
        public function __construct(){
            
        }
        
        public function getDateDebut(){
            
            return $this -> _date_debut;
            
        }
        
        public function getDateFin(){
            
            return $this -> _date_fin;
            
        }
    }
