<?php
    
    class Matter extends Model{
        private $_id;
        private $_title;

        public function __contruct(){
            
            
        }
        
        //----------------------------------------------------------
        //Lecture et mise a jour de l'id------------------
        public function getId(){
            
            return $this -> _id;
        }
        
        public function setTitle($id){
            
            $this -> _id = $id;
            
        }
            
        //----------------------------------------------------------
        //Lecture et mise a jour de l'intitulé------------------
        public function getTitle(){
            
            return $this -> _title;
        }
        
        public function setTitle($title){
            
            $this -> _title = $title;
            
        }   
        
        
            
    }