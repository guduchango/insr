<?php

namespace App\Models;

class City extends BaseModel
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

    /* Mutators */

    /* set */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    /* get */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

}
