<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';

    protected $fillable = [
        'name',
    ];



    /* HAS MANY */

    public function cities(){

        return $this->hasMany(City::class);
    }
}
