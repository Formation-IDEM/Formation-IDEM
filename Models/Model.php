<?php
    
    include_once ('Database.php');
    abstract class Model{
        
        
    
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
                    $this -> fields[$key] = $key -> $value;
                }
                
            }
            
            return $this;
                        
        }
        
        public function save(){
            
            $connexion = Database::getInstance() -> getConnexion();
                
            if($this -> _fields['id'] == 0 ){
                
                //Si l'id = 0, c'est une insertion
                $req = "INSERT INTO client () 
                        VALUES ();";
                
            }else{
                
                //Sinon c'est un update
                $req = "UPDATE table 
                        SET colonne_1 = 'valeur 1',
                            colonne_2 = 'valeur 2',
                            colonne_3 = 'valeur 3'
                        WHERE id=".$this -> _fields['id'];
                
            }           
            
        }
        
        public function delete(){            
            
            $requete = 'DELETE * FROM '.$this -> getTable().' WHERE '.$this -> getId(); 
             
            $row = Database::getResultat($requete);
            
        }
        
        //----------------------------------------------------------------------------------------------
        //Lecture de field----------------------------------------------------------------
        protected function getFields(){
            
            return $this -> _fields;
            
        }
        protected function setFields($fields){
            
            $this -> _fields = $fields;
            
        } 

        //----------------------------------------------------------------------------------------------
        //Lecture de table----------------------------------------------------------------
        protected function getTable(){
            
            return $this -> _table;
            
        }
        
        protected function setTable($table){
            
            $this -> _table = $table;
            
        }
       
    }