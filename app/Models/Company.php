<?php

namespace App\Models;

use App\Models\Traits\CompanyTrait;
use App\Models\Traits\Uuids;

class Company extends BaseModel
{
    use Uuids,CompanyTrait;

    protected $table = 'companies';

    protected $fillable = [
        'uuid',
        'name',
        'address',
        'slogan',
        'email',
        'url',
        'logo_status',
        'description',
        'user_id',
        'province_id',
        'department_id',
        'section_id'
    ];

    protected $attributes = [
        'province_id' => 12,
        'department_id' => 15
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

    public function socials(){
        return $this->hasMany(Social::class,'company_id','id');
    }

    /* BELONG TO MANY */

    public function categories(){
        
        return $this->belongsToMany(Category::class,'companies_categories','company_id','category_id');
    }





}
