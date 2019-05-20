<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vehicle
 * @params int $id
 * @params string $name
 * @params string $registration
 * @package App\Entities
 */

class Vehicle extends Model
{
    protected $table = 'veh_vehicle';

    public function instructors()
    {
        return $this->belongsToMany(Instructor::class, 'veh_instructor');
    }
}