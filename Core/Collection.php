<?php
namespace Core;
/**
 * Collection.php
 */

class Collection implements IteratorAggregate, ArrayAccess
{
	private $items;

	/**
	 * Constructeur
	 *
	 * @param array $items
	 */
	public function __construct(array $items)
	{
		$this->items = $items;
	}

	/**
	 * Retourne la clé d'un tableau
	 *
	 * @param $key
	 * @return \Core\Collection|null
	 */
	public function get($key)
	{
		$index = explode('.', $key);
		return $this->getValue($index, $this->items);
	}

	/**
	 * Associe une valeur à une clé dans le tableau
	 *
	 * @param $key
	 * @param $value
	 */
	public function set($key, $value)
	{
		$this->items[$key] = $value;
	}

	/**
	 * Vérifie si le tableau possède bien la clé
	 *
	 * @param $key
	 * @return bool
	 */
	public function has($key)
	{
		return array_key_exists($key, $this->items);
	}

	/**
	 * Génère une liste des items
	 *
	 * @param $key
	 * @param $value
	 * @return mixed
	 */
	public function listing($key, $value)
	{
		$results = [];
		foreach($this->items as $item)
		{
			$results[$item[$key]] = $item[$value];
		}
		return Collection($results);
	}

	/**
	 * Récupère des éléments précis d'un tableau en fonction de la clé
	 *
	 * @param $key
	 * @return \Core\Collection
	 */
	public function extract($key)
	{
		$results = [];
		foreach($this->items as $item)
		{
			$results[] = $item[$key];
		}
		return new Collection($results);
	}

	/**
	 * Permet d'associer des clés de tableau entre elles
	 *
	 * @param $separator
	 * @return string
	 */
	public function join($separator)
	{
		return implode($separator, $this->items);
	}

	/**
	 * Retourne la valeur maximale du tableau ou d'une clé
	 *
	 * @param bool|FALSE $key
	 * @return mixed
	 */
	public function max($key = false)
	{
		if( $key )
		{
			return $this->extract($key)->max();
		}
		return max($this->items);
	}

	/**
	 * retourne la valeur minimale du tableau ou d'une clé
	 *
	 * @param bool|FALSE $key
	 * @return mixed
	 */
	public function min($key = false)
	{
		if( $key )
		{
			return $this->extract($key)->min();
		}
		return min($this->items);
	}

	/**
	 * @param $offset
	 * @param $value
	 */
	public function offsetSet($offset, $value)
	{
		return $this->set($offset, $value);
	}

	/**
	 * @param $offset
	 * @return bool
	 */
	public function offsetExists($offset)
	{
		return $this->has($offset);
	}

	/**
	 * @param $offset
	 */
	public function offsetUnset($offset)
	{
		if( $this->has($offset) )
		{
			unset($this->items[$offset]);
		}
	}

	/**
	 * @param $offset
	 * @return \Core\Collection|null
	 */
	public function offsetGet($offset)
	{
		return $this->get($offset);
	}

	/**
	 * @return \ArrayIterator
	 */
	public function getIterator()
	{
		return new \ArrayIterator($this->items);
	}

	/**
	 * Retourne la valeur d'un tableau de façon récurssive
	 *
	 * @param array $indexes
	 * @param       $value
	 * @return \Core\Collection|null
	 */
	private function getValue(array $indexes, $value)
	{
		$key = array_shift($indexes);
		if( empty($indexes) )
		{
			if( !array_key_exists($key, $value) )
			{
				return null;
			}

			if( is_array($value[$key]) )
			{
				return new Collection($value[$key]);
			}
			return $value[$key];
		}
		return $this->getValue($indexes, $value[$key]);
	}

}