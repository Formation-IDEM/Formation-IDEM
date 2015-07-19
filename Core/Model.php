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
			$class_name = end($model);
			$this->table = strtolower(str_replace('Model', '', $class_name)) . 's';
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