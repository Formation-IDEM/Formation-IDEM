<?php  

class Database{
    
    
    private static $_instance = null;
    
    private $_connexion;
    private $_host ="localhost";
    private $_user ="postgres";
    private $_password ="postgres";
    private $_dbname ="gestForm";
    
    
    private function __contruct(){
        
                
        
        $this -> _connexion = $this -> getConnexion();
        
    }   
    
    
    public function getConnexion(){
        
        $this -> _connexion = new PDO("pgsql:host=localhost;user=postgres;password=postgres;dbname=gestForm");
        
    }
    
    public function getResultats($req){
        
        $resultats = $this -> _connexion -> query($req);
        
        if($resultats){
        
            $donnees = $resultats->fetchAll();
            var_dump($resultats);
            return $donnees;            
        
        }
        return array();
    }
    
    
    
    public static function getInstance(){
        
        //on test s'il n'y a pas d'instance
        if (!self::$_instance){
            
            //on crée une nouvelle instance
            self::$_instance = new Database();
            
        }
        
        //on retourne l'instance
        return self::$_instance;
        
    
    } 
    
    
}