<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'name',
        'province_id',
    ];


    /* BELONG TO */

    public function province(){

        return $this->belongsTo(Province::class);
    }

    /* HAS MANY */

    public function departments(){

        return $this->hasMany(Department::class);
    }
}
