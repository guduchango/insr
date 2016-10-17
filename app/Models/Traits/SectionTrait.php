<?php
namespace App\Models\Traits;

trait SectionTrait
{

    public function getOrderByName()
    {
        return $this->orderBy('name')->get();
    }
}