<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
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

    /* get */
    public function getAddressAttribute($value)
    {
        return ucfirst($value);
    }
    
}
