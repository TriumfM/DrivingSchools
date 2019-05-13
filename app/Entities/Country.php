<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 * @params int $id
 * @params string $name
 * @package App\Entities
 */

class Country extends Model
{
    protected $table = 'cnt_country';

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
