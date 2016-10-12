<?php

namespace App\Models;

use App\Models\Traits\CompanyTrait;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use CompanyTrait;


    protected $table = 'companies';

    protected $fillable = [
        'name',
        'address',
        'web',
        'facebook',
        'twitter',
        'slogan',
        'url',
        'logo',
        'status',
        'description',
        'user_id',
        'province_id',
        'city_id',
        'department_id',
        'section_id'
    ];


    /* BELONG TO */

    public function user(){

        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function province(){

        return $this->belongsTo(Province::class,'province_id','id');
    }

    public function city(){

        return $this->belongsTo(City::class,'city_id','id');
    }

    public function department(){

        return $this->belongsTo(Department::class,'department_id','id');
    }

    public function section(){

        return $this->belongsTo(Section::class,'section_id','id');
    }

    /* HAS MANY */

    public function phones(){
        
        return $this->hasMany(Phone::class,'company_id','id');
    }

    public function emails(){

        return $this->hasMany(Email::class,'company_id','id');
    }

    /* BELONG TO MANY */

    public function categories(){
        
        return $this->belongsToMany(Category::class,'companies_categories','company_id','category_id');
    }

    /* Mutators */

    /* set */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = strtolower($value);
    }

    public function setWebAttribute($value)
    {
        $this->attributes['web'] = strtolower($value);
    }

    public function setSloganAttribute($value)
    {
        $this->attributes['slogan'] = strtolower($value);
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = strtolower($value);
    }

    /* get */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getAddressAttribute($value)
    {
        return ucfirst($value);
    }

    public function getSloganAttribute($value)
    {
        return ucfirst($value);
    }

    public function getDescriptionAttribute($value)
    {
        return ucfirst($value);
    }

}
