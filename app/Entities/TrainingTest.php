<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Test
 * @params int $id
 * @params string $name
 * @package App\Entities
 */

class TrainingTest extends Model
{
    protected $table = 'tng_test';

    public function questions()
    {
        return $this->hasMany(TrainingQuestion::class, 'test_id');
    }

}