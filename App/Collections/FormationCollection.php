<?php
namespace App\Collections;

use Core\Collection;

/**
 * Class FormationCollection
 * @package App\Collections
 */
class FormationCollection extends Collection
{
    protected $_table = 'formations';
    protected $_model = 'formation';

    public function __construct()
    {
        parent::__construct();
    }
}