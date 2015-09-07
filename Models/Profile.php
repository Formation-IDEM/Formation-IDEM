<?php
    
class Profile extends Model
{
    protected $_announces = null;
    
    protected $_role = null;
    
    public function __construct()
    {
        parent::__construct();

        $this->_table = 'profile';
        $this->_fields['id'] = 0;
        $this->_fields['firstname'] = '';
        $this->_fields['lastname'] = '';
        $this->_fields['email'] = '';
        $this->_fields['phone'] = '';
        $this->_fields['password'] = 0;
        $this->_fields['salt'] = null;
        $this->_fields['session_key'] = 0;
        $this->_fields['role_id'] = 2;
    }

    public function getAnnounces()
    {
        if(!$this->_announces)
        {
            $this->_announces = App::getCollection('Announce')->getFilteredItems('profile_id', $this->_fields['id']);
        }
        return $this->_announces;
    }

    public function getRole()
    {
        if(!$this->_role)
        {
            $this->_role = App::getModel('Role')->load($this->_fields['role_id']);
        }
        return $this->_role;
    }

    public function encryptPassword($password)
    {
        if($password != null)
        {
            // Algo cryptage
            if(!$this->_fields['salt'])
            {
                $this->_fields['salt'] = md5(rand());                
            }
            return md5($password.$this->_fields['salt']);
            // Fin algo cryptage
        }
    }

    public function isAdmin()
    {
        if($this->_fields['role_id'] < 2)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function logged()
    {
        if(isset($_SESSION['login'], $_SESSION['profile_id']) && $_SESSION['login'])
        {
            return $this->load($_SESSION['profile_id']);
        }
        else
        {
            return false;
        }
    }

    public function profile()
    {
        if(isset($_SESSION['login'], $_SESSION['profile_id']) && $_SESSION['login'])
        {
            return $this->load($_SESSION['profile_id']);
        }
        else
        {
            return $this;
        }
    }
}

?>