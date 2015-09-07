<?php
/**
 * Class InternshipCollection
 * @package App\Collections
 */
class InternshipCollection extends Collection
{
    protected $_table = 'internships';
    protected $_model_name = 'Internship';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retourne les stages en association avec une entreprise
     *
     * @param $id
     * @return array
     */
    public function getInternshipsByCompany($id)
    {
        return $this->select()->from($this->_table)->where('company_id', '=', $id)->get();
    }

    /**
     * Compte les stages en fonction d'une entreprise
     *
     * @param $id
     * @return $this
     */
    public function countInternships($id)
    {
        $result = $this->count('id', 'company_id = ' . $id);
        return $result;
    }
}
