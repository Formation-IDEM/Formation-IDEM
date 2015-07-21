<?php
namespace App\Collections;

use \Core\Tables\Collection;

/**
 * Class CompanyCollection
 *
 * @package App\Collections
 */
class CompanyCollection extends Collection
{
	protected $collection = 'companies';

	public function __construct()
	{
		parent::__construct();
	}
}