<?php
namespace App\Collections;

use Core\Collection;

/**
 * Class InternshipCollection
 * @package App\Collections
 */
class InternshipCollection extends Collection
{
    protected $_table = 'internships';
    protected $_model = 'internship';

    public function __construct()
    {
        parent::__construct();
    }

    public function getItemsByCompany($id)
    {
        return $this->select()->from($this->_table)->where('company_id', '=', $id)->get();
    }

    public function countInternships($id)
    {
        $result = $this->count('id', 'company_id = ' . $id);
        return $result;
    }
}