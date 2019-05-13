<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DrivingCategory
 * @params int $id
 * @params string $name
 * @package App\Entities
 */
class DrivingCategory extends Model
{
    protected $table = 'drv_category';

    public function payments(){

        return $this->hasMany(Payment::class);
    }
}