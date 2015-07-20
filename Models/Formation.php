<?php
    class Formation{        
        
        private $_id;
        private $_intitule;
        private $_effectif_moyen;
        private $_code_marche;
        private $_heure_convention_centre;
        private $_heure_convention_entreprise;
        private $_donneur_ordre;
        private $_date_debut_marche;
        private $_date_fin_marche;        
        
        public function __construct($heure){
            
            $this -> _heure_convention_centre = $heure;
            
        }        

        public function getHeureConventionCentre(){
            
            return $this -> _heure_convention_centre;
            
        }
    }