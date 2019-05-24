<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * @params int $id
 * @params string $name
 * @params int $country_id
 * @package App\Entities
 */

class City extends Model
{
    protected $table = 'cnt_city';

    public function getFullNameAttribute()
    {
        return $this->name;
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
