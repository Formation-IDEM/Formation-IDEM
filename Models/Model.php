<?php

/**
 * Model.php
 */
class Model
{
	protected $db;
	protected $table;

	public function __construct($db)
	{
		$this->db = $db;
		if( is_null($this->table) )
		{
			$this->table = strtolower(get_class($this)) . 's';
		}
	}

	/**
	 * Récupère tous les résultats d'une table
	 *
	 * @return mixed
	 */
	public function all()
	{
		return $this->db->query('SELECT * FROM ' . $this->table);
	}

	/**
	 * Récupère un résultat en fonction de son id
	 *
	 * @param $id
	 * @return mixed
	 */
	public function find($id)
	{
		return $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE id=?', [$id], true);
	}

	/**
	 * Insère une nouvelle entrée dans la base de donnée
	 *
	 * @param array $attributes
	 * @return mixed
	 */
	public function insert($attributes = [])
	{
		$sql = 'INSERT INTO . ' . $this->table . ' SET ';
		foreach( $attributes as $key => $value )
		{
			$sql .= $key . ' = :' . $key;
		}
		return $this->db->prepare($sql, $attributes);
	}

	/**
	 * Met à jour une entrée dans la base de donnée
	 *
	 * @param array $attributes
	 * @param       $id
	 * @return mixed
	 */
	public function update($attributes = [], $id)
	{
		$sql = 'UPDATE ' . $this->table . ' SET ';
		foreach( $attributes as $key => $value )
		{
			$sql .= $key . ' = :' . $key;
		}
		$sql .= ' WHERE id = :id';
		$attributes = array_merge($attributes, $id);
		return $this->db->prepare($sql, $attributes);
	}

	/**
	 * Méthode magique
	 * Permet de définir des attributs dynamiquement
	 *
	 * @param $key
	 * @param $value
	 * @return $this
	 */
	public function __set($key, $value)
	{
		$this->{$key} = $value;
		return $this;
	}

	/**
	 * Méthode magique
	 * Permet de récupérer des attributs
	 *
	 * @param $key
	 * @return mixed
	 */
	public function __get($key)
	{
		return $this->{$key};
	}

}