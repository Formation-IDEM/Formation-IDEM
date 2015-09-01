<?php

/**
 * Class Collection
 */
class Collection
{
	protected $db;

	protected $_table;
	protected $_model_name;
	protected $_items = [];

	//	Requête
	protected $fields;
	protected $conditions = [];
	protected $from;
	protected $join = [];
	protected $orderBy;
	protected $orderFields;
	protected $limit;

	public function __construct()
	{
		$this->db = Database::getInstance()->getConnection();
	}

	/**
	 * Retourne plusieurs lignes en fonction d'un champ et d'une ID
	 *
	 * @param $field
	 * @param $id
	 * @return null
	 */
	public function getFilteredItems($field, $id)
	{
		if(!$this->_items)
		{
			$query = 'SELECT * FROM '.$this->_table.' WHERE '.$field.' = '.$id.' AND active = TRUE';
			$results = Database::getInstance()->getResults($query);
			foreach($results as $item) 
			{
				$this->_items[$item['id']] = App::getModel($this->_model_name)->load($item['id']);
			}			
		}
		return $this->_items;
	}

	/**
	 * Retourne plusieurs lignes en fonction de 2 champs et une ID
	 *
	 * @param $field1
	 * @param $id1
	 * @param $field2
	 * @param $id2
	 * @return null
	 */
	public function getDoubleFilteredItems($field1, $id1, $field2, $id2)
	{
		if(!$this->_items)
		{
			$query = 'SELECT * FROM '.$this->_table.' WHERE '.$field1.' = '.$id1.' AND '.$field2.' = '.$id2.' AND active = TRUE';
			$results = Database::getInstance()->getResults($query);
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
			$query = 'SELECT * FROM '.$this->_table.' WHERE active = TRUE';
			$results = Database::getInstance()->getResults($query);
			foreach($results as $item) 
			{
				$this->_items[$item['id']] = App::getModel($this->_model_name)->load($item['id']);
			}			
		}
		return $this->_items;
	}

	/**
	 * Détermine les champs à sélectionner
	 *
	 * @param string $fields
	 * @return $this
	 */
	public function select($fields = '*')
	{
		$this->fields = $fields;
		return $this;
	}

	/**
	 * Permet d'effectuer une requête de type COUNT()
	 *
	 * @param string $field
	 * @param string $where
	 * @return $this
	 */
	public function count($field = '*', $where = '')
	{
		return Database::getInstance()->count($this->_table, $field, $where);
	}

	/**
	 * Détermine la table où récupérer les données
	 *
	 * @param $table
	 * @return $this
	 */
	public function from($table)
	{
		$this->from = $table;
		return $this;
	}

	public function join($table, $compare, $method = 'INNER')
	{
		$this->join[] = [
			'table'		=>	$table,
			'compare'	=>	$compare,
			'method'		=>	$method
		];
		return $this;
	}

	/**
	 * Condition WHERE
	 *
	 * @param $key
	 * @param $cond
	 * @param $value
	 * @return $this
	 */
	public function where($key, $cond, $value)
	{
		$this->conditions[] = [
			'key'	=>	$key,
			'cond'	=>	$cond,
			'value'	=>	$value
		];
		return $this;
	}

	/**
	 * Tri des données
	 *
	 * @param        $fields
	 * @param string $order
	 * @return $this
	 */
	public function orderBy($fields, $order = 'ASC')
	{
		if( $this->join )
		{
			$this->orderFields = $this->from . '.' . $fields;
		}
		else
		{
			$this->orderFields = $fields;
		}

		$this->orderBy = $order;
		return $this;
	}

	/**
	 * Allias par rapport à la date
	 *
	 * @param string $field
	 * @return $this
	 */
	public function oldest($field = 'create_date')
	{
		$this->orderBy($field, 'ASC');
		return $this;
	}

	/**
	 * Allias par rapport à la date
	 *
	 * @param string $field
	 * @return $this
	 */
	public function latest($field = 'create_date')
	{
		$this->orderBy($field, 'DESC');
		return $this;
	}

	/**
	 * Limite d'affichage
	 *
	 * @param      $begin
	 * @param null $end
	 * @return $this
	 */
	public function limit($begin, $end = null)
	{
		if( is_null($end) )
		{
			$this->limit = $begin;
		}
		else
		{
			$this->limit = $begin . ', ' . $end;
		}
		return $this;
	}

	/**
	 * Exécute le requête
	 * Si l'id est fournie ne retourne qu'un seul résultat
	 *
	 * @param null $id
	 * @return array
	 */
	public function get($id = null)
	{
		if( !is_null($id) )
		{
			$this->conditions[] = [
				'key'	=>	'id',
				'cond'	=>	'=',
				'value'	=>	intval($id),
			];
		}

		//	On onitialise la requête
		$sql = 'SELECT ' . $this->fields . ' FROM ' . $this->from;

		if( $this->check($this->join) )
		{
			foreach( $this->join as $join )
			{
				$sql .= ' ' . $join['method'] . ' JOIN ' . $join['table'];
				$sql .= ' ON ' . $join['compare'];
			}
		}

		//	On vérifie s'il y a des conditions
		if( $this->check($this->conditions) )
		{
			$count = 0;
			$attributes = [];
			$sql .= ' WHERE ';

			//	On parcourt les conditons pour formater la requête
			foreach( $this->conditions as $q )
			{
				if( $q['key'] === 'id' )
				{
					$sql .= $this->from . '.' . $q['key'] . ' ' . $q['cond'] . ' ' . ':' . $q['key'];
				}
				else
				{
					$sql .= $q['key'] . ' ' . $q['cond'] . ' ' . ':' . $q['key'];
				}

				if( $count < (count($this->conditions) - 1) )
				{
					$sql .= ' AND ';
				}

				//	On définit des attributs pour la requête préparée
				$attributes = array_merge($attributes, [
					':' . $q['key'] => $q['value'],
				]);
				$count++;
			}
		}

		//	On vérifie les ordres de tri
		if( $this->check($this->orderBy) && $this->check($this->orderFields) )
		{
			$sql .= ' ORDER BY ' . $this->orderFields . ' ' . $this->orderBy;
		}

		//	On vérifie si une limite est renseignée
		if( $this->check($this->limit) )
		{
			$sql .= ' LIMIT ' . $this->limit;
		}

		//	Selon le cas on fait une requête préparée
		if( $this->check($this->conditions) )
		{
			if( !is_null($id) )
			{
				return Database::getInstance()->prepare($sql, $attributes, true);
			}
			else
			{
				return Database::getInstance()->prepare($sql, $attributes, false);
			}
		}

		//$this->items[] = $this->db->query($sql);
		return Database::getInstance()->query($sql, false);
	}

	public function display()
	{
		return $this->_items;
	}

	/**
	 * Retourne tous les items
	 *
	 * @return array
	 */
	public function all()
	{
		if( !$this->_items )
		{
			$results = $this->select()->from($this->_table)->latest()->get();
			foreach( $results as $result)
			{
				$this->_items[] = App::getModel($this->_model_name)->load($result['id']);
			}
		}

		return $this->_items;
	}

	/**
	 * Permet de checker
	 *
	 * @param $condition
	 * @return bool
	 */
	private function check($condition)
	{
		return (isset($condition) && !empty($condition) );
	}
}