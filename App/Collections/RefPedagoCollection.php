<?php
namespace App\Collections;

use Core\Collection;

/**
 * Class RefPedagoCollection
 * @package App\Collections
 */
class RefPedagoCollection extends Collection
{
    protected $_model = 'refPedago';
    protected $_table = 'ref_pedagos';

    public function __construct()
    {
        parent::__construct();
    }
}