<?php

namespace App;

use App\Models\Traits\Uuids;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable,Uuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','uuid',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /* Mutators */

    /* set */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    /* get */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

}
