<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 * @params int $id
 * @params string $name
 * @params int $points
 * @params string $photo
 * @package App\Entities
 */

class TrainingQuestion extends Model
{
    protected $table = 'tng_question';

    public function tests(){
        return $this->belongsTo(TrainingTest::class);
    }

    public function answers()
    {
        return $this->hasMany(TrainingAnswer::class, 'question_id');
    }

      public function stdAnswers()
    {
        return $this->hasMany(StudentAnswers::class, 'question_id');
    }
}
