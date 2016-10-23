<?php

namespace App\Models;

use App\Models\Traits\SectionTrait;

class Section extends BaseModel
{
    use SectionTrait;

    protected $table = 'sections';

    protected $fillable = [
        'name',
        'departament_id',
    ];


    /* BELONG TO */

    public function department(){

        return $this->belongsTo(Department::class);
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
