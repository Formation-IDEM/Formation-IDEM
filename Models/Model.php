<?php
    
    include_once ('Database.php');
    
    class Model{
        
        protected $_table = '';
    
        protected $_fields = array();
    
        public function load($id){
            
            $table = $this -> _table;
        
        
            $connexion = Database::getInstance() -> getConnexion();
            
            //$resultats = $connexion -> query("SELECT * FROM".$table."WHERE id=".$id);
            
            $result = Database::getInstance() -> getResultats("SELECT * FROM " .$table." WHERE id=".$id);
            
            
            foreach($result as $key => $value){
                
                if(array_key_exists($key,$this -> fields)){
                    
                    $this -> fields[$key] = $value;
                }
                
            }
            
            return $this;
                
        }
        
        //$donnee est un tableau associatif de donnée
        public function store($donnee){
            
            //Pour chaque ligne du tableau associatif
            foreach($donnee as $key => $value){
                
                //Si la clef est présente dans le tableau fields de l'objet
                if(array_key_exists($key,$this -> fields)){
                    
                    //Si il existe alors on met la valeur de la clef fourni dans donnee
                    //Dans le tableau associatif de l'object
                    $this -> fields[$key] = $value;
                }
                
            }
            
            return $this;
                        
        }
        
        public function save(){
            
            //connexion a la bdd
            $connexion = Database::getInstance() -> getConnexion();
            $i = 1;
            
            //Si l'id = 0, c'est une insertion    
            if($this -> _fields['id'] == 0 ){
                
                $colonne ="";
                $valeur ="";
                
                foreach ($this -> _fields as $key => $value) {
                    
                    $colonne .= $key;
                    
                    //Si c'est un string, on met les quotes
                    if(is_string($value)){
                        
                        $valeur .= "'".$value."'";
                    
                    //Sinon on les met pas    
                    }else{
                        
                        $valeur .= $value;
                        
                    }
                    
                    //Si on est pas sur la dernière itération, on met des virgules
                    if( $i != count($this -> _fields) ){
                        
                        $valeur .= ",";
                        $colonne .= ",";
                                            
                    }
                    
                    $i++;
                    
                }
                //affecte les variables construite précedement dans la requete
                $req = "INSERT INTO ".$this -> _table." (".$colonne.") VALUES (".$valeur.")";
                
                if( Database::getInstance()->getResultats( $req ) ) {
                    
                    $this->_fields['id'] = Database::getInstance()->getLastInsertId();
                    return $this;
                    
                } else {
                    
                    return false;
                    
                } 
                
                
            }else{
                
                //Sinon c'est un update on crée la requet update
                $req = "UPDATE ".$this -> _table." SET ";

                foreach ($this -> _fields  as $key => $value){
                    
                    $req .= $key."=";
                    
                    //Si c'est un string, on met des quotes
                    if( is_string($value) ){
                        
                        $req .= "'".$value."'";
                        
                    }else{
                        
                        //sinon pas de quote
                        $req .= $value;
                        
                    }
                    
                    //Si on est pas sur la dernière itération
                    //On ajoute une virgule  
                    if( $i < count($this -> _fields) ){
                        
                        $req .= ",";
                        
                    }
                    
                    $i++;
                    
                }
                            
                //update là où id correspond         
                $req .= " WHERE id=".$this -> _fields['id'];
                
            }
            
            //Effectue la requete
            
            if( Database::getInstance()->getResultats( $req ) ) {
                return $this;
            } else {
                return false;
            }
                        
        }
        
        public function delete(){            
            
            if( $this->getData('id') ) {
                return Database::getResultat('DELETE * FROM '.$this -> _table.' WHERE '.$this -> getData('id'));
            } 
            return false;
            
        }
        
        function getData($key){
            
            if( isset( $this -> _fields[$key] ) ){
                
                return $this -> _fields[$key];
                
            }
            
        }
       
    }
?>