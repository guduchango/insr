<?php
namespace App\Models\Traits;

trait CompanyTrait
{

    public function getAll()
    {
        return $this->all();
    }

    public function mostSought()
    {
        return $this->limit(10)->get();
    }

    public function getByUsers($user_id)
    {

        return $this->where('user_id', $user_id)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function find($company_id)
    {

        return $this->find($company_id);
    }

    public function store($companyArray)
    {

        $this->fill($companyArray);
        return $this->save();
    }

}