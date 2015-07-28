<?php
namespace App\Collections;

use \Core\Tables\Collection;
use Core\Factories\ModelFactory;

/**
 * Class CompanyCollection
 *
 * @package App\Collections
 */
class CompanyCollection extends Collection
{
	protected $_table = 'companies';
    protected $_model = 'company';

	public function __construct()
	{
		parent::__construct();
	}

    /**
     * Retourne tous les éléments de la table
     *
     * @return array
     */
    public function getAll()
    {
        if( !$this->items )
        {
            $results = $this->select()->from($this->_table)->latest()->get();
            foreach( $results as $result )
            {
                $this->items[] = ModelFactory::loadModel($this->_model)->load($result->id);
            }
        }

        return $this->items;
    }

}