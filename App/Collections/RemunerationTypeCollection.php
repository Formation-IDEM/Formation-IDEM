<?php
namespace App\Collections;

use Core\Collection;

/**
 * Class RemunerationTypeCollection
 * @package App\Collections
 */
class RemunerationTypeCollection extends Collection
{
    protected $_table = 'remuneration_types';
    protected $_model = 'RemunerationType';

    public function __construct()
    {
        parent::__construct();
    }
}