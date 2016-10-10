<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = [
        'name',
        'city_id',
    ];


    /* BELONG TO */

    public function cities(){

        return $this->belongsTo(City::class);
    }

    /* HAS MANY */

    public function sections(){

        return $this->hasMany(Section::class);
    }
}
