<?php

namespace App\Models;

use App\Helpers\Gf;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $gf;

    public function __construct($attributes=array())
    {
        $this->gf = new Gf();
        parent::__construct($attributes);
    }

    public function scopeFindUuid($query,$uuid){

        return $query->where('uuid',$uuid)->first();
    }

}
