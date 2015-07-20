<?php
namespace Core;

use \Core\Database\Database;

/**
 * Class Model
 *
 * @package Core
 */
class Model
{
	protected $db;
	protected $table;
	protected $fields = [];

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
	 * Retourne un résultat unique en fonction de son id et remplit les
	 * attributs en conséquence
	 *
	 * @param $id
	 * @return mixed
	 */
	public function load($id)
	{
		$data =  $this->query('SELECT * FROM ' . $this->table . ' WHERE id = ?', [$id], true);
		if( !$data )
		{
			return false;
		}
		foreach($this->fields as $key => $value)
		{
			$this->fields[$key] = $data->$key;
		}
		return $this->fields;
	}

	public function all()
	{
		$data = $this->query('SELECT * FROM ' . $this->table . ' ORDER BY id DESC');

		unset($this->fields);
		foreach( $data as $key => $value )
		{
			$this->fields[$key] = $value;
		}

		return $this->fields;
	}

	/**
	 * Renseigne les champs
	 *
	 * @param $data
	 */
	public function store($data)
	{
		foreach( $this->fields as $field )
		{
			$this->fields[$field] = $data[$field];
		}
	}

	/**
	 * Sauvegarde les champs selon s'il s'agit d'une nouvelle entrée
	 *
	 * @return mixed
	 */
	public function save()
	{
		if( is_null($this->fields['id']) || empty($this->fields['id']) )
		{
			return $this->insert($this->fields);
		}

		return $this->update($this->fields, $this->fields['id']);
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
			if( $count < (count($data) - 1) )
			{
				$sql .= ', ';
			}
			$attributes = array_merge($attributes, [
				':' . $key => $value,
			]);
			$count++;
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
			if( $count < (count($data) - 1) )
			{
				$sql .= ', ';
			}
			$attributes = array_merge($attributes, [
				':' . $key => $value,
			]);
			$count++;
		}
		$sql .= ' WHERE id = :id';
		$attributes = array_merge($attributes, [
			':id'	=>	intval($id),
		]);

		return $this->db->execute($sql, $attributes);
	}

	/**
	 * Suppression d'une ligne de la base de donnée
	 *
	 * @param $id
	 * @return mixed
	 */
	public function delete($id)
	{
		return $this->db->execute('DELETE FROM ' . $this->table . ' WHERE id = ?', [$id]);
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
			return $this->db->prepare($statement, $attributes, $one);
		}
		else
		{
			return $this->db->query($statement, $one);
		}
	}
}