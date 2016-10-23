<?php
namespace App\Models\Traits;

trait CompanyTrait
{

    /* Scopes */
    public function scopeMostSought($query)
    {
        return $query->limit(10)->get();
    }

    public function scopeGetByUsers($query,$user_id)
    {

        return $query->where('user_id', $user_id)
            ->orderBy('id', 'desc')
            ->get();
    }

    /* Mutators */

    /* set */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $this->gf->setValue($value);
    }

    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = $this->gf->setValue($value);
    }

    public function setWebAttribute($value)
    {
        $this->attributes['web'] = $this->gf->setValue($value);
    }

    public function setSloganAttribute($value)
    {
        $this->attributes['slogan'] = $this->gf->setValue($value);
    }

    public function setUrlAttribute($value)
    {
        $this->attributes['url'] = $this->gf->setValue(str_slug($value));
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