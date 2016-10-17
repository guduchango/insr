<?php

namespace App\Models;

class Social extends BaseModel
{
    protected $table = 'socials';

    protected $fillable = [
        'social_type',
        'url',
        'company_id'
    ];


    /* BELONG TO */

    public function company(){

        return $this->belongsTo(Company::class);
    }
}
