<?php
namespace App\Collections;

use \Core\Collection;

/**
 * Class CompanyCollection
 *
 * @package App\Collections
 */
class UserCollection extends Collection
{
    protected $_table = 'users';
    protected $_model = 'user';

    public function __construct()
    {
        parent::__construct();
    }
}