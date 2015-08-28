<?php
namespace App\Collections;

use \Core\Collection;

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
	 * Retourne une entreprise en fonction de son id
	 *
	 * @param $id
	 * @return array
	 */
	public function getCompany($id)
	{
		$result = $this->select('id, name')->from($this->_table)->limit(1)->get($id);
		return $result->name;
	}
}