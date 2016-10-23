<?php

namespace App\Models;

use App\Models\Traits\CategoryTrait;

class Category extends BaseModel
{
    use CategoryTrait;
    protected $table = 'categories';

    protected $fillable = [
        'parent_id',
        'name',
        'description',
        'url',
        'status',
    ];


    /* HAS MANY */

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    /* BELONG TO MANY */

    public function companies(){

        return $this->belongsToMany(Category::class,'companies_categories','company_id','category_id');
    }

    /* Mutators */

    /* set */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $this->gf->setValue($value);
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = $this->gf->setValue($value);
    }

    /* get */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getDescriptionAttribute($value)
    {
        return ucfirst($value);
    }
}
