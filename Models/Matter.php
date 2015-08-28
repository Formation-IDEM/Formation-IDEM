<?php
    
class Matter extends Model
{

    public function __construct()
    {
        parent::__construct();

        $this->_table = 'matters';
        $this->_fields['id'] = 0;
        $this->_fields['title'] = '';
    } 
}

?>