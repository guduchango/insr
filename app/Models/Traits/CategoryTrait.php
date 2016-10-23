<?php
namespace App\Models\Traits;

trait CategoryTrait
{
    public function getSubcategories(){

        return $this->where('parent_id','<>',0)->get();
    }

}