<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Answer
 * @params int $id
 * @params string $name
 * @params enum $solution
 * @package App\Entities
 */

class TrainingAnswer extends Model
{
    /**
     * @var string
     */
    protected $table = 'tng_answer';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function questions(){
        return $this->belongsTo(TrainingQuestion::class);
    }
}
