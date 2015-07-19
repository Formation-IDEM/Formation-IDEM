<?php
namespace Core;
/**
 * Entity.php
 */

class Entity
{
	/**
	 * Permet d'accéder aux méthodes magiques des modèles
	 *
	 * @param $key
	 * @return mixed
	 */
	public function __get($key)
	{
		$method = 'get' . ucfirst($key);
		$this->$key = $this->$method();

		return $this->$key;
	}
}