<?php

namespace App\Models;

class Phone extends BaseModel
{
    protected $table = 'phones';

    protected $fillable = [
        'prefix',
        'number',
        'type',
        'company_id'
    ];

    protected $attributes = [
        'phone_type' => 'mobile',
    ];


    /* BELONG TO */

    public function company(){

        return $this->belongsTo(Company::class);
    }
}
