<?php

include_once ('Models/Database.php');

class Model {

    protected $_table = '';
    
    protected $_fields = array();

    public function __construct() {
        
    }

    
    /*
     * Recupere la valeur dans $_fields par rapport à $code
     */
    public function getData( $code ) {
        if( isset($this->_fields[$code]) ) {
            
            return $this->_fields[$code];
            
        }
        return '';
    }
    
    public function getDate( $code ) {
        if( isset($this->_fields[$code]) ) {
            
            $date = strtotime( $this->_fields[$code] );
            return date("d/m/y",$date);
            
        }
        return '';
    }

    
    
    
    /*
     * Charge un objet depuis la bdd grâce à son $id
     */
    public function load($id) {
        $results = Database::getInstance()->getResultat( "SELECT * FROM " . $this->_table . " WHERE id = " . $id );
        foreach( $results as $columName => $data ) {
            if( array_key_exists($columName, $this->_fields) ) {
                $this->_fields[$columName] = $data;
            }
        }
        return $this;
    }
    
    
    
    
    /*
     * Renseigne l'objet grâce aux valeurs contenus dans $donnees
     */
    function store($donnes) {
        foreach( $donnes as $columName => $data ) {
            if( array_key_exists($columName, $this->_fields) ) {
                $this->_fields[$columName] = $data;
            }
        }
        return $this;
    }
    
    
    /*
     * Enregistre l'objet en bdd
     */
    function save() {
        if( $this->getData('id') ) { // Mise à jour
            $sql = "UPDATE " . $this->_table . " SET ";
            $i = 1;
            foreach( $this->_fields as $fieldName => $fieldValue ) {
                $sql .= $fieldName . " = ";
                if( is_string($fieldValue) ) {
                    $sql .= "'" . $fieldValue . "'";
                } else {
                    $sql .= $fieldValue;
                }
                if( $i != sizeof($this->_fields) ) {
                    $sql .= ', ';
                }
                $i++;
            }
            $sql .= " WHERE id = " . $this->getData('id');
            var_dump($sql);
            if( Database::getInstance()->getResultats( $sql ) ) {
                return $this;
            } else {
                return false;
            }
            
        } else { // Création        
            
            $sql = "INSERT INTO " . $this->_table . " ";
            $fields = array(); 
            $preparedValues=array(); 
            $preparedNames=array();

            foreach( $this->_fields as $fieldName => $fieldValue ) {

                if($fieldName != 'id'){
                    $fields[] = $fieldName;
                    $preparedNames[] = ":".$fieldName;
                    $preparedValues[":".$fieldName]=$fieldValue;
                }
            }

            $sql.= "(".implode(", ",$fields).")";
            $sql.= "VALUES " ;
            $sql.= "(".implode(", ",$preparedNames).")";           

            //var_dump($sql,$preparedNames,$preparedValues);
            $test = Database::getInstance()->getConnexion()->prepare($sql);

            //var_dump($sql);

            //$test->execute($preparedValues);
              
            if( $test->execute($preparedValues) ) {
                $this->_fields['id'] = Database::getInstance()->getLastInsertId();          
                return $this;
            } else {
                
                return false;
            }
            

            /*
            if( Database::getInstance()->getResultats( $request ) ) {
                $this->_fields['id'] = Database::getInstance()->getLastInsertId();          
                return $this;
            } else {
                
                return false;
            }*/ 
        }
    }
    
    
    
    /*
     * Supprime un objet en bdd
     */
    function delete() {
        if( $this->getData('id') ) {
            return Database::getInstance()->getResultats( "DELETE FROM " . $this->_table . " WHERE id = " . $this->getData('id') );
        }
        return false;
    }


}

?>