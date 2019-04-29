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

class StudentAnswers extends Model
{
    protected $table = 'tng_answer';

    protected $hidden = array('solution');

     

    public function questions(){
        return $this->belongsTo(TrainingQuestion::class);
    }
}
