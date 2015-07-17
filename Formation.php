<?php
    //include_once('Formation.php');
    //On ajoute abstract devant class si la classe est abstraite et qu'on ne veut pas l'appelé directement
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
            //parent::__construct($heure)
            
        }
        

        public function getHeureConventionCentre(){
            
            return $this -> _heure_convention_centre;
            
        }
    }