<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
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
}
