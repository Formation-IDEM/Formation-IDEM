<?php
namespace App\Collections;

use \Core\Collection;
/**
 * Class CompanyInternshipModel
 * @package App\Models
 */
class CompanyInternshipCollection extends Collection
{
    protected $collection = 'company_internship';

    public function __construct()
    {
        parent::__construct();
    }
}