<?php
namespace Core;

use Core\Factories\DatabaseFactory;
use Core\Factories\ModelFactory;

/**
 * Class Collection
 *
 * @package Core
 */
class Collection
{
	//	Modèle
	protected $db;
	protected $_table;
	protected $_model;

	//	Requête
	protected $fields;
	protected $conditions = [];
	protected $from;
	protected $join = [];
	protected $orderBy;
	protected $orderFields;
	protected $limit;

	//	Tableau de résultats
	protected $items = [];
	protected $as_array = false;

	/**
	 * Constructeur
	 */
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
	 * Permet d'effectuer une requête de type COUNT()
	 *
	 * @param string $field
	 * @param string $where
	 * @return $this
	 */
	public function count($field = '*', $where = '')
	{
		return $this->db->count($this->_table, $field, $where);
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

	/**
	 * Permet de faire une jointure sur une table
	 *
	 * @param $table
	 * @param $compare
	 * @param string $method
	 * @return $this
	 */
	public function join($table, $compare, $method = 'INNER')
	{
		$this->join[] = [
			'table'			=>	$table,
			'compare'		=>	$compare,
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

				if($q['cond'] == 'LIKE')
				{
					//	Condition particulière pour les requête de type like
					$attributes = array_merge($attributes, [
						':' . $q['key'] => '%' . $q['value'] . '%',
					]);
				}
				else
				{
					//	On définit des attributs pour la requête préparée
					$attributes = array_merge($attributes, [
						':' . $q['key'] => $q['value'],
					]);
				}
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
				return $this->db->prepare($sql, $attributes, true, $this->as_array);
			}
			else
			{
				return $this->db->prepare($sql, $attributes, false, $this->as_array);
			}
		}

		$this->items = $this->db->query($sql, false, $this->as_array);
		return $this->items;
	}

	/**
	 * Définit le mode récupération comme un array
	 *
	 * @return $this
	 */
	public function asArray()
	{
		$this->as_array = true;
		return $this;
	}

	/**
	 * Convertit les items sélectionnés en tableau associatif
	 *
	 * @return array
	 */
	public function toArray()
	{
		$array = [];
		foreach( $this->items as $item )
		{
			$array[] = $item->getFields();
		}
		return $array;
	}

	/**
	 * Retourne la liste des items
	 *
	 * @return array
	 */
	public function getItems()
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
		if( !$this->items )
		{
			$results = $this->select()->from($this->_table)->latest()->get();
			$count = 0;
			foreach( $results as $result)
			{
				$this->items[$count] = ModelFactory::loadModel($this->_model)->load($result->id);
				$count++;
			}
		}

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
}