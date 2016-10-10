<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'phones';

    protected $fillable = [
        'prefix',
        'number',
        'type',
        'company_id'
    ];


    /* BELONG TO */

    public function company(){

        return $this->belongsTo(Company::class);
    }
}
