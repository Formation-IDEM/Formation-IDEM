<?php
namespace App\Collections;

use Core\Tables\Collection;

/**
 * Class RefPedagoCollection
 * @package App\Collections
 */
class RefPedagoCollection extends Collection
{
    protected $collection = 'ref_pedagos';

    public function __construct()
    {
        parent::__construct();
    }
}