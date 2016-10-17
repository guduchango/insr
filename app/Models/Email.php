<?php

namespace App\Models;

class Email extends BaseModel
{
    protected $table = 'emails';

    protected $fillable = [
        'address',
        'type',
        'company_id'
    ];


    /* BELONG TO */

    public function company(){

        return $this->belongsTo(Company::class);
    }

    /* Mutators */

    /* set */
    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = strtolower($value);
    }

    
}
