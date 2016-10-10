<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';

    protected $fillable = [
        'name',
        'departament_id',
    ];


    /* BELONG TO */

    public function department(){

        return $this->belongsTo(Department::class);
    }

}
