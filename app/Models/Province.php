<?php

namespace App\Models;

class Province extends BaseModel
{
    protected $table = 'provinces';

    protected $fillable = [
        'name',
    ];

    /* HAS MANY */

    public function cities(){

        return $this->hasMany(City::class);
    }

    /* Mutators */

    /* set */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $this->gf->setValue($value);
    }

    /* get */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
