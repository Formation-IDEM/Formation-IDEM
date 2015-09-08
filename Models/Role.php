<?php
    
class Role extends Model
{
    protected $_profiles = null;
    
    public function __construct()
    {
        parent::__construct();

        $this->_table = 'role';
        $this->_fields['id'] = 0;
        $this->_fields['name'] = '';
        $this->_fields['level'] = 10;
    }

    public function getProfiles()
    {
        if(!$this->_profiles)
        {
            $this->_profiles = App::getCollection('Profile')->getFilteredItems('role_id', $this->_fields['id']);
        }
        return $this->_profiles;
    }
}

?>