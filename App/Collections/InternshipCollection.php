<?php
namespace App\Collections;

use Core\Tables\Collection;

/**
 * Class InternshipCollection
 * @package App\Collections
 */
class InternshipCollection extends Collection
{
    protected $collection = 'internships';

    public function __construct()
    {
            parent::__construct();
    }

    /**
     * Retourne les stages avec l'entreprise associée
     *
     * @return mixed
     */
    public function getInternshipsCompany()
    {
         $this->select()
            ->from('internships')
            ->join('companies', 'companies.id = internships.company_id')
            ->newest()
            ->get();

        return $this->display();
    }

    public function getInternship($id = null)
    {
        $select = $this->select()
            ->from('internships')
            ->join('companies', 'companies.id = internships.company_id')
            ->join('formations', 'formations.id = internships.formation_id')
            ->get($id);
        return $select;
    }
}