<?php
namespace Core;

use \Core\Database\Database;

class Model
{
	protected $db;
	protected $table;

	/**
	 * Constructeur
	 * Récupère l'instanciation de la base de donnée pour effectuer
	 * toutes les requêtes
	 *
	 * @param \Core\Database\Database $db
	 */
	public function __construct(Database $db)
	{
		$this->db = $db;
		if( is_null($this->table) )
		{
			$model = explode('\\', get_class($this));
			$className = end($model);
			$this->table = strtolower(str_replace('Model', '', $className)) . 's';
		}
	}

	/**
	 * Retourne tous les résultats de la table
	 *
	 * @return mixed
	 */
	public function all()
	{
		return $this->query('SELECT * FROM ' . $this->table);
	}

	/**
	 * Retourne un résultat unique en fonction de son id
	 *
	 * @param $id
	 * @return mixed
	 */
	public function find($id)
	{
		return $this->query('SELECT * FROM ' . $this->table . ' WHERE id = ?', [$id], true);
	}

	/**
	 * Insère les données dans la table à partir d'un tableau associatif
	 *
	 * @param $data
	 * @return mixed
	 */
	public function insert($data)
	{
		$sql = 'INSERT INTO ' . $this->table . ' SET ';

		$count = 0;
		$attributes = [];
		foreach( $data as $key => $value )
		{
			$sql .= $key . ' = :' . $key;
			if( $count < count($data) )
			{
				$sql .= ', ';
			}
			$attributes = array_merge($attributes, [
				$key => $value,
			]);
		}

		return $this->db->execute($sql, $attributes);
	}

	/**
	 * Met à jour les données d'une ligne grâce à un tableau associatif
	 * et l'id passée en paramètre
	 *
	 * @param $data
	 * @param $id
	 * @return mixed
	 */
	public function update($data, $id)
	{
		$sql = 'UPDATE ' . $this->table . ' SET ';

		$count = 0;
		$attributes = [];
		foreach( $data as $key => $value )
		{
			$sql .= $key . ' = :' . $key;
			if( $count < count($data) )
			{
				$sql .= ', ';
			}
			$attributes = array_merge($attributes, [
				':' . $key => $value,
			]);
		}
		$sql .= ' WHERE id = :id';
		$attributes = array_merge($attributes, [
			':id'	=>	intval($id),
		]);

		return $this->db->execute($sql, $attributes);
	}

	/**
	 * Exécute une requête préparée ou non en fonction des paramètres
	 *
	 * @param            $statement
	 * @param null       $attributes
	 * @param bool|FALSE $one
	 * @return mixed
	 */
	public function query($statement, $attributes = null, $one = false)
	{
		if( $attributes )
		{
			return $this->db->prepare($statement, $attributes, str_replace('Model', 'Entity', get_class($this)), $one);
		}
		else
		{
			return $this->db->query($statement, str_replace('Model', 'Entity', get_class($this)), $one);
		}
	}
}