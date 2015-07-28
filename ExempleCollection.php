<?php

class Collection
{
    protected $_db;
    protected $_modelName;
    protected $_table;

   public function __construct()
   {
       $this->_db = Database::getInstance();
   }
}

class InternshipCollection extends Collection
{
    public function __construct()
    {
        parent::__construct();
        $this->_table = 'internships';
        $this->_modelName = 'Internship';
    }

    public function getItems($id)
    {
        $sql = 'SELECT * FROM ' . $this->_table . ' WHERE company_id = \'' . $id . '\'';
        $result =  $this->_db->query($sql);
        return $result;
    }
}

class Company extends Model
{
    public function getInternships()
    {
        return App::getCollection('internships')->getItems($this->getData('id'));
    }
}

$item = App::getInstance()->getModel('company')->load(1);

$item->getData('name');

foreach($item->getInternships($item->getData('id')) as $stages )
{
    $stage->getData('title');
}