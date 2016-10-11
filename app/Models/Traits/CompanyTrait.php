<?php
namespace App\Models\Traits;

trait CompanyTrait{

        public function getAll(){
            return $this->all();
        }

    public function mostSought(){
        return $this->limit(10)->get();
    }

}