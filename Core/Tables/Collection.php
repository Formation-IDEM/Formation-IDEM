<?php
namespace Core\Tables;

use Core\Factories\DatabaseFactory;

/**
 * Class Collection
 *
 * @package Core
 */
class Collection
{
	//	Modèle
	protected $db;
	protected $collection;

	//	Requête
	/**
	 * @var
     */
	protected $fields;
	protected $conditions = [];
	protected $from;
	protected $join = [];
	protected $orderBy;
	protected $orderFields;
	protected $limit;

	//	Tableau de résultats
	protected $items = [];

	public function __construct()
	{
		$this->db = DatabaseFactory::db();
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
			'key'		=>	$key,
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

		$this->orderBy = $order;
		return $this;
	}

	/**
	 * Allias par rapport à la date
	 *
	 * @param string $field
	 * @return $this
	 */
	public function newest($field = 'create_date')
	{
		$this->orderBy($field, 'DESC');
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
		$this->orderBy($field, 'ASC');
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
			 return $this->db->prepare($sql, $attributes);
		}

		$this->items[] = $this->db->query($sql);
	}

	public function display()
	{
		return $this->items;
	}

	/**
	 * Retourne tous les items
	 *
	 * @return array
	 */
	public function all()
	{
		$this->select('*')->from($this->collection)->get();
		return $this->items;
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

	public function insert($data)
	{
		$sql = 'INSERT INTO ' . $this->collection . '(';

		$count = 0;
		foreach($data as $key => $value )
		{
			$sql .= $key;
			if( $count < (count($data) - 1) )
			{
				$sql .= ', ';
			}
			$count++;
		}

		$sql.= ') VALUES (';
		$count_values = 0;
		foreach( $data as $key => $value )
		{
			$sql .= '\'' . $value . '\'';
			if( $count_values < (count($data) - 1) )
			{
				$sql .= ', ';
			}
			$count_values++;
		}
		$sql .= ');';

		echo $sql . '<br/><br />';
	}
}