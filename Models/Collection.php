<?php

include_once('Database.php');

class Collection
{   
    protected $_table;

    protected $_field;

    protected $_model_name;

    protected $_items = null;

    protected $_item = null;

    public function __construct(){}

    public function getFilteredItems($field, $ope, $val)
    {
        if(!$this->_items)
        {
            if($ope == 'LIKE')
            {
                $val = "'".$val."'";
            }
            $query = 'SELECT * FROM '.$this->_table.' WHERE '. $field .' '. $ope .' '. $val;
            $results = Database::getInstance()->getResults($query);
            // var_dump(expression)ump($results);
            $items = array();
            foreach($results as $item) 
            {
                $this->_items[$item['id']] = App::getModel($this->_model_name)->load($item['id']);
            }           
        }
        return $this->_items;
    }

    public function getDoubleFilteredItems($field1, $id1, $field2, $id2)
    {
        if(!$this->_items)
        {
            $query = 'SELECT * FROM '.$this->_table.' WHERE '.$field1.' = '.$id1.' AND '.$field2.' = '.$id2.' AND active = TRUE';
            $results = Database::getInstance()->getResults($query);
            $items = array();
            foreach($results as $item) 
            {
                $this->_items[$item['id']] = App::getModel($this->_model_name)->load($item['id']);
            }           
        }
        return $this->_items;
    }

    public function getAllItems()
    {
        if(!$this->_items)
        {
            $query = 'SELECT * FROM '.$this->_table;
            $results = Database::getInstance()->getResults($query);
            $items = array();
            foreach($results as $item) 
            {
                $this->_items[$item['id']] = App::getModel($this->_model_name)->load($item['id']);
            }           
        }
        return $this->_items;
    }
}

?>