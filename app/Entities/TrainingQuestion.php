<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 * @params int $id
 * @params string $name
 * @params int $points
 * @params int $order_number
 * @params string $photo
 * @package App\Entities
 */

class TrainingQuestion extends Model
{
    /**
     * @var string
     */
    protected $table = 'tng_question';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tests(){
        return $this->belongsTo(TrainingTest::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany(TrainingAnswer::class, 'question_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stdAnswers()
    {
        return $this->hasMany(StudentAnswers::class, 'question_id');
    }
}
