<?php
include_once'Controllers/Database.php';

abstract class Model
{
	
		protected $_table;
		protected $_fields = array();
		
		public function __construct()
		{
			
		}
	
	function getData($key)
	{
		if(isset($this->_fields[$key]))
		{
			return $this->_fields[$key];
		}
			return "";
	}
	
	public function load($id) // charge un objet depuis la bdd
	{
		$Data = Database::getInstance()->getResult('SELECT * FROM '. $this->_table.' WHERE id = '.$id);
		foreach ($Data as $key => $value) 
		{
			if(array_key_exists($key, $this->_fields))
			{
				$this->_fields[$key] = $value;
			}
		}
		return $this;
		
	}
	
	
	
	public function store($donnees)//function store() // associe un retour de form (post) sur un objet
	{
		foreach ($donnees as $key => $value)
		{
			if(array_key_exists($key, $this->$_fields))
			{
				$this->_fields[$key] = $value;
			}
		}
		return $this;
	}
	
	
	
	public function delete() // supprime un objet en bdd
	{
		if($this->getData('id'))
		{
			$this->_fields['id'] = Database::getInstance()->getResult('DELETE FROM ' .$this->_table. ' WHERE id = '.$this->_field[id]);
			return $this;
		}
			return false;		
	}
	
	
	
	public function save()// enregistre l'objet en bdd
	{
		
		if($this->getData('id'))	//modification de l'objet
		{
			$i = 1;
			$sql = "UPDATE " .$this->_table. "SET";
			foreach($this->_fields as $key=>$value)
				{
					$sql.= $key. " = ";
					if(is_string($value))
					{
						$sql.="'" .$value. "'";
					}else{
						$sql.= $value;
					} 
					if($i != sizeof($this->_field))
					{
						$sql.= ",";
					}
					 $i++;
				}	
				 $sql.= " WHERE id = ".$this->getData('id');
				 
				if(Database::getInstance()->execute($sql))
				{
					return $this;
				}else{
					return false;
				}
			 
		}else{						//création de l'objet
			
			$i = 1;
			$col = "";
			$val = "";
			
			foreach($this->_fields as $key=>$value)		
			{
				if($key == 'id')
				{
					$i++;
					continue;
				}
				$col.= $key;
				if(is_string($value))
				{
					$val.= "'" .$value. "'";
				}else{
					$val.= $value;
				}
				if(i != sizeof($this->fields))
				{
					$col.= ",";
					$val.= ",";
				}
				$i++;
			}
			$sql = " INSERT INTO " .$this->_table. "(" .$col. ") VALUE (" .$val. ")";
			if(Database::getInstance()->execute($sql))
			{
				$this->_fields['id'] = Database::getInstance()->getLastInsertId();
				return $this;
			}else{
				return false;
			}			
		}
		
	}
	
	
}


?>