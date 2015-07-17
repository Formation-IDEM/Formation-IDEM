<?php

    class Formation{

        private $_id;
        private $_average_effective;
        private $_convention_hour_in_center;
        private $_convention_hour_in_company;
        private $_title;
        private $_deal_code;
        private $_order_giver;
        private $_deal_begin_date;
        private $_deal_ending_date;
        
        public function __construct(){
            
        }
        
        //----------------------------------------------------------------------------------------------
        //Lecture et mise à jour de l'id----------------------------------------------------------------
        public function getId(){
            
            return $this -> _id;
            
        }
        
        public function setId($id){
            
            $this -> _id = $id;
            
        }

        //----------------------------------------------------------------------------------------------
        //Lecture et mise à jour des effectif moyen des formations--------------------------------------        
        public function getAverageEffective(){
            
            return $this -> _average_effective;
            
        }
        
        public function setAverageEffective($average_effective){
            
            $this -> _average_effective = $average_effective;
            
        }

        //----------------------------------------------------------------------------------------------
        //Lecture et mise à jour des heures conventionnées en centre------------------------------------
        public function getConventionHourInCenter(){
            
            return $this -> _convention_hour_in_center;
            
        }
        
        public function setConventionHourInCenter($convention_hour_in_center){
            
            $this -> _convention_hour_in_center = $convention_hour_in_center;
            
        }

        //----------------------------------------------------------------------------------------------
        //Lecture et mise à jour des heures conventionnées en entreprise--------------------------------
        public function getConventionHourInCompany(){
            
            return $this -> _convention_hour_in_company;
            
        }
        
        public function setConventionHourInCompany($convention_hour_in_company){
            
            $this -> _convention_hour_in_company = $convention_hour_in_company;
            
        }

        //----------------------------------------------------------------------------------------------
        //Lecture et mise à jour des intitulés des Formations-------------------------------------------
        public function getTitle(){
            
            return $this -> _title;
            
        }
        
        public function setTitle($title){
            
            $this -> _title = $title;
            
        }

        //----------------------------------------------------------------------------------------------
        //Lecture et mise à jour des codes de marché des Formations-------------------------------------        
        public function getDealCode(){
            
            return $this -> _deal_code;
            
        }
        
        public function setDealCode($deal_code){
            
            $this -> _deal_code = $deal_code;
            
        }        

        //----------------------------------------------------------------------------------------------
        //Lecture et mise à jour des noms des ordonnateurs de marché des Formations---------------------                
        public function getOrderGiver(){
            
            return $this -> _order_giver;
            
        }
        
        public function setOrderGiver($order_giver){
            
            $this -> _order_giver = $order_giver;
            
        }  

        //----------------------------------------------------------------------------------------------
        //Lecture et mise à jour de la date de commencement d'un marché de Formation--------------------        
        public function getDealBeginDate(){
            
            return $this -> _deal_begin_date;
            
        }
        
        public function setDealBeginDate($deal_begin_date){
            
            $this -> _deal_begin_date = $deal_begin_date;
            
        }  

        //----------------------------------------------------------------------------------------------
        //Lecture et mise à jour de la date de fin d'un marché de Formation-----------------------------        
        public function getDealEndingDate(){
            
            return $this -> _deal_ending_date;
            
        }
        
        public function setDealEndingDate($deal_ending_date){
            
            $this -> _deal_ending_date = $deal_ending_date;
            
        }  

        
    }
    
?>
